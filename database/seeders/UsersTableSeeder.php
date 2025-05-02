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
            'role'           => 'teacher',
            'min_age'        => 7,
            'max_age'        => 12,
        ]);

        User::create([
            'first_name'     => 'سعاد',
            'last_name'      => 'الخالدي',
            'email'          => 'souad_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 42,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 18,
        ]);

        User::create([
            'first_name'     => 'خالد',
            'last_name'      => 'عمر',
            'email'          => 'khaled_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 8,
            'max_age'        => 15,
        ]);
        User::create([
            'first_name'     => 'تمارا',
            'last_name'      => 'عمر',
            'email'          => 'tamara_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 6,
            'max_age'        => 15,
        ]);
        User::create([
            'first_name'     => 'عائشة',
            'last_name'      => 'محمد',
            'email'          => 'aisha_teacher@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 15,
            'max_age'        => 25,
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
            'role'           => 'admin',
            'min_age'        => null,
            'max_age'        => null,
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
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            
        ]);

        User::create([
            'first_name'     => 'سامي',
            'last_name'      => 'العربي',
            'email'          => 'sami_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'محمد',
            'last_name'      => 'محمود',
            'email'          => 'mohamad_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'رنيم',
            'last_name'      => 'ابراهيم', 
            'email'          => 'raneem_student@example.com ',
            'password'       => Hash::make('12345678'),
            'age'            => 10,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            
        ]);

        User::create([
            'first_name'     => 'روان',
            'last_name'      => 'ابوحماد',
            'email'          => 'rawan_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'ياقوت ',
            'last_name'      => 'غرايبة',
            'email'          => 'yaqoot_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'حامد',
            'last_name'      => 'كريشان', 
            'email'          => 'Hamed_student@example.com ',
            'password'       => Hash::make('12345678'),
            'age'            => 10,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            
        ]);

        User::create([
            'first_name'     => 'احمد',
            'last_name'      => 'شمايلة',
            'email'          => 'sami_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'محمد',
            'last_name'      => 'العمري',
            'email'          => 'Ahmad_student@example.com',
            'password'       => Hash::make('12345678'),
            'age'            => 8,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
    
    }
}
