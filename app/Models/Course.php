<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
        use SoftDeletes;
    use HasFactory;
    protected $fillable = ['title', 'description', 'created_by' ,'image' ,'details'];


    // levels() توضح أن الكورس يحتوي على مستويات متعددة.

    // creator() توضح من أنشأ الكورس (المعلم).
    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
   
public function teachers()
{
    return $this->belongsToMany(User::class, 'course_teacher');
}

}
