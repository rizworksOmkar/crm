<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgainStateleadsourceColumnAfterLeadSourceToLeadSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_sources', function (Blueprint $table) {
            $table->integer('state_lead_source')->nullable()->after('lead_source');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_sources', function (Blueprint $table) {
            $table->dropColumn('state_lead_source');
        });
    }
}
