<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alex',
            'email' => 'alex@test.com',
            'password' => Hash::make('alex123')
        ]);

        User::create([
            'name' => 'Julia',
            'email' => 'julia@test.com',
            'password' => Hash::make('julia321')
        ]);
    }
}
