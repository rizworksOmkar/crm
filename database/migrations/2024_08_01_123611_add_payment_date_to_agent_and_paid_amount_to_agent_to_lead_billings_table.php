<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentDateToAgentAndPaidAmountToAgentToLeadBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_billings', function (Blueprint $table) {
            $table->date('payment_date_to_agent')->nullable()->after('agent_paid');
            $table->decimal('paid_amount_to_agent', 10, 2)->nullable()->after('payment_date_to_agent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_billings', function (Blueprint $table) {
            $table->dropColumn('payment_date_to_agent');
            $table->dropColumn('paid_amount_to_agent');
        });
    }
}
