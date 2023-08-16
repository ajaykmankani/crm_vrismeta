<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lead;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            
            'email' => fake()->unique()->safeEmail(),
            'service'=> fake()->sentence($nbWords = 3),
            'lead_status' => 'open',
            'notes' => fake()->sentence(),
            
            'date'=>fake()->date(),
            'first_name' => fake()->firstName(),
            'Last_name' => fake()->lastName(),
            'account_number'=>fake()->number(0,9999999999999),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'package'=>fake()->sentence($nbWords = 3),
            'status'=>fake()->sentence($nbWords = 3),
            'address'=>fake()->address(),
            'current_service_provider'=>fake()->sentence($nbWords = 3),
            'service'=>fake()->sentence($nbWords = 3),
            'issue'=>fake()->sentence($nbWords = 3),
            'we_offer'=>fake()->sentence($nbWords = 3),
            'order_number'=>fake()->number(0,999999),
            'order_confirmation_number'=>fake()->number(0,9999),
            'reference_number'=>fake()->number(0,99999),
            'monthly_bill'=>fake()->number(0,99),
            'technician_date_and_time'=>fake()->date(),
            'one_time_fee'=>fake()->number(0,999),
            'security_passcode'=>fake()->number(0,999999),
            'security_question'=>fake()->sentence(),
            'comments'=> fake()->sentence(),
            'credit_check'=>'done',
            'mode_of_cc'=>'account',
            'mode_of_payment'=> 'account',
            'toll_free_number'=>'0000-0000-0000',
            'agent_name'=>fake()->name(),
        ]; 
    }
}
