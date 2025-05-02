<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyProgram extends Model
{
    protected $fillable = ['teacher_id', 'week_start', 'program_type'];

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function dailyPrograms() {
        return $this->hasMany(DailyProgram::class);
    }

    public function students() {
        return $this->belongsToMany(User::class, 'student_weekly_program')
                    ->withTimestamps();
    }
}
