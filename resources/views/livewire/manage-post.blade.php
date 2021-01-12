@section('contribution', 'ml-8 shadow-lg bg-gray-200 text-gray-800')
@section('header', 'Kontribusi Informasi Satwa')
@section('content')
<div class="w-full flex md:flex-row sm:flex-col px-6">
    <div class="flex flex-col w-6/12 md:w-9/12 sm:w-full mr-4">
        <div class="flex">
            <div class="relative w-full text-gray-600 focus-within:text-gray-400 z-0">
              <span class="z-10 absolute inset-y-0 left-0 flex items-center pl-2">
                <button class="p-1 focus:outline-none focus:shadow-outline">
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
               </span>
              <input type="search" name="q" class="py-2 w-full text-sm text-grey-800 bg-grey-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
            </div>
        </div>
        <div class="flex">
            <table class="table-fixed w-full flex-nowarp sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-3">
                <thead class="flex-none text-white">
                    <tr class="bg-teal-700 flex flex-col sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Kontributor</th>
                        <th class="p-3 text-left">Nama Satwa</th>
                        <th class="p-3 text-left w-1/4"></th>
                    </tr>
                </thead>
                <tbody class="flex-none sm:flex-none">
                    <tr class="flex flex-col flex-none sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate overflow-ellipsis">Azzahra Dinda S</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Burung Perkutut</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">Periksa</td>
                    </tr>
                    <tr>
                        {{-- Kalau datanya ada banyak --}}
                        <td colspan="3" class="text-center py-3">Load More</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex w-full bg-accent">a</div>
</div>
@endsection
