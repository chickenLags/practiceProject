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
                        <div class="enemy-stats"></div>
                        <div class="enemy-self"></div>

                        <div class="player-self"></div>
                        <div class="player-options "></div>

                        <div class="player-stats">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let enemyStats = document.querySelector('.enemy-stats');
        let enemySelf = document.querySelector('.enemy-self');
        let playerSelf = document.querySelector('.player-self');
        let playerOptions = document.querySelector('.player-options');
        let playerStats = document.querySelector('.player-stats');
    </script>
</x-app-layout>
