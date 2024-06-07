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
        Schema::create('frontend_settings', function (Blueprint $table) {
            $table->id();
            $table->string('about_point_1')->nullable();
            $table->string('about_point_2')->nullable();
            $table->string('about_point_3')->nullable();
            $table->longText('about_learn_more')->nullable();
            $table->integer('about_year_of_exp')->nullable();
            $table->string('about_right_image')->nullable();
            $table->string('about_video_link')->nullable();
            $table->integer('achiev_course_completed')->nullable();
            $table->integer('achiev_driving_learner')->nullable();
            $table->integer('achiev_experience_instructor')->nullable();
            $table->integer('achiev_award_winner')->nullable();
            $table->string('tenant_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontend_settings');
    }
};
