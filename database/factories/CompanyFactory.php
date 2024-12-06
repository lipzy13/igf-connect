<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'company_name' => fake()->unique()->name(),
            'representative_name' => fake()->name(),
            'address' => fake()->address(),
            'about_us' => fake()->paragraph(),
            'company_type' => 'Business',
            'status' => 'active',
            'country' => fake()->country(),
            'user_id' => 1,
        ];
    }
}
