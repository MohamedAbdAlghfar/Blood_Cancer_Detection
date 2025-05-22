<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\BloodDiagnosis;
use App\Models\Patient;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users = User::factory(10)->create();
        $patients = Patient::factory(50)->create();
        BloodDiagnosis::factory(100)->create(); 

      
        foreach ($users as $user) {
            $patients_ids = [];

            $patients_ids[] = Patient::all()->random()->id;
            $patients_ids[] = Patient::all()->random()->id;
            $patients_ids[] = Patient::all()->random()->id;
            $patients_ids[] = Patient::all()->random()->id;
            $user->Patients()->sync( $patients_ids );
        }
        

    }
}
