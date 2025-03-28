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
        Schema::create('frame_wraps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('image');
            $table->enum('types', ['wrap', 'border', 'standard', 'premium', 'floating'])->default('wrap');
            $table->string('border_color')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('frame_wraps');
    }
};
