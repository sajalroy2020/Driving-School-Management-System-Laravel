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
        Schema::create('income_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('income_expenses_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->tinyInteger('type');
            $table->string('voucher_no')->nullable();
            $table->string('purpose');
            $table->decimal('amount', 12, 2)->default(0);
            $table->text('note')->nullable();
            $table->integer('image')->nullable();
            $table->string('tenant_id')->nullable();
            $table->tinyInteger('status')->default(STATUS_ACTIVE);
            $table->date('date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_expenses');
    }
};
