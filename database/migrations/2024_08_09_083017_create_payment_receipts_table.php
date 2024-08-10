<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_receipts', function (Blueprint $table) {
            $table->id();
            $table->string('bill_num'); // Foreign key from billing table
            $table->string('lead_num'); // Foreign key from lead table
            $table->decimal('amount_paid', 15, 2); // Amount paid in this receipt
            $table->decimal('if_due_against_bill', 15, 2); // Amount due after this payment
            $table->date('date'); // Date of the payment
            $table->string('payment_receipt_num')->unique(); // Unique payment receipt number
            $table->timestamps();
            $table->index('bill_num'); // Index for faster queries
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_receipts');
    }
}
