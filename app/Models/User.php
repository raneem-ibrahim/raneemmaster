<?php

namespace App\Models;
use App\Models\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
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


 // العلاقة مع الرسائل المرسلة من المعلم أو الأدمن
 public function sentMessages()
 {
     return $this->hasMany(Message::class, 'sender_id');
 }

 // العلاقة مع الرسائل المستلمة
 public function receivedMessages()
 {
     return $this->hasMany(Message::class, 'receiver_id');
 }

 // العلاقة مع الردود على الرسائل
 public function replies()
 {
     return $this->hasMany(Message::class, 'in_reply_to');
 }




public function memorizationProgram()
{
    return $this->hasOne(\App\Models\MemorizationProgram::class);
}



// من هون جديد بدي اتأكد 
 // العلاقة مع جدول الطلاب (للمستخدمين الذين هم طلاب)
 public function studentProfile()
 {
     return $this->hasOne(Student::class);
 }
// هون للحفظ
 public function weeklyPrograms() {
    return $this->hasMany(WeeklyProgram::class, 'teacher_id'); // البرامج اللي أنشأها المعلم
}

public function assignedPrograms() {
    return $this->belongsToMany(WeeklyProgram::class, 'student_weekly_program')
                ->withTimestamps();
}
public function studentWeeklyPrograms()
{
    return $this->hasMany(StudentWeeklyProgram::class, 'user_id');
}

public function dailyAchievements()
{
    return $this->hasMany(DailyAchievement::class);
}


 // المعلم أنشأ كورسات
 public function courses()
 {
     return $this->hasMany(\App\Models\Course::class, 'created_by');
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