{{--
    location : /users/satwa/detail/id
    base layout
--}}
@extends('layouts.guest.master')
@section('satwa', 'font-semibold active')
@section('breadcrumbs', 'Detail Satwa')
@section('breadcrumbs-link', 'satwa')
@section('content')
@livewire('detail-satwa-component', ['animalsId' => $id])
@endsection
