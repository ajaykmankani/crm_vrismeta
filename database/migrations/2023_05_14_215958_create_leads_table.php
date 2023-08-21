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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('unique_id')->nullable();
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('email')->nullable()->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('current_service_provider')->nullable();
            $table->string('current_service')->nullable();
            $table->string('current_issue')->nullable();
            $table->string('call_dispose')->nullable();
            $table->string('security_passcode')->nullable();
            $table->string('security_question')->nullable();
            $table->string('security_answer')->nullable();
            $table->string('credit_check')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('license_expiry_date')->nullable();
            $table->string('driving_license_issuing_state')->nullable();
            $table->string('state_id_number')->nullable();
            $table->string('state_id_expiry_date')->nullable();
            $table->string('state_id_issuing_state')->nullable();
            $table->string('tax_id_number')->nullable();
            $table->string('tax_id_expiry_date')->nullable();
            $table->string('tax_id_issuing_state')->nullable();
            $table->string('social_security_number')->nullable();
            $table->string('product')->nullable();
            $table->string('service')->nullable();
            $table->longText('comment')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('user_name');
            $table->boolean('archive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
