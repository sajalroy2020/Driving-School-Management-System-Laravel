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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('tenant_id')->nullable();
            $table->tinyInteger('status')->default(STATUS_ACTIVE)->comment('active for 1 , deactivate for 0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
