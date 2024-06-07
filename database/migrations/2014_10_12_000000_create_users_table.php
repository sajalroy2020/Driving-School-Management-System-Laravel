<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('role')->default(2);
            $table->string('student_id')->nullable();
            $table->string('instructor_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('picture')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->Integer('otp')->nullable();
            $table->dateTime('otp_expiry')->nullable();
            $table->tinyInteger('google_auth_status')->default(0);
            $table->text('google2fa_secret')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('sms_verified_at')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('tenant_id')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
