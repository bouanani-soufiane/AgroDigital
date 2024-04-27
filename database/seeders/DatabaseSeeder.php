<?php

namespace Database\Seeders;

use App\Models\Disease;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Gerant',
            'email' => 'Gerant@agrodigital.com',
            'password' => bcrypt('12345678'),
            'role' => 'Gerant',
        ]);

        Disease::factory(60)->create([
            'name' => '15',
            'description' => 'ds',
            'type' => 'dssd',
        ]);
    }
}
