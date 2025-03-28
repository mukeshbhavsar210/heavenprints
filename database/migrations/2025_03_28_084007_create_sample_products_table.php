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
        Schema::create('sample_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('images'); // Store multiple image paths as JSON
            $table->json('sizes');  // Store multiple sizes as JSON
            $table->json('colors'); // Store multiple colors as JSON
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
        Schema::dropIfExists('sample_products');
    }
};
