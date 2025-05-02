<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'birth_date', 'parent_phone'];

    // العلاقة مع اليوزر
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // العلاقة مع برنامج الحفظ
    public function memorizationProgram()
    {
        return $this->hasOne(MemorizationProgram::class);
    }
    
}
