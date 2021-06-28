<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $level = 1;
        $vitality = $this->faker->numberBetween(1, 10);
        $wisdom = $this->faker->numberBetween(1, 10);
        return [
            'level' => $level,
            'hp' => (3 * $level) * ((0.3 * $vitality) + (0.2 * $wisdom)),
            'strength' => $this->faker->numberBetween(1, 10),
            'vitality' => $vitality,
            'agility' => $this->faker->numberBetween(1, 10),
            'wisdom' => $wisdom,
            'spirit' => $this->faker->numberBetween(1, 10),
            'hit_rate' => $this->faker->numberBetween(1, 10),
            'luck' => $this->faker->numberBetween(1, 10),
            'evasion' => $this->faker->numberBetween(1, 10),
            'speed' => $this->faker->numberBetween(1, 10),
            'x' => 0,
            'y' => 0,
            'image_url' => '/img/player.png',
        ];
    }
}
