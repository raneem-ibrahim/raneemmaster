<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'title', 'level_number'];


    // course() يربط المستوى بالكورس الذي يتبعه.

    // lessons() تربط المستوى بالدروس التي يحتويها.


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
