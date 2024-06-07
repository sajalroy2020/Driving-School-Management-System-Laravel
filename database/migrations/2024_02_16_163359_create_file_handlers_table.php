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
        Schema::create('file_handlers', function (Blueprint $table) {
            $table->id();
            $table->string('file_type', 50);
            $table->string('storage_type');
            $table->string('original_name');
            $table->string('file_name')->unique();
            $table->string('path');
            $table->string('extension');
            $table->string('size');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_handlers');
    }
};
