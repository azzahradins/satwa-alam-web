@extends('layouts.guest.master')
@section('satwa', 'font-semibold active')
@section('breadcrumbs', 'Data Satwa')
@section('breadcrumbs-link', 'satwa')
@section('content')
<div class="container mt-4 mx-auto flex-row justify-center lg:justify-between border-none sm:border-b-2 items-center px-6">
    <div class="w-full bg-primary flex flex rounded-xl">
        <div class="w-full lg:w-1/3 text-white py-9 pl-6">
            <p class="font-bold text-3xl mb-2 font-bold"> Informasi Satwa Alam </p>
            <p> Informasi satwa alam yang terdaftar sudah diverifikasi oleh pengamat, sehinga data dapat dijadikan acuan</p>
        </div>
    </div>
</div>
<livewire:satwa-component />
@endsection
