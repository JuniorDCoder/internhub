<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'juniorngu@traitz.tech',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}
