<?php

namespace Database\Seeders;

use App\Models\ChiefPharmacist;
use App\Models\Doctor;
use App\Models\Pharmacist;
use App\Models\User;
use App\Models\Admin;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $admin = new Admin();
        $admin->user_id = $userAdmin->id;
        $admin->save();



        $userChiefPharmacist = User::create([
            'name' => 'chief pharmacist',
            'email' => 'chief_pharmacist@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $chiefPharmacist = new ChiefPharmacist();
        $chiefPharmacist->user_id = $userChiefPharmacist->id;
        $chiefPharmacist->save();


        $userPharmacist = User::create([
            'name' => 'pharmacist',
            'email' => 'pharmacist@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $pharmacist = new Pharmacist();
        $pharmacist->user_id = $userPharmacist->id;
        $pharmacist->save();


        $userDoctor = User::create([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $doctor = new Doctor();
        $doctor->speciality = "Cardiologie";
        $doctor->user_id = $userDoctor->id;
        $doctor->save();
    }
}
