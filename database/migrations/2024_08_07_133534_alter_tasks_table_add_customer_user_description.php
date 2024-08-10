<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTasksTableAddCustomerUserDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('customer_description')->nullable();
            $table->text('user_description')->nullable();

            // Drop the old description column
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Add the old description column
            $table->text('description')->nullable();

            $table->dropColumn('customer_description');
            $table->dropColumn('user_description');
        });
    }
}
