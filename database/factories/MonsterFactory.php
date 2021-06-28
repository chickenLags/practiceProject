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
        $vitality = $this->faker->numberBetween(1, 10);
        $wisdom = $this->faker->numberBetween(1, 10);
        return [
            'name' => $this->faker->name,
            'level' => $randomLevel,

            'hp' => (3 * $randomLevel) * ((0.6 * $vitality) + (0.4 * $wisdom)),
            'strength' => $this->faker->numberBetween(1, 10),
            'vitality' => $vitality,
            'agility' => $this->faker->numberBetween(1, 10),
            'wisdom' => $wisdom,
            'spirit' => $this->faker->numberBetween(1, 10),
            'hit_rate' => $this->faker->numberBetween(1, 10),
            'luck' => $this->faker->numberBetween(1, 10),
            'evasion' => $this->faker->numberBetween(1, 10),
            'speed' => $this->faker->numberBetween(1, 10),

            'image_url' => '/img/gargoyle.png',
        ];
    }
}
