{{--
    location /admin/contributions
    function : to accept and reject form of contributions
--}}
<div class="w-full mb-3">
    <div class="p-3 bg-white w-full rounded-md shadow-md">
        <h2 class="text-lg font-semibold">Validasi Satwa</h2>
        <p class="font-light mb-1">Satwa yang tampil hanya satwa yang memiliki kontribusi</p>
        <div>
            {{-- Form Nama Satwa --}}
            <div class="text-gray-700 mb-1 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-contributor">Nama Satwa</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <input wire:model="name" class="w-full h-8 px-2 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Nama Satwa" id="forms-contributor"/>
                </div>
            </div>
            <div class="text-gray-700 mb-2 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                </div>
                <div class="md:w-3/4 md:flex-grow">
                    @error('name')
                        <p class="text-red-500 text-xs italic">
                            {{$message}}
                        </p>
                    @enderror
                </div>
            </div>
            {{-- Form Scientific Name --}}
            <div class="text-gray-700 md:flex mb-3 md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-type overflow-clip">Scientific Name</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <input wire:model="scientific_name" class="w-full h-8 px-2 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Nama Ilmiah" id="forms-type"/>
                </div>
            </div>
            {{-- Form Species --}}
            <div class="text-gray-700 md:flex mb-3 md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-type overflow-clip">Species</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <input wire:model="species" class="w-full h-8 px-2 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Species" id="forms-type"/>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                </div>
                <div class="md:w-3/4 md:flex-grow">
                    @error('species')
                        <p class="text-red-500 text-xs italic">
                            Harus mengisi jenis species
                        </p>
                    @enderror
                </div>
            </div>
            {{-- Form Gambar --}}
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-image">Gambar Sampul</label>
                </div>
                @php
                    $list = null;
                    if($idSatwa!=null){
                        $list = explode('_', $image);
                    }
                @endphp
                @if ($image != "")
                <div class="md:w-3/4 flex flex-col">
                    <div class="flex">
                        @if ($list != null)
                        @foreach ($list as $image)
                        <div class="border rounded-md pb-2 mr-2">
                            <img class="w-36 object-cover h-20 mb-2" src="{{ asset('uploads/'. $image) }}"/>
                            <label class="text-gray-700 pl-2">
                                <input type="radio" name="featured_image" checked wire:model="selected" value="{{$image}}"/>
                                <span class="ml-1">Pilih</span>
                            </label>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                @endif
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                </div>

                <div class="md:w-3/4 md:flex-grow">
                    <p class="text-green-500 text-xs italic">
                        @json($selected)
                        Gambar hanya bisa dipilih dari kontribusi user
                    </p>
                </div>
            </div>
            <div class="text-gray-700 mb-3 md:flex md:items-center">
                <div class="mb-1 md:mb-0 md:w-1/4">
                  <label for="forms-notes">Deskripsi Satwa</label>
                </div>
                <div class="md:w-3/4 md:flex-grow">
                  <textarea wire:model="deskripsi" class="w-full h-28 resize-none px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline" type="text" placeholder="Deskripsi Satwa" id="forms-note"></textarea>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($updateMode == 1)
                <button wire:click="updateSatwa()" class="text-white bg-green-400 rounded-md p-3">Update Satwa {{$name}}</button>
                <button wire:click="closeSatwa()" class="text-white bg-red-400 rounded-md p-3">Tutup Satwa</button>
            @else
                <button wire:click="createNew()" class="text-white bg-green-400 rounded-md p-3">Tambahkan Satwa Baru</button>
            @endif
        </div>
    </div>
</div>
