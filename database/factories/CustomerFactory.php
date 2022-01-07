<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'document' => '123456', // password
            'status' => $this->faker->randomElement(['new', 'active', 'suspended', 'cancelled']),
        ];
    }
}
