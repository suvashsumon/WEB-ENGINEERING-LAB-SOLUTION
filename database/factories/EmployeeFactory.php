<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'designation' => $this->faker->jobTitle(),
            'joining_date' => $this->faker->date(),
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_no' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
