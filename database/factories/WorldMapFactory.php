<?php

namespace Database\Factories;

use App\Models\WorldMap;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class WorldMapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorldMap::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text($maxNbChars = 200),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
