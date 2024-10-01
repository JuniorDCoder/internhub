<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Frontend - Entry Level',
            'Advance Frontend (Tailwind, Vue & Nuxt)',
            'Advance Frontend (Tailwind, React & Next)',
            'Backend Web Development - Django',
            'Backend Web Development - Laravel',
            'Mobile Development (Flutter)',
            'Mobile Development (React Native)',
            'FullStack Web (Laravel React/Vue)',
            'DevOps and Cloud',
            'Data Science & Machine Learning',
            'Computer Networking',
            'UI/UX/Graphics Design',
        ];

        foreach($specialties as $specialty){
            Specialty::firstOrCreate(['name' => $specialty]);
        }
    }
}
