<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomNumber = rand(1, 100);
        $logo = "https://picsum.photos/id/{$randomNumber}/200/300";

        return [
            'city_id' => City::inRandomOrder()->first()->id,
            'name' => $this->faker->team,
            'logo_url' => $logo,
            'tahun_berdiri' => rand(2000, 2021),
            'alamat_team' => $this->faker->sentence(50),

        ];
    }
}
