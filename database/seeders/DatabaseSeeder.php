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
//         \App\Models\User::factory(10)->create();
        $user = User::factory(1)->create([
            'name' => 'Roy Schouten',
            'email' => 'z_roi@hotmail.com',
            'password' => '$2y$10$LPjDG2nlrofmm92zI1Z0CetJ2anYi9fJYC1pScVfVyCpY1EhdrxPO',
        ]);

        $worldMaps = WorldMap::factory(1)->create();
        Chunk::factory(1)->create();

        Monster::factory()->createMany([
            ['name' =>'Gargoyle'],
            ['name' =>'Dybbuk'],
            ['name' =>'Dullahan'],
            ['name' =>'Ghoul'],
            ['name' =>'Draugr'],
        ]);
    }
}
