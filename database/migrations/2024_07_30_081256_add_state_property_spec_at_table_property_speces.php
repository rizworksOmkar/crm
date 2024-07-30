<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatePropertySpecAtTablePropertySpeces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_specs', function (Blueprint $table) {
            $table->integer('state_property_spec')->after('property_spec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_specs', function (Blueprint $table) {
            $table->dropColumn('state_property_spec');
        });
    }
}
