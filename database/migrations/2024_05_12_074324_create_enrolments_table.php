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
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            $table->string('register_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->bigInteger('package_id');
            $table->bigInteger('slot_id');
            $table->decimal('total_amount', 12, 2)->default(0.00);
            $table->decimal('discount_amount', 12, 2)->default(0.00);
            $table->decimal('payable_amount', 12, 2)->default(0.00);
            $table->integer('discount_type')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('duration_type')->nullable();
            $table->integer('duration_time')->nullable();
            $table->tinyInteger('status')->default(ENROLMENT_PENDING);
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
        Schema::dropIfExists('enrolments');
    }
};
