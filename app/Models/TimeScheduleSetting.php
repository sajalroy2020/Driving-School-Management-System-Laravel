<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeScheduleSetting extends Model
{
    use HasFactory, SoftDeletes;

    public function enrolments(){
        return $this->hasMany(Enrolment::class);
    }
}
