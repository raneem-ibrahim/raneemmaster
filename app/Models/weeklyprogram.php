<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'student_id',
        'week_start_date',
    ];

  

    public function dailyPrograms()
    {
        return $this->hasMany(DailyProgram::class);
    }
}

