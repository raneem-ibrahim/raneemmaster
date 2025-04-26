<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use Notifiable; 
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'age',
        'image',
        'gender',
        'desired_study',
        'role'
    ];
  


public function teacher()
{
    return $this->belongsToMany(User::class, 'student_teacher', 'student_id', 'teacher_id');
}

public function students()
{
    return $this->belongsToMany(User::class, 'student_teacher', 'teacher_id', 'student_id');
}
public function myStudents()
{
    return $this->hasMany(StudentTeacher::class, 'teacher_id');
}




public function memorizationProgram()
{
    return $this->hasOne(\App\Models\MemorizationProgram::class);
}



    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'desired_study' => 'array',
    ];
}