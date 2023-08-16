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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('name');
            $table->string('phone');
            $table->string('alt_phone');
            $table->string('email')->nullable();
            $table->string('curr_address');
            $table->string('per_address');
            $table->string('date_of_birth');
            $table->string('education');
            $table->string('employment_status');
            $table->string('last_organization');
            $table->string('total_experience');
            $table->string('date_of_joining');
            $table->string('monthly_salary');
            $table->string('cab_facility');
            $table->string('designation');
            $table->string('source');
            $table->string('offer_letter')->nullable();
            $table->boolean('archive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
