@extends('layouts.guest.master')

@section('content')
    {{-- Introduction --}}
    <div class="container mt-4 mx-auto flex-row justify-center lg:justify-between border-none sm:border-b-2 items-center px-6 mb-8">
        <div class="w-full bg-primary flex flex border rounded-xl px-7">
            <div class="w-full lg:w-1/3 text-white py-20 pl-15">
                <p class="font-bold text-3xl mb-2 font-bold"> Mari Berkontribusi dalam Pengamatan Satwa Alam Indonesia </p>
                <p class="mb-7"> Berkat partisipasimu, secara tidak langsung hal ini dapat membantu meningkatkan kualitas informasi pada penelitian hutan dan konservasi alam </p>
                <button href="#" class="rounded-full font-semibold text-center">
                    <div class="flex items-center">
                        <a class="mr-4 text-md" href="{{route('satwa')}}"> Saya tertarik untuk ikut kontribusi </a>
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </div>
            <div class="h-full flex hidden lg:block text-white text-center items-center self-center font-light text-2xl">
                <img src="{{ asset("img/home.svg") }}" class="flex-none w-1/2 h-full mb-3 flex content-center">
            </div>
        </div>
    </div>

    {{-- Jenis Satwa --}}
    <div class="container mx-auto w-screen flex flex-col px-6 mb-12">
        <div class="flex flex-row justify-between">
            <h1 class="font-semibold text-lg pb-2"> Kategori Satwa </h1>
        </div>
        <div class="flex flex-row h-full justify-items-stretch">
            @php
                // TODO : Tolong carikan gambar yo, misalkan Mamalia = Kucing
                // Rencananya ini dipindah ke database aja deh, jadi gausah diisi gpp
                // $items= array("Mamalia", "Vertebra", "Serangga", "Burung", "Amfibia", "Reptilia", "Artropoda", "Moluska");
            @endphp
            @foreach ($items as $item)
                <div class="z-0 flex-1 flex-grow overflow-hidden flex-col text-center shadow-md font-light text-lg mb-2 bg-gray-50
                transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-110 py-4 m-2 rounded-md">
                    <a href="#" class=""> {{ $item->species }} </a>
                </div>
            @endforeach
        </div>
    </div>

    <hr class="mb-8">
    {{-- Tata cara melakukan observasi --}}
    <div class="container mx-auto w-screen flex flex-row px-6">
        <div class="w-2/6 flex flex-col mr-3 justify-center">
            <h1 class="text-2xl font-light"> 3 langkah mudah </h1>
            <h1 class="text-2xl font-medium"> kontribusi pada database satwa alam </h1>
        </div>
        <div class="w-2/6 flex flex-col mx-2 p-4 text-center">
            <h1 class="text-lg mb-2 font-bold"> Kunjungin konservasi terdekat </h1>
            <h1 class="text-md mb-2 font-light"> Namun tidak menutup kemungkinan juga terdapat satwa alam disekitar lingkungan rumahmu </h1>
        </div>
        <div class="w-2/6 flex flex-col mx-2 p-4 text-center">
            <h1 class="text-lg mb-2 font-bold"> Ambil foto dari satwa tersebut </h1>
            <h1 class="text-md mb-2 font-light"> Kamu juga bisa menambahkan juga deskripsi atau info tambahan dari hewan tersebut (jika ada) </h1>
        </div>
        <div class="w-2/6 flex flex-col mx-2 p-4 text-center">
            <h1 class="text-lg mb-2 font-bold"> Upload foto dan menunggu verifikasi </h1>
            <h1 class="text-md mb-2 font-light"> Foto yang sudah diverifikasi akan tampil pada halaman satwa, akan kami sertakan sebagai hasil karya anda </h1>
        </div>
    </div>

    <hr class="mt-7">
    {{-- Top Kontributor --}}
    <div class="container mx-auto w-screen flex flex-col px-6 mt-8">
        <div class="w-full flex flex-col mr-3 text-center">
            <h1 class="text-2xl font-light font-bold">
                Dengan partisipasi dan kontribusi dari semua member <br> yang telah terdata dan terverifikasi jumlah satwa alam yang dapat diakses sebanyak
            </h1>
        </div>
        <div class="w-full flex flex-row mr-3 text-center justify-center mt-8">
            <div class="w-1/6">
                <p class="text-4xl">{{$kontributor}}</p>
                <h1>Kontributor</h1>
            </div>
            <div class="w-1/6">
                <p class="text-4xl">{{$satwa}}</p>
                <h1>Jenis Satwa Alam</h1>
            </div>
            <div class="w-1/6">
                <p class="text-4xl">{{$posts}}</p>
                <h1>User Submission</h1>
            </div>
        </div>
    </div>
@endsection
