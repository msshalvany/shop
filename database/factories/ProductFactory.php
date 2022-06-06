<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arrayValues=['mobile', 'computer','homeApp','asidApp','game'];
        return [
          'name'=>$this->faker->name,
          'image'=>$this->faker->imageUrl,
          'attrbute'=>'{"dasd":"sas12312","qweqwe":"12312"}',
          'idia'=>'["yes","no","yes"]',
          'description'=>$this->faker->realTextBetween(60,80),
          'price'=>$this->faker->numberBetween(1,1000),
          'count'=>$this->faker->numberBetween(1,1000),
          'discount'=>$this->faker->numberBetween(1,100),
          'byed'=>$this->faker->numberBetween(1,1000),
          'viseted'=>$this->faker->numberBetween(1,1000),
          'category' => $arrayValues[rand(0,4)],
        ];
    }
}
