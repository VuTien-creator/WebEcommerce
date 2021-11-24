<?php

namespace Database\Factories;

use App\Models\BillProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = BillProduct::class;

    public function definition()
    {
        return [
            'bill_id' => rand(10,100),
            'product_id' => rand(13,28),
            'price' => rand(10000000,30000000),
            'quantity' => rand(1,5),
        ];
    }
}
