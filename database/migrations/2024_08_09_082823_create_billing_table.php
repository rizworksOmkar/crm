<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('lead_num')->index(); // Foreign key from lead table
            $table->decimal('expected_amount', 15, 2);
            $table->decimal('to_pay', 15, 2);
            $table->date('date'); // Date when the bill was issued
            $table->foreignId('agent_id')->constrained('users'); // Agent responsible for the bill
            $table->boolean('dispute_flag')->default(false); // Flag for disputes
            $table->string('bill_num')->unique(); // Unique bill number BILL-Year-XXXX
            $table->timestamps();
            $table->index(['bill_num', 'lead_num']); // Combined index for faster queries
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing');
    }
}
