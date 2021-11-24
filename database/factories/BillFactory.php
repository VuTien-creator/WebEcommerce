<?php

namespace Database\Factories;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Bill::class;

    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1000 day',now());
        return [
            'user_id' => rand(5,55),
            'total_price' => rand(10000000,100000000),
            'created_at' => $date,
        ];
    }
}
