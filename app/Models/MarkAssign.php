<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarkAssign extends Model
{
    use HasFactory, SoftDeletes;

    public function students(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function questions(){
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function questionsWithTrash(){
        return $this->belongsTo(Question::class, 'question_id')->withTrashed();
    }

    public function exams(){
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
