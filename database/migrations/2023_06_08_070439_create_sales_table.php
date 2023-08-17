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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
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
            $table->longText('comment')->nullable();
            $table->string('driving_license_number')->nullable();
            $table->string('licanse_expiry_date')->nullable();
            $table->string('driving_license_issuing_state')->nullable();
            $table->string('state_id_number')->nullable();
            $table->string('state_id_expiry_date')->nullable();
            $table->string('state_id_issuing_state')->nullable();
            $table->string('tax_id_number')->nullable();
            $table->string('tax_id_expiry_date')->nullable();
            $table->string('tax_id_issuing_state')->nullable();
            $table->string('social_security_number')->nullable();
            $table->string('product');
            $table->string('service');
            $table->string('order_confirmation_number');
            $table->string('reference_number');
            $table->string('monthly_bill');
            $table->string('technician_date_and_time');
            $table->string('one_time_fee');
            $table->string('security_passcode');
            $table->string('security_question');
            $table->string('credit_check');
            $table->string('mode_of_cc');
            $table->string('mode_of_payment');
            $table->string('toll_free_number');
            $table->string('dob');
            $table->string('ssn');
            $table->string('card_number');
            $table->string('cvv');
            $table->string('xp');
            $table->string('agent_name');
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
        Schema::dropIfExists('sales');
    }
};
