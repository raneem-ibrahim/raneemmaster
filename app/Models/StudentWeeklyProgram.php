<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWeeklyProgram extends Model
{
    protected $table = 'student_weekly_program';
    protected $fillable = ['user_id', 'weekly_program_id'];

    public function student() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function weeklyProgram() {
        return $this->belongsTo(WeeklyProgram::class);
    }
}

