<?php

namespace Database\Factories;

use App\Models\Monster;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonsterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Monster::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomLevel = $this->faker->numberBetween(0, 5);
        $vitality = $this->faker->numberBetween(1, 3);
        return [
            'name' => $this->faker->name,
            'level' => $randomLevel,

            'hp' => (5 * $vitality) ** (1.20 * $randomLevel),
            'strength' => 1,
            'vitality' => $vitality,
            'agility' => 1,
            'wisdom' => 1,
            'spirit' => 1,
            'hit_rate' => 1,
            'luck' => 1,
            'evasion' => 1,
            'speed' => 1,

            'image_url' => 'temp',
        ];
    }
}
