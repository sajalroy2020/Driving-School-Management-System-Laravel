<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'email_verified_at',
        'image',
        'address',
        'created_by',
        'role',
        'status',
        'password',
        'remember_token',
        'google2fa_secret',
        'google_id',
        'facebook_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function contactList(){
        return $this->hasOne(UserContact::class, 'user_id');
    }

    public function documentList(){
        return $this->hasMany(UserDocument::class, 'user_id');
    }

    public function instructor(){
        return $this->hasOne(Instructor::class, 'user_id');
    }

    public function packages(){
        return $this->hasMany(Package::class, 'instructors_id');
    }

    public function stdPackages(){
        return $this->hasOne(StudentPackage::class, 'student_id');
    }

    public function enrolments(){
        return $this->hasOne(Enrolment::class, 'student_id');
    }

    public function assignAward(){
        return $this->hasMany(AwardAssign::class, 'student_id');
    }

    public function assignMark(){
        return $this->hasMany(MarkAssign::class, 'student_id');
    }

}
