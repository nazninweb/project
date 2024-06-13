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
        Schema::create('plant_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('tag');
            $table->string('date');
            $table->string('notes');
            $table->string('location');
            $table->string('altitude');
            $table->string('latitude');
            $table->string('images');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_data');
    }
};
