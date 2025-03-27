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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('frame');
            $table->string('size');
            $table->string('border');
            $table->string('hardware')->nullable();
            $table->string('display_option');
            $table->string('lamination');
            $table->json('minor_retouching')->nullable();
            $table->text('major_retouching')->nullable();
            $table->json('notes')->nullable();
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
        Schema::dropIfExists('images');
    }
};
