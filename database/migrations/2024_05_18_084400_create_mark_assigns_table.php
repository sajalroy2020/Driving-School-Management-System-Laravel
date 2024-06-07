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
        Schema::create('mark_assigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('exam_id')->nullable();
            $table->bigInteger('student_id')->nullable();
            $table->bigInteger('question_id')->nullable();
            $table->integer('assign_mark')->nullable();
            $table->date('date')->nullable();
            $table->integer('is_ans_correct')->default(0);
            $table->string('tenant_id')->nullable();
            $table->tinyInteger('status')->default(ANS_STATUS_PENDING);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mark_assigns');
    }
};
