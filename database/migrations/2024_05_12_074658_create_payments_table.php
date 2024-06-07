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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id')->nullable();
            $table->unsignedBigInteger('enrolment_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('contact_amount', 12, 2)->default(0.00);
            $table->tinyInteger('payment_type')->default(PAYMENT_TYPE_OFFLINE);
            $table->integer('currency_id')->nullable();
            $table->decimal('tax', 12, 2)->default(0);
            $table->decimal('setup_fees', 12, 2)->default(0);
            $table->decimal('shipping_charge', 12, 2)->default(0);
            $table->string('description')->nullable();
            $table->string('system_currency')->nullable();
            $table->decimal('transaction_amount', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->integer('tax_type')->default(0);
            $table->decimal('platform_charge', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            $table->string('tenant_id')->nullable();
            $table->tinyInteger('status')->default(PAYMENT_STATUS_PENDING);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
