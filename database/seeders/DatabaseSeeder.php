<?php

namespace Database\Seeders;

use App\Models\Chunk;
use App\Models\Monster;
use App\Models\User;
use App\Models\WorldMap;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory(1)->create([
            'name' => 'Roy Schouten',
            'email' => 'z_roi@hotmail.com',
            'password' => 'demodemodemo',
        ]);

        $worldMaps = WorldMap::factory(1)->create();
        Chunk::factory(1)->create();

        Monster::factory(10)->create();
    }
}
