{{--
    location : /admin/users
    component
--}}
<div class="flex sm:flex-col md:flex-row px-6 sm:px-6 md:text-sm lg:text-md">
    <div class="flex flex-col w-full md:w-full sm:w-full">
        <div>
            <div class="relative w-full text-gray-600 focus-within:text-gray-400 z-0">
                <span class="z-10 absolute inset-y-0 left-0 flex items-center pl-2">
                    <button class="p-1 focus:outline-none focus:shadow-outline">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </span>
                <input wire:model="cariUser" type="search" name="q" class="py-2 w-full text-sm text-grey-800 bg-grey-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
            </div>
        </div>
        {{-- Filter admin / user / pending --}}
        <div class="flex flex-row mt-2 text-sm">
            @foreach ($sortUser as $sort)
                @if ($selectedSort == $sort->id)
                <div class="justify-between rounded-md bg-secondary text-white py-2 flex flex-row pr-2 pl-2 mr-2">
                    <a>{{$sort->desc}}</a>
                    <svg wire:click.prevent="clearSort()" class="flex h-full w-4 fill-current items-center ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
                @else
                <div wire:click.prevent="sort('{{$sort->id}}')" class="justify-between bg-white flex flex-row mr-2 pr-2 transition duration-200 ease-in-out hover:bg-secondary hover:text-white py-2 hover:border rounded-md pl-2">
                    <a>{{$sort->desc}}</a>
                </div>
                @endif
            @endforeach
        </div>
        @if (session()->has('message'))
            @if (session('verified') == 1)
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-2" role="alert">
            @else
                <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-2" role="alert">
            @endif
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
            </div>
        @endif
        {{-- Table of data --}}
        <div>
            <table class="table-fixed w-full flex-nowarp sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-2">
                <thead class="flex-none text-white">
                    <tr class="bg-teal-700 flex text-sm flex-col sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left w-1/3">Nama User</th>
                        <th class="p-3 text-left w-1/3">Email</th>
                        <th class="p-3 text-left w-1/3">Tanggal Mendaftar</th>
                        <th class="p-3 text-left w-1/3">Status</th>
                        <th class="p-3 text-left w-1/3">Action</th>
                    </tr>
                </thead>
                <tbody class="flex-none sm:flex-none">
                    @if ($user->count() > 0)
                        @foreach ($user as $u)
                            @if (Auth::user()->id != $u->id)
                            <tr class="flex flex-col flex-none hover:bg-gray-150 sm:table-row mb-2 sm:mb-0">
                                <td class="border-grey-light border p-3 truncate">{{$u->name}}</td>
                                <td class="border-grey-light border p-3 truncate">{{$u->email}}</td>
                                <td class="border-grey-light border p-3 truncate">{{date('d F Y', strtotime($u->created_at))}}</td>
                                <td class="border-grey-light border p-3 truncate">{{$u->desc}}</td>
                                <td class="border-grey-light border p-3 truncate">
                                    @if ($u->levels == 1)
                                        <a wire:click="revokeAdmin({{$u->id}}, '{{$u->name}}')" class="p-2 bg-red-300 transition duration-200 ease-in-out hover:bg-red-500">Revoke Admin</a>
                                    @elseif($u->levels == 2)
                                        <a wire:click="grantAdmin({{$u->id}}, '{{$u->name}}')" class="p-2 bg-green-300 transition duration-200 ease-in-out hover:bg-green-500">Grant Admin</a>
                                        <a wire:click="revokeUser({{$u->id}}, '{{$u->name}}')" class="p-2 bg-red-300 transition duration-200 ease-in-out hover:bg-red-500">Revoke User</a>
                                    @elseif($u->levels ==3)
                                        <a wire:click="grantUser({{$u->id}}, '{{$u->name}}')" class="p-2 bg-blue-300 transition duration-200 ease-in-out hover:bg-blue-500">Grant User</a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    @else
                    <tr class="flex flex-col flex-none hover:bg-gray-150 sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border p-3 truncate text-center" colspan="5">Tidak ditemukan apapun</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{$user->links()}}
        </div>
    </div>
</div>
