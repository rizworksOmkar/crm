<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('table_name'); // Name of the table being audited
            $table->string('record_id'); // ID of the record being audited
            $table->string('action'); // Action performed (e.g., created, updated, deleted)
            $table->json('changes')->nullable(); // Details of the changes made
            $table->foreignId('user_id')->constrained('users'); // User who performed the action
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
        Schema::dropIfExists('audit_logs');
    }
}
