{{--
    location : /users/satwa/detail/id
    component layout detail satwa
--}}
<div>
    <div class="w-full mx-auto flex-row justify-center lg:justify-between border-none sm:border-b-2 items-center">
        <div class="bg-primary flex">
            <div class=" lg:w-3/4 text-white py-5 mx-6">
                <p class="text-start font-bold text-3xl mb-1 font-bold"> {{$info[0]->animals_name}}
                    <small class="font-light"> ({{$info[0]->scientific_name}}) </small>
                </p>
                <p>Deskripsi : {{$info[0]->deskripsi}}</p>
            </div>
        </div>
    </div>
    <div class="container mx-auto flex flex-col my-6">
        <div class="mb-7">
            <h2 class="font-medium flex text-lg"> Peta Penyebaran </h2>
            <div class="w-full justify-center">
                <div id='map' class="h-96 rounded-lg shadow-xl"></div>
            </div>
        </div>
        @livewire('gallery-component', ['animalsId' => $animals])
    </div>
    @push('script')
    <script>
        document.addEventListener('livewire:load', () => {
            console.log("{{route('geojson', ['id' => $animals])}}")
            const defLocation = [{{$lng}}, {{$lat}}];
            mapboxgl.accessToken = '{{$key}}';
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
                    data: "{{route('geojson', ['id' => $animals])}}",
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
            var animal = e.features[0].properties.animals_name;
            var found = e.features[0].properties.founded_at;
            var d = new Date(found);

            while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
            }

            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML(
                'Nama Hewan : ' + animal + '<br>Time Capture: ' + d)
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
</div>
