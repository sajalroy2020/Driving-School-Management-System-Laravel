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
        Schema::create('email_and_notification_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('email_and_notification_templates');
    }
};
