<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
     use SoftDeletes;
    use HasFactory;
    protected $fillable = ['level_id', 'title', 'description', 'video_url','teacher_id'];


    // level() يربط الدرس بالمستوى الذي ينتمي له.
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}
public function viewers()
{
    return $this->belongsToMany(User::class, 'lesson_views')->withTimestamps();
}





// في Lesson.php
public function isViewedBy(User $user) {
    return $this->views()
        ->where('user_id', $user->id)
        ->where('is_completed', true)
        ->exists();
}

public function views() {
    return $this->hasMany(LessonView::class);
}


}
