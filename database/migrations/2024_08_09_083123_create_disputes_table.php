<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billing_id')->constrained('billing')->onDelete('cascade'); // Foreign key to billing table
            $table->string('reason'); // Reason for the dispute
            $table->string('status'); // Status of the dispute (e.g., pending, resolved)
            $table->text('resolution')->nullable(); // Resolution details, if any
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disputes');
    }
}
