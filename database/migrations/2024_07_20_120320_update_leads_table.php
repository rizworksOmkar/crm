<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            // Drop the columns
            $table->dropColumn('budget');
            $table->dropColumn('area_requirements');

            // Add new columns
            $table->string('lead_source')->nullable();
            $table->decimal('min_budget', 10, 2)->nullable();
            $table->decimal('max_budget', 10, 2)->nullable();
            $table->decimal('min_area', 10, 2)->nullable();
            $table->decimal('max_area', 10, 2)->nullable();
            $table->string('specific_location')->nullable();
            $table->string('place')->nullable();
            $table->string('preferred_landmark')->nullable();
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
            // Add the dropped columns back
            $table->decimal('budget', 10, 2)->nullable();
            $table->string('area_requirements')->nullable();

            // Drop the new columns
            $table->dropColumn('lead_source');
            $table->dropColumn('min_budget');
            $table->dropColumn('max_budget');
            $table->dropColumn('min_area');
            $table->dropColumn('max_area');
            $table->dropColumn('specific_location');
            $table->dropColumn('place');
            $table->dropColumn('preferred_landmark');
        });
    }
}
