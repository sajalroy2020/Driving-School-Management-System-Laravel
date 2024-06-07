<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentGateway extends Model
{
    use HasFactory, SoftDeletes;

    public function gateway_currency(){
        return $this->hasMany(PaymentGatewayCurrency::class, 'gateway_id');
    }
    public function gateway_bank(){
        return $this->hasMany(PaymentGatewayBank::class, 'gateway_id');
    }
    public function std_Packages(){
        return $this->hasMany(StudentPackage::class, 'payment_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class, 'payment_id');
    }

}
