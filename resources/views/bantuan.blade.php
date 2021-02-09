@extends('layouts.guest.master')
@section('bantuan', 'font-semibold active')
@section('breadcrumbs', 'Bantuan & Fitur')
@section('breadcrumbs-link', 'bantuan')
@section('content')
<div class="w-full justify-center">
    <div class="md:container mx-auto flex flex-col justify-center lg:justify-between border-none sm:border-b-2 items-center px-6">
        <h1 class="font-bold text-2xl mb-1 mt-5">Bantuan</h1>
        <div class="sm:w-full md:w-2/4 border-l-8 pl-3">
            <b>Q</b> : Dimana kami dapat berkontribusi untuk menambahkan satwa?
            <br>
            <b>A</b> : Pada aplikasi android yang telah disediakan. Karena kami memerlukan metadata seperti longitude dan latitude serta jamnya. <br> <i class="text-blue-700"> Aplikasi kami dapat didownload melalui link berikut (disini) </i>
        </div>

        <div class="sm:w-full md:w-2/4 border-l-8 pl-3 mt-4">
            <b>Q</b> : Adakah persyaratan khusus untuk mengupload satwa?
            <br>
            <b>A</b> : Setiap user harus melakukan verifikasi email dan tervalidasi oleh admin
            <br>
        </div>

        <div class="sm:w-full md:w-2/4 border-l-8 pl-3 mt-4">
            <b>Q</b> : Apakah terdapat limitasi berapa satwa yang boleh diupload?
            <br>
            <b>A</b> : Tidak, namun tidak semua satwa yang diupload akan diterima, kami akan mengkurasi semua satwa yang masuk dan menfilter yang mana yang cocok dan tidak

            <br>
        </div>

        <div class="sm:w-full md:w-2/4 border-l-8 pl-3 mt-4">
            <b>Q</b> : Apabila permintaan tidak terverifikasi apa yang dapat kami lakukan?
            <br>
            <b>A</b> : Anda dapat mengirimkan email kepada kami agar dapat kami lakukan verifikasi ulang.
            <br>
        </div>

        <div class="sm:w-full md:w-2/4 border-l-8 pl-3 mt-4 text-lg">
            Apabila terdapat pertanyaan diluar hal tersebut, dapat diajukan ke email@email.com
        </div>

        <h1 class="font-bold mt-5 text-2xl mb-1" id="fitur"> Fitur </h2>
        <div>
            <ul>
                <li>
                    Mengetahui lokasi hewan berada pada saat tertentu dan pukul tertentu
                </li>
                <li class="mt-3">
                    Mendapatkan informasi pesebaran satwa yang terdapat di Indonesia
                </li>
                <li class="mt-3">
                    Memperluas wawasan mengenai satwa yang tersebar di Indonesia
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
