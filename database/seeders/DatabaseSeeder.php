<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'kode' => 404,
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '089570404312',
            'password' => Hash::make('12341234'),
            'role' => 1,
            'status_verifikasi' => 1,
        ]);
    }
}
