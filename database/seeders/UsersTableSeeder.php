<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('users')->insert([
            'name' => 'Fredy',
            'email' => 'fredy@gmail.com',
            'password' => bcrypt('12345678'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
