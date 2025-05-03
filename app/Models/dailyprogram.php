<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyProgram extends Model
{
    protected $fillable = ['weekly_program_id', 'day', 'type', 'portion_type', 'surah', 'from_verse', 'to_verse', 'notes', 'date' ];

    public function weeklyProgram() {
        return $this->belongsTo(WeeklyProgram::class);
    }
    public function achievement()
    {
        return $this->hasOne(\App\Models\DailyAchievement::class)->where('user_id', auth()->id());
    }
    

}

