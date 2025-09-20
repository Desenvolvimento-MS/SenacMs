<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Lucas',
            'lastname' => 'Lima',
            'email' => 'adm@email.com',
            'cpf' => '12343456576',
            'profile' => 'Adm',
            'password' => 'adm#123',
        ]);
    }
}
