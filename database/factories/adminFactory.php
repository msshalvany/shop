<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=>$this->faker->name,
            'image'=>$this->faker->imageUrl,
            'levele'=>$this->faker->numberBetween(1,3),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '123', // password
        ];
    }
}
