<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'created_by' ,'image'];


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
}
