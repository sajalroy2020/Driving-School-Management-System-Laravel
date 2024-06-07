<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateAssign extends Model
{
    use HasFactory, SoftDeletes;

    public function certificateStudent(){
        return $this->belongsTo(Enrolment::class);
    }
}
