<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('requirement_type')->nullable();
            $table->string('property_specs')->nullable();
            $table->string('cust_business_type')->nullable();
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
            $table->dropColumn('requirement_type');
            $table->dropColumn('property_type');
            $table->dropColumn('property_specs');
            $table->dropColumn('cust_business_type');
        });
    }
}
