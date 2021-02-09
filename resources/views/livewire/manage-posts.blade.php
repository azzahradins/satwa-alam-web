{{--
    location /admin/contributions
    function : to accept and reject form of contributions
--}}
<div class="w-full mb-3">
    <div class="p-3 bg-white w-full rounded-md shadow-md">
        <h2 class="text-lg font-semibold">Validasi kontribusi dari user</h2>
        <p class="font-light mb-1">Harap periksa satwa, deskripsi, gambar dan lokasi sebelum dipublish</p>
        <div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-contributor">Kontributor</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <input wire:model="kontributor" class="w-full h-8 px-2 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="User Info" id="forms-contributor" disabled/>
                </div>
            </div>
            <div class="text-gray-700 md:flex mb-3 md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-type overflow-clip">Tipe Satwa</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <input wire:model="type" class="w-full h-8 px-2 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Tipe Satwa" id="forms-type"/>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                </div>
                <div class="md:w-3/4 md:flex-grow">
                    @error('type')
                        <p class="text-red-500 text-xs italic">
                            Anda perlu mengisi tipe terlebih dahulu
                        </p>
                    @enderror
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center" >
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-animals">Jenis Satwa</label>
                </div>
                <div class="md:w-3/4 md:flex-grow flex-row flex">
                    <input wire:model="animalsId" type="hidden" id="animals" id="forms-type" class="w-full border-none h-8 px-2 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="id satwa"/>
                    <div class="mr-3">
                        <input
                        @foreach ($animals as $animal)
                            @if ($idanimals == $animal->id)
                                value="{{$animal->animals_name}}"
                            @endif
                        @endforeach
                        disabled class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Jenis Satwa"/>
                    </div>
                    <div wire:ignore class="relative inline-block mb-1 w-full text-gray-700">
                        <select class="cari w-3/4 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                                data-livewire="@this" name="cari" placeholder="Regular input">
                            <option disabled value="0"> -- Pilih untuk merubah satwa -- </option>
                            @if ($animals != null)
                                @foreach ($animals as $animal)
                                    <option value="{{$animal->id}}"> {{$animal->animals_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-animals">Lokasi</label>
                </div>
                <div class="md:w-3/4 flex flex-grow flex-row">
                    <div class=" md:flex-grow mr-3">
                        <input id="lat" wire:model="lat" disabled class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Latitude" id="forms-type"/>
                    </div>
                    <div class="md:flex-grow">
                        <input id="lng" wire:model="lng" disabled class="w-full h-8 px-2 text-sm text-gray-700 placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Longitude" id="forms-type"/>
                    </div>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-animals"></label>
                </div>
                <div class="md:w-3/4 flex flex-grow flex-row">
                    <div class="w-full justify-center">
                        <div id='map' wire:ignore class="h-40 rounded-lg shadow-xl">
                            Pilih data terlebih dahulu untuk melihat map
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-image">Gambar</label>
                </div>
                @php
                    $list = null;
                    if($idsatwa!=null){
                        $list = explode('_', $photo);
                    }
                @endphp
                <div class="md:w-3/4 flex flex-col">
                    <div class="flex">
                    @if ($list != null)
                        @foreach ($list as $image)
                            <div class="border rounded-md pb-2 mr-2">
                                <img class="w-36 object-cover h-20 mb-2" src="{{ asset('uploads/'. $image) }}"/>
                                <label class="text-gray-700 pl-2">
                                    <input type="checkbox" checked wire:model="images" value="{{$image}}"/>
                                    <span class="ml-1">Pilih</span>
                                </label>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                </div>
                <div class="md:w-3/4 md:flex-grow">
                    @error('uploaded')
                        <p class="text-red-500 text-xs italic">
                            Anda perlu memilih salah 1 gambar terlebih dahulu
                        </p>
                    @enderror
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-notes">Catatan Kontributor</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <textarea disabled class="w-full h-28 resize-none px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Notes" id="forms-note">{{$usernotes == null ? " " : $usernotes }}</textarea>
                </div>
            </div>
            @if (session()->has('message'))
                @if (session('verified') == 1)
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                @else
                    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3" role="alert">
                @endif
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="reject()" class="text-white bg-red-400 rounded-md p-3 mr-2">Tolak Kontribusi</button>
            <button wire:click="accept()" class="text-white bg-green-400 rounded-md p-3">Terima Kontribusi</button>
        </div>
    </div>
    @push('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.cari').select2();
        $('.cari').select2().on('select2:select', function(e) {
            // var data = e.params.data;
            // $("#animals").val(data.id);
            let livewire = $(this).data('livewire');
            eval(livewire).set('animalsId', parseInt($(this).val()));
            console.log($(this).val())
        });
        $('.cari').val(0).trigger('change');
    });

    mapboxgl.accessToken = '{{$key}}';
    var map = new mapboxgl.Map({
        container: 'map',
        center: [116.93847656250001, -2.1864386394452024],
        zoom: 3,
        style: 'mapbox://styles/mapbox/streets-v11'
    });
    var marker = new mapboxgl.Marker()
            .setLngLat([0, 0])
            .addTo(map);
    document.addEventListener('contentChanged', () => {
        var lat = document.getElementById('lat').value;
        var lng = document.getElementById('lng').value;
        console.log(lng);
        marker.setLngLat([lng, lat]);
        $('.cari').val(0).trigger('change');
    });
    </script>
    @endpush
</div>
