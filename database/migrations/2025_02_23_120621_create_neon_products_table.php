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
        Schema::create('neon_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('font');
            $table->string('color');
            $table->string('description')->nullable();
            $table->double('price',10,2);
            $table->enum('size', ['Small', 'Middle', 'Large'])->default('Middle');
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
        Schema::dropIfExists('neon_products');
    }
};
