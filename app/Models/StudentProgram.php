<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/StudentProgram.php

class StudentProgram extends Model
{
    protected $fillable = ['user_id', 'memorization_program_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(MemorizationProgram::class, 'memorization_program_id');
    }
}

