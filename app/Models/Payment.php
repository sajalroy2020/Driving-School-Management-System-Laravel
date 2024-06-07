<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    public function paymentGateway(){
        return $this->belongsTo(PaymentGateway::class, 'payment_id');
    }
    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function enrolment(){
        return $this->belongsTo(Enrolment::class, 'enrolment_id');
    }
    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

}
