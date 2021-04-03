<?php

namespace Database\Factories;

use App\Models\Weight;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Weight::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween($startDate = '-6 month', $endDate = 'now'),
            'weight' => $this->faker->numberBetween($min = 60, $max = 80),
            'user_id' => 1,
        ];
    }
}
