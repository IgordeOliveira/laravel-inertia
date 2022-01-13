<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'number' => $this->faker->numerify('##############'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'cancelled']),
        ];
    }
}
