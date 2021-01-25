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

<body class="min-h-screen antialiased bg-gray-100 pleading-none font-sans">
    <div id="app">
        <header class="border-b-2 lg:border-none py-6 ">
            <div class="container mx-auto flex justify-center lg:justify-between border-none sm:border-b-2 items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-md lg:mr-6 lg:inline-block text-center font-semibold text-gray-700 no-underline">
                        {{ __('Nature Hunt') }}
                    </a>
                    {{-- menu on desktops --}}
                    <a href="{{ url('/satwa') }}" class="px-3 py-2 text-md hidden @yield('satwa') lg:inline-block font-normal text-gray-700 no-underline">
                        {{ __('Data Satwa') }}
                    </a>
                    <a href="{{ url('/') }}" class="px-3 py-2 text-md hidden lg:inline-block font-normal text-gray-700 no-underline">
                        {{ __('Tentang Kami') }}
                    </a>
                    <a href="{{ url('/') }}" class="px-3 py-2 text-md hidden lg:inline-block font-normal text-gray-700 no-underline">
                        {{ __('Bantuan') }}
                    </a>
                </div>

                {{-- Action --}}
                <nav class="space-x-4 text-sm sm:text-base">
                    @guest
                        <a class="lg:inline-block hidden no-underline text-gray-600" href="{{ route('login') }}">
                            {{ __('Masuk') }}
                        </a>
                        @if (Route::has('register'))
                            <a class="lg:inline-block hidden rounded-full no-underline text-gray-50 transition duration-500 ease-in-out bg-accent font-semibold hover:bg-darker p-3 px-5 border" href="{{ route('register') }}">
                                {{ __('Mendaftar') }}
                            </a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}"
                        class="transition no-underline bg-accent p-3 rounded text-gray-50 px-5 transition duration-200 ease-in hover:bg-darker"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

    </div>
    <nav class="sticky top-0 z-40 bg-darker p-2">
        <ol class="list-reset flex text-white">
          <li><a href="{{ route('welcome') }}" class="font-bold">Home</a></li>
          <li><span class="mx-2">/</span></li>
          <li><a href="@yield('name')" class="font-bold">@yield('breadcrumbs')</a></li>
        </ol>
      </nav>
      {{-- {{-- @yield('content') --}}
      {{isset($slot) ? $slot : null}}
      <livewire:satwa-component />
      <div class="bg-secondary text-gray-100 mt-12 pb-6">
        <div class="container content-start h-100 mx-auto flex flex-row border-none sm:border-b-2 px-6 pt-6">
            <div class=" w-4/12 flex flex-col justify-between">
                <div class="flex-col">
                    <h1 class="font-semibold text-2xl">Nature Hunt</h1>
                    <p class="text-sm"> Database satwa portable disaku anda </p>
                </div>
                <div class="flex justify-bottom">
                    <p class="text-sm">&#x000a9; {{now()->year}} Nature hunt Oleh Almeida Tunas Solusi</p>
                </div>
            </div>

            <div class=" w-2/12 flex flex-col">
                <h1 class="font-medium text-xl mb-2">Database Satwa</h1>
                <a href="#" class="text-sm mb-2">Informasi Satwa</a>
                <a href="#" class="text-sm mb-2">Kategori Satwa</a>
                <a href="#" class="text-sm mb-2">Login</a>
                <a href="#" class="text-sm mb-2">Register</a>
            </div>

            <div class=" w-2/12 flex flex-col">
                <h1 class="font-medium text-xl mb-2">Tentang Kami</h1>
                <a href="#" class="text-sm mb-2">Tentang Nature Hunt</a>
                <a href="#" class="text-sm mb-2">Hubungi Kami</a>
                <a href="#" class="text-sm mb-2">Fitur</a>
            </div>

            <div class=" w-2/12 flex flex-grow flex-col">
                <h1 class="font-medium text-xl mb-2">Bantuan</h1>
                <a href="#" class="text-sm mb-2">Frequently Asked Question</a>
                <a href="#" class="text-sm mb-2">Dokumentasi untuk pengembang</a>
                <a href="#" class="text-sm mb-2">Dokumentasi penggunaan</a>
                <a href="#" class="text-sm mb-2">Ajukan pertanyaan</a>
                <a href="#" class="text-sm mb-2">Kritik & Saran</a>
            </div>

            <div class=" w-1/12 flex flex-grow flex-col">
                <h1 class="font-medium text-xl mb-2">Social Media</h1>
                <a href="#" class="text-sm mb-2">Facebook</a>
                <a href="#" class="text-sm mb-2">Instagram</a>
                <a href="#" class="text-sm mb-2">Telegram</a>
            </div>

        </div>
    </div>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
    @stack('script')
    @livewireScripts
</body>
</html>
