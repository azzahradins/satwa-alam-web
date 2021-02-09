<div class="flex sm:flex-col md:flex-row px-6 sm:px-6 md:text-sm lg:text-md" wire:poll.keep-alive>
    <div class="flex flex-col w-6/12 md:w-9/12 sm:w-full mr-4">
        <div>
            <div class="relative w-full text-gray-600 focus-within:text-gray-400 z-0">
            <span class="z-10 absolute inset-y-0 left-0 flex items-center pl-2">
                <button class="p-1 focus:outline-none focus:shadow-outline">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </span>
            <input wire:model="cariSatwa" type="search" name="q" class="py-2 w-full text-sm text-grey-800 bg-grey-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search Nama Satwa / Nama Ilmiah / Species" autocomplete="off">
            </div>
        </div>
        {{-- Table of data --}}
        <div>
            <table class="table-fixed w-full flex-nowarp sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2">
                <thead class="flex-none text-white">
                    <tr class="bg-teal-700 flex text-sm flex-col sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left w-1/4">Nama Satwa</th>
                        <th class="p-3 text-left w-1/4">Scientific Name</th>
                        <th class="p-3 text-left w-1/6">Species</th>
                        <th class="p-3 text-left w-1/6">Action</th>
                    </tr>
                </thead>
                <tbody class="flex-none sm:flex-none">
                    @if ($satwa->count() > 0)
                        @foreach ($satwa->items() as $s)
                        {{-- Open satwa mengambil ID, dan kondisi edit = true --}}
                        <tr wire:click.prevent="openFormSatwaEdit({{$s->id, 1}})" class="flex flex-col flex-none sm:table-row mb-2 sm:mb-0">
                            <td class="font-semibold border-grey-light border hover:bg-gray-100 p-3 truncate">{{$s->animals_name}}</td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$s->scientific_name}}</td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$s->species}}</td>
                            <td wire:click="openFormSatwaEdit({{$s->id}})" class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                                <a>Periksa</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr class="flex flex-col flex-none sm:table-row mb-2 sm:mb-0">
                            <td class="text-center border-grey-light border hover:bg-gray-100 p-3 truncate" colspan="4">Tidak ada data ditemukan</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{$satwa->links()}}
        </div>
    </div>
    <div class="flex w-full sm:mt-3 md:mt-0">
        @livewire('form-satwa')
    </div>
</div>
