{{--
    Setiap halaman yang memiliki dropdown
    harus memiliki parameter pendukung,
    karena dropdown dibuat supaya customable.
--}}
<button class="dropdown:inline-block w-full relative text-sm bg-gray-100 rounded-md lg:inline-block px-3 py-2 text-md font-normal leading-relaxed text-gray-800 transition-colors duration-150"
        role="navigation" aria-haspopup="true">
    <div class="flex items-center justify-between">
    <span id="initial" class="px-2 text-gray-700">{{$dropdown[0]}}</span>
        <svg class="w-4 h-4 text-gray-500 fill-current" viewBox="0 0 20 20" aria-hidden="true">
            <path
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"
                fill-rule="evenodd">
            </path>
        </svg>
        </div>
        <ul class="absolute right-0 hidden w-auto p-2 mt-3 space-y-2 text-sm bg-white border border-gray-100 rounded-lg shadow-lg"
        aria-label="submenu">
        @foreach ($dropdown as $item)
            <a
            class="inline-block w-full px-2 py-1 font-medium text-right text-gray-600 transition-colors duration-150 rounded-md hover:text-gray-900 focus:outline-none focus:shadow-outline hover:bg-gray-100"
            onclick="onSelectedItem('{{$item}}')">
                {{$item}}
            </a>
        @endforeach
      </ul>
</button>

<script>
    function onSelectedItem(object){
        var shown = document.getElementById('initial');
        console.log(object);
        shown.innerHTML = object;
    }
</script>
