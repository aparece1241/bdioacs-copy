<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => User::ADMIN,
            'address' => 'XXXXX',
            'contact_number' => '09466640372'
        ]);

        $doctor = User::create([
            'name' => 'Doctor',
            'email' => 'doctor@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => User::DOCTOR,
            'address' => 'XXXXX',
            'contact_number' => '09466640372'
        ]);
        $doctor->doctor()->create([
            'specialized' => 'Surgery'
        ]);

        $patient = User::create([
            'name' => 'Patient',
            'email' => 'patient@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => User::PATIENT,
            'address' => 'XXXXX',
            'contact_number' => '09466640372'
        ]);
        $patient->patient()->create([
            'blood_type' => 'O'
        ]);

        $admin->assignRole(User::ADMIN);
        $doctor->assignRole(User::DOCTOR);
        $patient->assignRole(User::PATIENT);
    }
}
