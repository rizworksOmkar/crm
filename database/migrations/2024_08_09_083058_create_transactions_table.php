<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('bill_num')->index(); // Foreign key from billing table
            $table->string('receipt_num')->index(); // Foreign key from payment_receipts table
            $table->string('transaction_num')->unique(); // Unique transaction number
            $table->string('mode'); // Mode of payment (e.g., cash, card, bank transfer)
            $table->decimal('payment_amount', 15, 2); // Amount paid in this transaction
            $table->string('status'); // Status of the transaction (e.g., completed, pending)
            $table->timestamps();
            $table->index(['bill_num', 'receipt_num']); // Combined index for faster queries
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
