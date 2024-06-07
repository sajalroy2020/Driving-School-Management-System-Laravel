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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->nullable();
            $table->integer('student_type')->nullable();
            $table->string('quotation_text')->nullable();
            $table->string('title')->nullable();
            $table->longText('comment')->nullable();
            $table->integer('image')->nullable();
            $table->string('name')->nullable();
            $table->string('package_name')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('testimonials');
    }
};
