<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



// class MemorizationProgram extends Model
// {
//     protected $fillable = ['name_ar', 'name_en'];

//     public function students()
//     {
//         return $this->hasMany(StudentProgram::class);
//     }

    class MemorizationProgram extends Model
{
    protected $fillable = ['user_id', 'program'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


