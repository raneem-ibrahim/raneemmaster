<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['level_id', 'title', 'description', 'video_url'];


    // level() يربط الدرس بالمستوى الذي ينتمي له.
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
