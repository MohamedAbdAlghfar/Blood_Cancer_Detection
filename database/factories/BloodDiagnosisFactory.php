<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloodDiagnosis>
 */
class BloodDiagnosisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $patientId = Patient::all()->random()->id; 
        return [
            'diagnoses' => $this->faker->sentence,
            'photo' => $this->faker->randomElement(['1.jpeg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg',]),
            'patient_id' => $patientId,

        ];
    }
}
