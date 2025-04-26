<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekly_program_id',
        'day_name',
        'type',
        'portion_type',
        'from_verse',
        'to_verse',
        'surah_name',
        'notes',
        'date',
    ];

    public function weeklyProgram()
    {
        return $this->belongsTo(WeeklyProgram::class);
    }
}
