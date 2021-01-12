<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Nature Treasure') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet'>
    @livewireStyles
</head>

<body class="sm:static md:relative min-h-screen w-screen antialiased bg-gray-200 pleading-none font-sans">
    <div id="app" class="flex flex-row">
        <header id="nav-content" class="sm:absolute z-50 md:static transform sm:-translate-x-full md:translate-x-0 transition-all duration-300 ease-out font-sans lg:w-3/12 md:w-4/12 sm:w-7/12 leading-loose flex flex-col h-screen flex border-b-2 text-white lg:border-none py-6 pl-6 bg-primary">
            <h1 class="font-medium text-2xl mb-2">Nature Hunt</h1>
            <a href="{{ route('admin') }}" class="py-2 pl-5 mb-2 rounded-l-full @if (View::hasSection('dashboard')) @yield('dashboard') @else transition duration-300 ease-in hover:bg-secondary @endif"> Dashboard </a>
            <a href="#" class="py-2 pl-5 mb-2 rounded-l-full @if (View::hasSection('user')) @yield('user') @else transition duration-300 ease-in hover:bg-secondary @endif"> User Management </a>
            <a href="#" class="py-2 pl-5 mb-2 rounded-l-full @if (View::hasSection('information')) @yield('information') @else transition duration-300 ease-in hover:bg-secondary @endif"> Informasi Satwa </a>
            <a href="{{ route('manage') }}" class="py-2 pl-5 mb-2 rounded-l-full @if (View::hasSection('contribution')) @yield('contribution') @else transition duration-300 ease-in hover:bg-secondary @endif"> Kontribusi Satwa </a>
            <hr class="mr-6 mt-3 mb-3 shadow-lg h-1">
            <a href="#" class="py-2 pl-5 mb-2 rounded-l-lg @if (View::hasSection('setting')) @yield('setting') @else transition duration-300 ease-in hover:bg-secondary @endif"> Setting </a>
            <a href="{{ route('logout') }}" class="py-2 pl-5 mb-2 rounded-l-lg transition duration-300 ease-in hover:bg-secondary" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </header>

        <main class="sm:no-container md:container flex flex-col sm:mt-10">
            <div class="w-full sm:px-6 mb-3">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                    <div class="w-full p-5 flex flex-row items-center">
                        <div class="block lg:hidden md:hidden">
                            <button id="nav-toggle" class="flex items-center p-2 mr-2 text-gray-500">
                                <svg class="fill-current h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                            </button>
                        </div>
                        <p class="text-gray-700 md:text-2xl sm:text-lg font-semibold leading-relaxed">
                            @yield('header')
                        </p>
                    </div>
                </section>
            </div>

            @yield('content')

    </div>
    @livewireScripts
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    <script>
        window.addEventListener('click', function(e){
            if (document.getElementById('nav-toggle').contains(e.target)){
                document.getElementById('nav-content').classList.replace("sm:-translate-x-full", "sm:-translate-x-0");
            } else{
                document.getElementById('nav-content').classList.replace("sm:-translate-x-0", "sm:-translate-x-full");
            }
        });
		//Javascript to toggle the menu
		// document.getElementById('nav-toggle').onclick = function(){
        //     // Click on menu button
		// 	document.getElementById("nav-content").classList.replace("sm:-translate-x-full", "sm:-translate-x-0");
        // }
	</script>
    @stack('script')
</body>
</html>
