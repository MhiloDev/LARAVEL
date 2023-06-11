<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
/*         User::factory()->count(40)->create(); */
        User::create([
            'name' => 'Maryuri',
            'email' => 'maryi@gmail.com',
            'password' => bcrypt('12345678'),
            'admin' => true
        ]);
    }
}

