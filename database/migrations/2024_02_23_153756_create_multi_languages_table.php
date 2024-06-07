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
        Schema::create('multi_languages', function (Blueprint $table) {
            $table->id();
            $table->string('language')->unique();
            $table->string('iso_code', 20)->unique();
            $table->unsignedBigInteger('flag_image')->nullable();
            $table->unsignedBigInteger('font')->nullable();
            $table->tinyInteger('rtl')->default(LANGUAGE_RTL_OFF)->nullable();
            $table->tinyInteger('status')->default(STATUS_ACTIVE);
            $table->tinyInteger('default')->default(STATUS_DEACTIVE)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multi_languages');
    }
};
