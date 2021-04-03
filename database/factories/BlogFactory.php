<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(50),
            // 'target_site' => $this->faker->randomElement(['胸', '腕', '肩', '腹', '背中', '脚', 'その他']),
            'content' => $this->faker->realText(200),
            'user_id' => function() {
                return User::factory();
            }
        ];
    }
}
