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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('notice_title')->nullable();
            $table->longText('notice_description')->nullable();
            $table->tinyInteger('status')->default(STATUS_ACTIVE);
            $table->tinyInteger('notice_for')->default(NOTICE_FOR_ALL);
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
        Schema::dropIfExists('notices');
    }
};
