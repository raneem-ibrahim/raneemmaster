<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'ayahs_count'];
    // public $timestamps = false; // لو جدولك ما فيه أعمدة created_at و updated_at
     // العلاقة مع البرامج اليومية
     public function dailyPrograms()
     {
         return $this->hasMany(DailyProgram::class);
     }

}
