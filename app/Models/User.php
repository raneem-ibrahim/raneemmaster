<?php

namespace App\Models;
use App\Models\Message;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;
    use Notifiable; 
       use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'age',
        'image',
        'gender',
        'role',
        'phone',
        'min_age',
        'max_age'
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
//  public function courses()
//  {
//      return $this->hasMany(\App\Models\Course::class, 'created_by');
//  }
 public function courses()
{
    return $this->belongsToMany(Course::class, 'course_teacher', 'user_id', 'course_id');
}
 public function lessons()
{
    return $this->hasMany(Lesson::class, 'teacher_id');
}
public function viewedLessons()
{
    return $this->belongsToMany(Lesson::class, 'lesson_views')->withTimestamps();
}



    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'desired_study' => 'array',
    ];



    public function getCompletionPercentage($levelId) {
    $totalLessons = Lesson::where('level_id', $levelId)->count();
    if ($totalLessons == 0) return 0;
    
    $completedLessons = LessonView::where('user_id', $this->id)
        ->whereHas('lesson', function($q) use ($levelId) {
            $q->where('level_id', $levelId);
        })
        ->where('is_completed', true)
        ->count();
        
    return round(($completedLessons / $totalLessons) * 100);
}
}