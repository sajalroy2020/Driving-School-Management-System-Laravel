<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpseclib3\File\ASN1\Maps\Certificate;

class Enrolment extends Model
{
    use HasFactory, SoftDeletes;

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }

    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function timeSchedule(){
        return $this->belongsTo(TimeScheduleSetting::class, 'slot_id');
    }

    public function certificate(){
        return $this->hasMany(Certificate::class, 'student_id');
    }
    public function slot(){
        return $this->belongsTo(TimeScheduleSetting::class, 'slot_id');
    }
}
