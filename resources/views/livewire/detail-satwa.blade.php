@section('satwa', 'font-semibold active')
@section('content')
    {{-- Introduction --}}
    <div class="w-full mx-auto flex-row justify-center lg:justify-between border-none sm:border-b-2 items-center">
        <div class="bg-primary flex">
            <div class=" lg:w-3/4 text-white py-5 mx-6">
                <p class="text-start font-bold text-3xl mb-1 font-bold"> Burung Perkutut
                    <small class="font-light"> (Geosprelia Striata) </small>
                </p>
                <p>Deskripsi :  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis blandit eros. Nulla sit amet scelerisque ligula.</p>
            </div>
        </div>
        <div class="container mx-auto flex flex-col my-6">
            <div class="mb-7">
                <h2 class="font-medium flex text-lg"> Peta Penyebaran </h2>
                <div class="w-full justify-center">
                    <div id='map' class="h-96 rounded-lg shadow-xl"></div>
                </div>
            </div>
            <div>
                <h2 class="font-medium flex text-lg mb-3"> Galeri Burung Perkutut </h2>
                <div class="flex grid grid-cols-6 gap-3 mx-3">
                    @for ($i = 0; $i < 4; $i++)
                    <div class="h-full border rounded-md">
                        <a href="{{ route('satwa_detail', ['id'=>$i]) }}">
                            <img class="w-full h-max" src="{{ asset('img/placeholder.jpg') }}">
                            <div class="p-2 flex flex-cols">
                                <div class="w-11/12">
                                    <h1 class="font-medium">Perkutut Songgo Ratu</h1>
                                    <p class="overflow-hidden text-sm">Oleh : Mr. Garfield</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
            <a href="#" class="self-center rounded-md w-2/12 p-2 text-center mt-7 border border-4 border-blue-400 transition duration-300 ease-in-out hover:bg-secondary hover:text-white">
                Load more
            </a>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.addEventListener('livewire:load', () => {
            const defLocation = [{{$lng}}, {{$lat}}];
            mapboxgl.accessToken = '{{env('MAP_PUBLIC_KEY')}}';
            var map = new mapboxgl.Map({
                container: 'map',
                center: defLocation,
                zoom: 6,
                style: 'mapbox://styles/mapbox/streets-v11'
            });
            const loadLocation = () => {
            map.on('load', function () {
                map.addSource('earthquakes', {
                    type: 'geojson',
                    data: 'https://docs.mapbox.com/mapbox-gl-js/assets/earthquakes.geojson',
                    cluster: true,
                    clusterMaxZoom: 14, // Max zoom to cluster points on
                    clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
                });

                map.addLayer({
                    id: 'clusters',
                    type: 'circle',
                    source: 'earthquakes',
                    filter: ['has', 'point_count'],
                    paint: {
                    // Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
                    // with three steps to implement three types of circles:
                    //   * Blue, 20px circles when point count is less than 100
                    //   * Yellow, 30px circles when point count is between 100 and 750
                    //   * Pink, 40px circles when point count is greater than or equal to 750
                        'circle-color': [
                            'step',['get', 'point_count'],'#51bbd6',100,
                            '#f1f075',750,'#f28cb1'
                        ],
                        'circle-radius': [
                            'step',['get', 'point_count'],20,100,30,750,40]
                        }
            });

            map.addLayer({
                id: 'cluster-count',
                type: 'symbol',
                source: 'earthquakes',
                filter: ['has', 'point_count'],
                layout: {
                    'text-field': '{point_count_abbreviated}',
                    'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
                    'text-size': 12
                }
            });

            map.addLayer({
                id: 'unclustered-point',
                type: 'circle',
                source: 'earthquakes',
                filter: ['!', ['has', 'point_count']],
                paint: {
                    'circle-color': '#11b4da',
                    'circle-radius': 4,
                    'circle-stroke-width': 1,
                    'circle-stroke-color': '#fff'
                }
            });

            // inspect a cluster on click
            map.on('click', 'clusters', function (e) {
                var features = map.queryRenderedFeatures(e.point, {
                    layers: ['clusters']
                });
                var clusterId = features[0].properties.cluster_id;
                map.getSource('earthquakes').getClusterExpansionZoom(
                    clusterId,
                    function (err, zoom) {
                        if (err) return;
                        map.easeTo({
                            center: features[0].geometry.coordinates,
                            zoom: zoom
                        });
                    }
                );
            });

            map.on('click', 'unclustered-point', function (e) {
            var coordinates = e.features[0].geometry.coordinates.slice();
            var mag = e.features[0].properties.mag;
            var tsunami;

            if (e.features[0].properties.tsunami === 1) {
                tsunami = 'yes';
            } else {
                tsunami = 'no';
            }

            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(
                'magnitude: ' + mag + '<br>Was there a tsunami?: ' + tsunami
                )
                .addTo(map);
            });

                map.on('mouseenter', 'clusters', function () {
                    map.getCanvas().style.cursor = 'pointer';
                });
                map.on('mouseleave', 'clusters', function () {
                    map.getCanvas().style.cursor = '';
                });
            });
            }
            loadLocation();
            map.addControl(new mapboxgl.NavigationControl);
        });
    </script>
@endpush
