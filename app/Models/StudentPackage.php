<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPackage extends Model
{
    use HasFactory, SoftDeletes;

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
    public function packages(){
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function paymentGateway(){
        return $this->belongsTo(PaymentGateway::class, 'payment_id');
    }
}
