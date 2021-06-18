<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
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
        $faker = \Faker\Factory::create('id_id');
        return [
            'team_id' => Team::inRandomOrder()->first()->id,
            'position_id' => Position::inRandomOrder()->first()->id,
            'name' => $faker->name(),
            'berat_badan' => rand(48, 60),
            'nomor' => $faker->unique()->numberBetween(1, 100),

        ];
    }
}
