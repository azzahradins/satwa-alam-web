{{--
    location : /admin/satwa
    base layout
--}}
@extends('layouts.admin.master')
@section('satwa', 'ml-8 shadow-lg bg-gray-200 text-gray-800')
@section('header', 'Informasi Data Satwa')
@section('content')
    @livewire('manage-satwa')
@endsection
