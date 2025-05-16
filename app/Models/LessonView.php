<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonView extends Model
{
    use HasFactory;
    // في LessonView.php
protected $fillable = ['user_id', 'lesson_id', 'is_completed', 'progress'];

public function user() {
    return $this->belongsTo(User::class);
}

public function lesson() {
    return $this->belongsTo(Lesson::class);
}
}
