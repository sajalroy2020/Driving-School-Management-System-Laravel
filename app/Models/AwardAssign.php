<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AwardAssign extends Model
{
    use HasFactory, SoftDeletes;

    public function awards(){
        return $this->belongsTo(Award::class, 'award_id');
    }

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
