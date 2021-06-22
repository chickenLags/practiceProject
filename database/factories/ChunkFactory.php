<?php

namespace Database\Factories;

use App\Http\Helpers\DangerNoise;
use App\Http\Helpers\PerlinNoise;
use App\Models\Chunk;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChunkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chunk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'world_map_id' => 1,
            'x' => 0,
            'y' => 0,
            'danger_index' => (new DangerNoise())->random2D(0,0),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
