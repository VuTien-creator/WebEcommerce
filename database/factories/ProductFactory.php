<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            //
            'name'=>$this->faker->name(),
            'product_type_id'=>rand(1,50),
            'slug'=>$this->faker->slug(),
            'status'=>rand(0,2),
            'image'=>$this->faker->imageUrl(),
            'price'=>rand(100000,500000),
            'description'=>$this->faker->text(500),
            'quantity' => rand(0,50)
        ];
    }
}
