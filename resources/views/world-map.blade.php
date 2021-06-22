<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('World map') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <div class="grid-65">
                        @forelse($worldMap->chunks as $key => $chunk)
                            <div class='grid-item'  data-x="{{$chunk->x}}" data-y="{{$chunk->y}}">
                                @if($chunk->sameLocationAsPlayer($player))
                                    <div class="player"></div>
                                @endif
                            </div>

                        @empty
                            <li>no chunks</li>
                        @endforelse


                        @php
                        //dd($player);

                        //dd((new Chunk(['x'=>0, 'y' => 0, 'world_map_id' => 1]))->sameLocationAsPlayer($player));
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
