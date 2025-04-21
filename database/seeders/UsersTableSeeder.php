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
        
        User::create([
            'first_name'     => 'أحمد',
            'last_name'      => 'السيد',
            'email'          => 'ahmad_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 35,
            'gender'         => 'male',
            'image'          => 'default.png',
            'desired_study'  => null, // للطلاب فقط
            'role'           => 'teacher',
            'min_age'        => 7,
            'max_age'        => 12,
            'teaching_type'  => 'hifz',
        ]);

        User::create([
            'first_name'     => 'سعاد',
            'last_name'      => 'الخالدي',
            'email'          => 'souad_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 42,
            'gender'         => 'female',
            'image'          => 'default.png',
            'desired_study'  => null,
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 18,
            'teaching_type'  => 'tajweed',
        ]);

        User::create([
            'first_name'     => 'خالد',
            'last_name'      => 'عمر',
            'email'          => 'khaled_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'male',
            'image'          => 'default.png',
            'desired_study'  => null,
            'role'           => 'teacher',
            'min_age'        => 8,
            'max_age'        => 15,
            'teaching_type'  => 'both',
        ]);
         // 🌟 Admin
         User::create([
            'first_name'     => 'مدير',
            'last_name'      => 'النظام',
            'email'          => 'admin@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 40,
            'gender'         => 'male',
            'image'          => 'default.png',
            'desired_study'  => null,
            'role'           => 'admin',
            'min_age'        => null,
            'max_age'        => null,
            'teaching_type'  => null,
        ]);

        // 📚 طلاب
        User::create([
            'first_name'     => 'ليلى',
            'last_name'      => 'محمد', 
            'email'          => 'leila_student@example.com ',
            'password'       => Hash::make('12345678'),
            'age'            => 10,
            'gender'         => 'female',
            'image'          => 'default.png',
            'desired_study'  => json_encode(['tajweed']),
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            'teaching_type'  => null,
        ]);

        User::create([
            'first_name'     => 'سامي',
            'last_name'      => 'العربي',
            'email'          => 'sami_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'desired_study'  => json_encode(['hifz', 'tajweed']),
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            'teaching_type'  => null,
        ]);
    
    }
}
