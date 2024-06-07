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
        Schema::create('certificate_configers', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_img')->nullable();
            $table->string('certificate_logo')->nullable();
            $table->string('instructor_signature_img')->nullable();
            $table->string('admin_signature_img')->nullable();
            $table->integer('logo_position_x')->nullable();
            $table->integer('logo_position_y')->nullable();
            $table->integer('logo_width')->nullable();
            $table->integer('number_position_x')->nullable();
            $table->integer('number_position_y')->nullable();
            $table->integer('number_font_size')->nullable();
            $table->string('number_font_color')->nullable();
            $table->integer('title_position_x')->nullable();
            $table->integer('title_position_y')->nullable();
            $table->integer('title_font_size')->nullable();
            $table->string('title_font_color')->nullable();
            $table->integer('date_position_x')->nullable();
            $table->integer('date_position_y')->nullable();
            $table->integer('date_font_size')->nullable();
            $table->string('date_font_color')->nullable();
            $table->integer('std_name_position_x')->nullable();
            $table->integer('std_name_position_y')->nullable();
            $table->integer('std_name_font_size')->nullable();
            $table->string('std_name_font_color')->nullable();
            $table->integer('body_position_x')->nullable();
            $table->integer('body_position_y')->nullable();
            $table->integer('body_font_size')->nullable();
            $table->string('body_font_color')->nullable();
            $table->integer('instructor_signature_position_x')->nullable();
            $table->integer('instructor_signature_position_y')->nullable();
            $table->integer('instructor_signature_width')->nullable();
            $table->integer('signature_1_position_x')->nullable();
            $table->integer('signature_1_position_y')->nullable();
            $table->integer('signature_1_font_size')->nullable();
            $table->string('signature_1_font_color')->nullable();
            $table->integer('admin_signature_position_x')->nullable();
            $table->integer('admin_signature_position_y')->nullable();
            $table->integer('admin_signature_width')->nullable();
            $table->integer('signature_2_position_x')->nullable();
            $table->integer('signature_2_position_y')->nullable();
            $table->integer('signature_2_font_size')->nullable();
            $table->string('signature_2_font_color')->nullable();
            $table->string('tenant_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificate_configers');
    }
};
