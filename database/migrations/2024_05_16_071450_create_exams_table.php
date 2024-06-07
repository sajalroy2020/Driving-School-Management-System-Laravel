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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('exam_title')->nullable();
            $table->integer('exam_type')->nullable();
            $table->text('student_assign')->nullable();
            $table->text('instructors_assign')->nullable();
            $table->text('question_assign')->nullable();
            $table->dateTime('exam_date')->nullable();
            $table->integer('total_mark')->nullable();
            $table->integer('duration_time')->nullable();
            $table->string('tenant_id')->nullable();
            $table->tinyInteger('status')->default(STATUS_ACTIVE);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
