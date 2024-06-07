<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    public function questionsOption(){
        return $this->hasMany(QuestionOption::class);
    }

    public function questionsOptionWithTrash(){
        return $this->hasMany(QuestionOption::class)->withTrashed();
    }

    public function markAssign(){
        return $this->hasMany(MarkAssign::class);
    }

}
