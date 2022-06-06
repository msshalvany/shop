<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class sliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'=>$this->faker->imageUrl,
        ];
    }
}
