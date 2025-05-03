<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyAchievement extends Model
{
    use HasFactory;
 
    protected $fillable = ['user_id', 'daily_program_id', 'type', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function dailyProgram() {
        return $this->belongsTo(DailyProgram::class);
    }


}
