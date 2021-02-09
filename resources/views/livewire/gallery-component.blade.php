<div>
        <div class="flex flex-col">
            <h2 class="font-medium flex text-lg mb-3"> Galeri </h2>
            <div class="flex grid grid-cols-4 gap-3 mx-3">
                @foreach ($gallery as $detailsatwa)
                <div class="h-full border rounded-md">
                    <a href="{{ asset('uploads/'.$detailsatwa["photo"]) }}">
                        <img class="w-full h-60 object-cover" src="{{ asset('uploads/'.$detailsatwa["photo"]) }}">
                        <div class="p-2 flex flex-cols">
                            <div class="w-11/12">
                                <h1 class="font-medium">{{$detailsatwa["type"]}}</h1>
                                <p class="overflow-hidden text-sm">Oleh : {{$detailsatwa["name"]}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @if ($data->hasPages())
                <a wire:click.prevent="loadmore" class="self-center rounded-md p-2 w-2/12 text-center mt-7 border border-4 border-blue-400 transition duration-150 ease-in-out hover:bg-secondary hover:text-white">
                    Load more
                </a>
            @endif
        </div>
</div>
