{{--
    location : /admin/users
    base layout
--}}
@extends('layouts.admin.master')
@section('user', 'ml-8 shadow-lg bg-gray-200 text-gray-800')
@section('header', 'Informasi Data Kontributor')
@section('content')
    @livewire('manage-users')
@endsection
