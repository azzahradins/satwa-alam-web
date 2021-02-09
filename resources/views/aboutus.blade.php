@extends('layouts.guest.master')
@section('aboutus', 'font-semibold active')
@section('breadcrumbs', 'Tentang Kami')
@section('breadcrumbs-link', 'aboutus')
@section('content')
<div class="w-full justify-center">
    <div class="bg-primary mx-auto flex flex-col lg:justify-between border-none sm:border-b-2 items-center px-6">
        <div class="md:container mt-10 items-center">
            <h1 class="w-full text-center text-blue-900 font-black text-5xl mb-2">
                Nature Hunt Story</h1>
            <p class="text-center text-lg font-medium text-white mb-10">
                We care to animals around us to make a better world.</p>
        </div>
    </div>
    <div class="w-full items-center md:container mt-8 mx-auto flex flex-col lg:justify-center border-none sm:border-b-2 px-6">
        <div class="w-3/4">
            <h1 class="text-xl font-bold text-center mb-4">Our Goals</h1>
            <p class="text-lg font-normal mb-10">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae tellus ultricies, commodo magna ac, venenatis ante. Maecenas ligula mauris, ultrices in justo ac, interdum semper orci. Quisque ut tristique tellus, in mattis sem. Nunc tellus arcu, maximus quis efficitur sed, feugiat sed eros. Nulla et erat et eros malesuada dapibus nec ac sapien. Pellentesque venenatis, quam at hendrerit egestas, lectus ipsum consectetur felis, in iaculis eros ex vel massa. Vestibulum luctus ex sed massa hendrerit dictum. Etiam ut metus pretium, tincidunt felis vel, efficitur dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse eleifend dui ut faucibus fringilla. </p>
        </div>
    </div>
</div>
@endsection
