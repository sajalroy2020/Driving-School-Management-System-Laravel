<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function instructors(){
        return $this->belongsTo(User::class, 'instructors_id');
    }

    public function stdPackages(){
        return $this->hasMany(StudentPackage::class);
    }
}
