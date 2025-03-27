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
        Schema::create('svg_customizations', function (Blueprint $table) {
            $table->id();
            $table->string('frame');
            $table->string('size');
            $table->string('border');
            $table->string('hardware');
            $table->string('display_option');
            $table->string('lamination');
            $table->json('minor_retouching')->nullable();
            $table->text('major_retouching')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('svg_path'); // Store the path of the SVG file
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
        Schema::dropIfExists('svg_customizations');
    }
};
