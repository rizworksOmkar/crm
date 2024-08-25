<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFinalizedPropertyRentAdvancePaymentTermsToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('finalized_property')->nullable()->after('property_type');
            $table->decimal('rent', 15, 2)->nullable()->after('finalized_property');
            $table->decimal('advance', 15, 2)->nullable()->after('rent');
            $table->text('payment_terms')->nullable()->after('advance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('finalized_property');
            $table->dropColumn('rent');
            $table->dropColumn('advance');
            $table->dropColumn('payment_terms');
        });
    }
}
