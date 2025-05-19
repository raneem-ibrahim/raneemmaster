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
            'email'          => 'ahmad_teacher@gmail.com',
            'phone'          => '0788123456',
            'password'       => Hash::make('12345678'),
            'age'            => 35,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 50,
        ]);
       
           User::create([
            'first_name'     => 'اسماعيل',
            'last_name'      => 'طارق',
            'email'          => 'esmael_teacher@gmail.com',
            'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 35,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 50,
        ]);

        User::create([
            'first_name'     => 'خالد',
            'last_name'      => 'عمر',
            'email'          => 'khaled_teacher@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 50,
        ]);
        User::create([
            'first_name'     => 'تمارا',
            'last_name'      => 'عمر',
            'email'          => 'tamara_teacher@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 50,
        ]);
        User::create([
            'first_name'     => 'عائشة',
            'last_name'      => 'محمد',
            'email'          => 'aisha_teacher@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 50,
        ]);
         User::create([
            'first_name'     => 'لينا',
            'last_name'      => 'محمود',
            'email'          => 'lena_teacher@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'teacher',
            'min_age'        => 10,
            'max_age'        => 50,
        ]);
         
         // 🌟 Admin
         User::create([
            'first_name'     => 'مدير',
            'last_name'      => 'النظام',
            'email'          => 'admin@gmail.com',
              'phone'          => '0778123456',
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
            'email'          => 'laila_student@gmail.com',
            'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 25,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            
        ]);

        User::create([
            'first_name'     => 'سامي',
            'last_name'      => 'العربي',
            'email'          => 'sami_student@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 21,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'محمد',
            'last_name'      => 'محمود',
            'email'          => 'mohamad_student@gmail.com',
              'phone'         => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 23,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'رنيم',
            'last_name'      => 'ابراهيم', 
            'email'          => 'raneem_student@gmail.com ',
              'phone'          => '0787354700',
            'password'       => Hash::make('12345678'),
            'age'            => 24,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            
        ]);

        User::create([
            'first_name'     => 'روان',
            'last_name'      => 'ياسر',
            'email'          => 'rawan_student@gmail.com',
             'phone'         => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 30,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'ياقوت ',
            'last_name'      => 'غرايبة',
            'email'          => 'yaqoot_student@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 26,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
          User::create([
            'first_name'     => 'سدرا ',
            'last_name'      => 'محمود',
            'email'          => 'sedra_student@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 21,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
           User::create([
            'first_name'     => 'ريا',
            'last_name'      => 'انس',
            'email'          => 'raya_student@gmail.com',
            'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 26,
            'gender'         => 'female',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'حامد',
            'last_name'      => 'كريشان', 
            'email'          => 'Hamed_student@gmail.com ',
            'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 18,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
            
        ]);

        User::create([
            'first_name'     => 'احمد',
            'last_name'      => 'نبيل',
            'email'          => 'Ahmad_student@gmail.com',
            'phone'         => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 25,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
        User::create([
            'first_name'     => 'حمزة',
            'last_name'      => 'صلاح',
            'email'          => 'hamza_student@gmail.com',
              'phone'          => '0778123456',
            'password'       => Hash::make('12345678'),
            'age'            => 20,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
         User::create([
            'first_name'     => 'انس',
            'last_name'      => 'عبدالله',
            'email'          => 'Anas_student@gmail.com',
            'phone'          => '0778123456',
            'password'       =>  Hash::make('12345678'),
            'age'            => 32,
            'gender'         => 'male',
            'image'          => 'default.png',
            'role'           => 'student',
            'min_age'        => null,
            'max_age'        => null,
        ]);
    
    }
}
