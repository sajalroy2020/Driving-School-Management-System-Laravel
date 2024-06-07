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
        Schema::create('section_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('section_name')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('background_image')->nullable();
            $table->tinyInteger('is_section_show')->default(0);
            $table->string('tenant_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_configarations');
    }
};
