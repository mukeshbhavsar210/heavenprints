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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->double('subtotal',10,2);
            $table->double('shipping',10,2);
            $table->string('coupon_code')->nullable();
            $table->double('discount',10,2)->nullable();
            $table->double('grandtotal',10,2);
            $table->enum('status', ['pending', 'shipped', 'delivered','cancelled'])->default('pending');            
            $table->timestamps('shipped_date');
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
        Schema::dropIfExists('orders');
    }
};
