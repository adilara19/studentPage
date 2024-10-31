<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(rand(1, 3)),
            'surname' => $this->faker->sentence(rand(1, 3)),
            'department' => $this->faker->sentence(rand(1, 3)),
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->regexify('^\\+1-\\([0-9]{3}\\)-[0-9]{3}-[0-9]{4}$'),
        ];
    }
}
