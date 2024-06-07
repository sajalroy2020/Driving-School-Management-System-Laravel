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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('license_number')->nullable();
            $table->string('driving_experience')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_relation')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('tenant_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
