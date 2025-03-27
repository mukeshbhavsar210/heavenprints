<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('razorpay_payment_id')->unique();
            $table->string('razorpay_order_id')->nullable();
            $table->string('status')->default('pending'); // success, failed, pending
            $table->decimal('amount', 10, 2); // Store amount in INR
            $table->string('currency')->default('INR');
            $table->json('payment_data')->nullable(); // Store full response
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
