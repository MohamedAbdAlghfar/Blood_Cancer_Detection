<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;

    public function definition(): array 
    {
        return [
            'name' => fake()->name(), 
            'phone' => $this->faker->phoneNumber('###-###-####'),
            'gender' => $this->faker->randomElement([0,1]),  
            'age' => $this->faker->numberBetween($min = 1, $max = 100),  
            'address' => $this->faker->sentence,
        ];
    }
}
