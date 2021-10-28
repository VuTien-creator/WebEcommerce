<?php

namespace Database\Factories;

use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ProductType::class;

    public function definition()
    {
        return [
            //
            'user_id'=>rand(1,50),
            'name'=>$this->faker->name,
            'slug'=>$this->faker->slug(),
            'status'=>rand(0,2)
        ];
    }
}
