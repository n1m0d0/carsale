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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('vin');
            $table->string('brand');
            $table->string('model');
            $table->string('manufactured');
            $table->string('year');
            $table->string('plate');
            $table->string('mileage');
            $table->tinyInteger('functioning');
            $table->tinyInteger('esthetic');
            $table->boolean('is_publicated')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
