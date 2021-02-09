<div class="flex sm:flex-col md:flex-row px-6 sm:px-6 md:text-sm lg:text-md" wire:poll.keep-alive>
    <div class="flex flex-col w-6/12 md:w-9/12 sm:w-full mr-4">
        <div>
            <div class="relative w-full text-gray-600 focus-within:text-gray-400 z-0">
            <span class="z-10 absolute inset-y-0 left-0 flex items-center pl-2">
                <button class="p-1 focus:outline-none focus:shadow-outline">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </span>
            <input wire:model="cariKontribusi" type="search" name="q" class="py-2 w-full text-sm text-grey-800 bg-grey-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
            </div>
        </div>
        {{-- Filter sudah / belum / ditolak --}}
        <div class="flex flex-row mt-2 text-sm">
            @foreach ($sortPosts as $sort)
                @if ($sort == $selection)
                <div class="justify-between rounded-md bg-secondary text-white py-2 flex flex-row pr-2 mr-2 pl-2">
                    <a>{{$sort}}</a>
                    <svg wire:click.prevent="clearsort()" class="flex h-full w-4 fill-current items-center ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                @else
                <div wire:click.prevent="sort({{$loop->index}}, '{{$sort}}')" class="justify-between bg-white flex flex-row mr-2 pr-2 transition duration-200 ease-in-out hover:bg-secondary hover:text-white py-2 hover:border rounded-md pl-2">
                    <a>{{$sort}}</a>
                </div>
                @endif
            @endforeach
        </div>
        {{-- Table of data --}}
        <div>
            <table class="table-fixed w-full flex-nowarp sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-3">
                <thead class="flex-none text-white">
                    <tr class="bg-teal-700 flex text-sm flex-col sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Tipe Satwa</th>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-left w-1/6">Verifikasi</th>
                        <th class="p-3 text-left w-1/6">Action</th>
                    </tr>
                </thead>
                <tbody class="flex-none sm:flex-none">
                    @if ($posts->count() > 0)
                    @foreach ($posts->items() as $contributions)
                        <tr class="flex flex-col flex-none sm:table-row mb-2 sm:mb-0">
                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{$contributions->type == null ? "-" : $contributions->type}}</td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{date('d F Y', strtotime($contributions->created_at))}}</td>
                            @if ($contributions->verified == 1)
                            <td class="border-grey-light text-green-600 border hover:bg-gray-100 p-3 truncate">Diterima</td>
                            @elseif($contributions->verified == 2)
                            <td class="border-grey-light text-red-600 border hover:bg-gray-100 p-3 truncate">Ditolak</td>
                            @else
                            <td class="border-grey-light text-yellow-400 border hover:bg-gray-100 p-3 truncate">Pending</td>
                            @endif
                            <td wire:click="checkPosts({{$contributions->id}})" class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
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
            {{$posts->links()}}
        </div>
    </div>
    <div class="flex w-full sm:mt-3 md:mt-0">
        @livewire('manage-posts')
    </div>
</div>
