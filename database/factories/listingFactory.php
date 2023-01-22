<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class listingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(),
            'tags'=>'laravel ,c# ,Backend',
            'company'=>$this->faker->company(),
            'email'=>$this->faker->companyEmail(),
            'location'=>$this->faker->City(),
            'website'=>$this->faker->url(),
            'description'=>$this->faker->paragraph(5)
        ];
    }
}
