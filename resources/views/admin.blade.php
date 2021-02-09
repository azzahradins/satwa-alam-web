@extends('layouts.admin.master')
@section('dashboard', ' ml-8 shadow-lg bg-gray-200 text-gray-800')
@section('header', 'Dashboard')
@section('content')
    <div class="w-full sm:px-6 md:text-sm lg:text-md">
        <section class="flex flex-col break-words sm:border-1 mb-3">
            <div class="w-full flex flex-row items-center">
                <div class="text-white items-center flex flex-row w-2/6 shadow-lg mr-2 rounded-md p-2 bg-gradient-to-r from-green-400 via-green-500 to-green-700">
                    <div class="w-full">
                        <span class="text-3xl font-semibold">{{$satwa->count()}}</span>
                        <h2 class="text-lg font-light">Total Satwa</h2>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="text-white w-2/6 shadow-lg mr-2 rounded-md p-2 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-700">
                    <span class="text-3xl font-semibold">{{$kontribusi->count()}}</span>
                    <h2 class="text-lg font-light">Total Kontribusi</h2>
                </div>
                <div class="text-white shadow-lg w-2/6 mr-2 rounded-md p-2 bg-gradient-to-r from-purple-400 via-purple-800 to-blue-900">
                    <span class="text-3xl font-semibold">{{$pendinguser->count()}}</span>
                    <h2 class="text-lg font-light">Pending User</h2>
                </div>
                <div class="text-white shadow-lg w-2/6 rounded-md p-2 bg-gradient-to-r from-blue-500 to-blue-800">
                    <span class="text-3xl font-semibold">{{$pending->count()}}</span>
                    <h2 class="text-lg font-light">Pending Posts</h2>
                </div>
            </div>
        </section>
        <section class="flex flex-row break-words sm:border-1 mb-3">
            <div class="flex flex-1 flex-col mr-3">
                <h1 class="font-semibold text-xl mb-1">Admin Task</h1>
                <p class="text-md mb-1 leading-relaxed mb-2">Selamat datang, berikut adalah privilege yang dapat anda lakukan: </p>
                <div class="bg-white shadow-lg p-4 rounded-lg mb-3">Validasi User</div>
                <div class="bg-white shadow-lg p-4 rounded-lg mb-3">Validasi Kontribusi Satwa</div>
                <div class="bg-white shadow-lg p-4 rounded-lg mb-3">Kelola & Validasi Data Satwa Alam</div>
            </div>
            <div class="flex flex-1 flex-col mr-3">
                <div class="bg-white rounded-lg shadow-md">
                    <h1 class="p-3">Kontribusi Terakhir</h1>
                    <table class="table-auto w-full">
                        <thead class="justify-between">
                            <tr class="bg-gray-800 text-white">
                                <td class="py-1 pl-2">Nama Hewan</td>
                                <td>Tanggal</td>
                                <td class="text-center pr-2">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontribusi as $k)
                            <tr class="border-b-2 border-gray-200">
                                <td class="pl-3 py-4 flex flex-row items-center">
                                    @if($k->type==null)
                                        <i>Unidentified</i>
                                    @else
                                        {{$k->type}}
                                    @endif
                                </td>
                                <td>{{$k->created_at->diffForHumans()}}</td>
                                <td>
                                    @if ($k->verified == 1)
                                        <span class="text-green-500 pr-2 flex justify-center">
                                            Accepted
                                        </span>
                                    @elseif($k->verified == 0)
                                        <span class="text-red-500 pr-2 flex justify-center">
                                            Pending
                                        </span>
                                    @else
                                        <span class="text-red-500 pr-2 flex justify-center">
                                            Rejected
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('admin.manage') }}" class="py-3 text-sm px-3 flex justify-end text-blue-800"> Lihat lainnya.. </a>
                </div>
            </div>
            <div class="flex flex-1 flex-col">
                <div class="bg-white rounded-lg shadow-md">
                    <h1 class="p-3">User Menunggu Validasi</h1>
                    <table class="table-auto w-full">
                        <thead class="justify-between">
                            <tr class="bg-gray-800 text-white">
                                <td class="py-1 pl-4">Nama</td>
                                <td class="text-center pr-2">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendinguser as $pu)
                            <tr class="border-b-2 border-gray-200">
                                <td class="pl-4 py-3">{{$pu->name}}</td>
                                <td><span class="text-green-500 pr-2 flex justify-center">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="#2c3e50"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="12" r="9" />
                                    <polyline points="12 7 12 12 15 15" />
                                    </svg>
                                </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($pendinguser->count() >= 5)
                        <a href="{{ route('admin.manageuser') }}" class="py-3 text-sm px-3 flex justify-end text-blue-800"> Lihat semua permintaan.. </a>
                    @elseif ($pendinguser->count() == 0)
                        <a class="py-3 text-sm px-3 flex justify-center text-grey-800"> Tidak ada permintaan user </a>
                    @elseif ($pendinguser->count() > 0 && $pendinguser->count() <= 5)
                    <a href="{{ route('admin.manageuser') }}" class="py-3 text-sm px-3 flex justify-end text-blue-800"> Kelola hak akses pengguna </a>
                    @endif
                </div>
            </div>
        </section>
    </div>
<script>
function openMenu(){
    var nav = document.getElementById("navigation");
    nav.classList.add("hidden")
}
</script>
@endsection
