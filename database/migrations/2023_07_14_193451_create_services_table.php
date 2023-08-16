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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('option1');
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('option5')->nullable();
            $table->string('option6')->nullable();
            $table->string('option7')->nullable();
            $table->string('option8')->nullable();
            $table->string('option9')->nullable();
            $table->string('option10')->nullable();
            $table->string('option11')->nullable();
            $table->string('option12')->nullable();
            $table->string('option13')->nullable();
            $table->string('option14')->nullable();
            $table->string('option15')->nullable();
            $table->string('option16')->nullable();
            $table->string('option17')->nullable();
            $table->string('option18')->nullable();
            $table->string('option19')->nullable();
            $table->string('option20')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
