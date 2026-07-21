<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\TrainingCategories;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        TrainingCategories::create([
            'name' => 'Sertifikasi Kemnaker RI',
            'slug'  => 'sertifikasi-kemnaker-ri',
        ]);

        TrainingCategories::create([
            'name' => 'Sertifikasi BNSP',
            'slug'  => 'sertifikasi-bnsp',
        ]);

        TrainingCategories::create([
            'name' => 'Training Softskill',
            'slug'  => 'training-softskill',
        ]);

        TrainingCategories::create([
            'name' => 'Lainnya',
            'slug'  => 'lainnya',
        ]);

        User::create([
            'name' => 'User',
            'username'  => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234'),
            'is_admin'  => '1',
            'status' => '1'
        ]);
    }
}
