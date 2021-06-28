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

                    <h1>Battle</h1>
                    <div class="battle-container">
                        <div class="stats enemy-stats">
                            <label entity-name></label>
                            <div class="hp-bar"><div class="current-health"></div></div>
                        </div>
                        <div class="enemy-self entity-portrait">
                            <img class="entity-image" src=" {{asset('/img/default.png')}}">
                        </div>

                        <div class="player-self entity-portrait">
                            <img class="entity-image flip-image entity-image" src=" {{asset('/img/default.png')}}">
                        </div>

                        <div class="stats player-stats">
                            <label entity-name></label>
                            <div class="hp-bar"><div class="current-health"></div></div>
                        </div>

                        <div class="combat-menu "></div>
                        <div class="notification ">test</div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</x-app-layout>
