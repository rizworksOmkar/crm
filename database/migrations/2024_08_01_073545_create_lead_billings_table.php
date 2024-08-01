<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_billings', function (Blueprint $table) {
            $table->id();
            $table->uuid('lead_id');
            $table->string('lead_num');
            $table->enum('status', ['Pending', 'Paid', 'Disputed'])->default('Pending');
            $table->decimal('expected_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->boolean('customer_settled')->default(false);
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->boolean('agent_paid')->default(false);
            $table->boolean('agent_recieved_payment')->default(false);
            $table->boolean('dispute_flag')->default(false);
            $table->timestamps();

            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->foreign('lead_num')->references('lead_num')->on('leads')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_billings');
    }
}
