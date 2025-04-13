<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'first_name'     => 'Admin',
            'last_name'      => 'User',
            'email'          => 'admin@example.com',
            'password'       => Hash::make('password123'),
            'age'            => 30,
            'gender'         => 'male',
            'desired_study'  => null,
            'role'           => 'admin'
        ]);

        // Teacher
        User::create([
            'first_name'     => 'Ahmed',
            'last_name'      => 'Teacher',
            'email'          => 'teacher@example.com',
            'password'       => Hash::make('teacher123'),
            'age'            => 35,
            'gender'         => 'male',
            'desired_study'  => null,
            'role'           => 'teacher'
        ]);

        // Student
        User::create([
            'first_name'     => 'Sara',
            'last_name'      => 'Student',
            'email'          => 'student@example.com',
            'password'       => Hash::make('student123'),
            'age'            => 20,
            'gender'         => 'female',
            'desired_study'  => 'computer science',
            'role'           => 'student'
        ]);
    }
}
