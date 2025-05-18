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

public function views()
{
    return $this->hasMany(\App\Models\LessonView::class);
}

public function isViewedBy($user)
{
    return $this->views()->where('user_id', $user->id)->exists();
}

   


}
