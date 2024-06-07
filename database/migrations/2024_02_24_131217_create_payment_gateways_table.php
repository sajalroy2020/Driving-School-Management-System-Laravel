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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->integer('dynamic_image')->nullable();
            $table->tinyInteger('status')->default(DEACTIVATE);
            $table->tinyInteger('mode')->default(GATEWAY_MODE_SANDBOX);
            $table->string('url')->nullable();
            $table->string('key')->nullable()->comment('client id, public key, key, store id, api key');
            $table->string('secret')->nullable()->comment('client secret, secret, store password, auth token');
            $table->text('instruction')->nullable();
            $table->string('tenant_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
