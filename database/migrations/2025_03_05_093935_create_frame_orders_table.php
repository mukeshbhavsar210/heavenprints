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
        Schema::create('frame_orders', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('frame');
            $table->string('size');
            $table->string('border');
            $table->string('hardware')->nullable();
            $table->string('display');
            $table->string('lamination');
            $table->json('minor_retouching')->nullable();
            $table->text('major_retouching')->nullable();
            $table->decimal('price', 8, 2);
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
        Schema::dropIfExists('frame_orders');
    }
};
