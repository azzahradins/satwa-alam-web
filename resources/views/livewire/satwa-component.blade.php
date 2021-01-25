@section('satwa', 'font-semibold active')
@section('breadcrumbs', 'Data Satwa')
@section('breadcrumbs-link', 'satwa')
<div>
    <div class="container mt-4 mx-auto flex-row justify-center lg:justify-between border-none sm:border-b-2 items-center px-6">
        <div class="w-full bg-primary flex flex rounded-xl">
            <div class="w-full lg:w-1/3 text-white py-9 pl-6">
                <p class="font-bold text-3xl mb-2 font-bold"> Informasi Satwa Alam </p>
                <p> Informasi satwa alam yang terdaftar sudah diverifikasi oleh pengamat, sehinga data dapat dijadikan acuan</p>
            </div>
        </div>
    </div>
    {{-- Filter data satwa --}}
    <div class="container mx-auto w-screen flex flex-row px-6 mt-4 p-3">
        <div class="w-2/12 flex flex-col flex-shrink-0 flex-grow-0 mr-4">
            <h1 class="text-lg font-medium mb-2">Filter Data Satwa</h1>
            <hr>
            {{-- Nanti ini berdasarkan kategori --}}
            <strong class="text-sm mt-3 mb-1">Kategori</strong>
            <a href="#" class="mb-1 ml-2">Amphibi</a>
            <a href="#" class="mb-1 ml-2">Mamalia</a>
        </div>
        <div class="w-full flex flex-col">
            <div class="flex text-gray-600 mb-3">
                <input type="text" name="search" wire:model="searchTerm" placeholder="Cari Satwa Alam" class="w-full bg-white h-10 px-5 pr-10 rounded-full text-sm form-control " autocomplete="off"/>
                <button type="submit" class="ml-2">
                  <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                  </svg>
                </button>
            </div>
            <div class="flex flex-grow mb-3">
                <div class="w-full grid grid-cols-4 gap-3">
                    @foreach ($data as $satwa)
                    <div class="h-full border rounded-md">
                        <a class="flex flex-col" href="{{ route('satwa_detail', ['animalsId'=>$satwa->id]) }}">
                                @if ($satwa->featured_image != "null")
                                <img class="flex w-full h-40 object-cover" src="{{ asset($satwa->featured_image) }}">
                                @else
                                <img class="flex w-full h-40 object-cover" src="https://via.placeholder.com/256x144">
                                @endif
                            <div class="flex w-full h-1/2 p-2 flex flex-cols">
                                <div class="w-11/12">
                                    <h1 class="font-medium">{{$satwa->animals_name}}</h1>
                                    <p class="overflow-hidden text-sm">{{$satwa->scientific_name}}r</p>
                                    <p class="overflow-hidden text-sm font-light">Tags : {{$satwa->species}}</p>
                                </div>
                                <div class="flex content-center">
                                    <svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- {{$data->links()}} --}}
        </div>
    </div>
</div>
