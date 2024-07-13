<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_logo_1')->nullable();
            $table->string('company_logo_2')->nullable();
            $table->string('company_email_id_1');
            $table->string('company_email_id_2');
            $table->string('company_country_code');
            $table->string('company_phone_number_1');
            $table->string('company_phone_number_2');
            $table->string('company_landline_1');
            $table->string('company_landline_2');
            $table->string('company_registered_address');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('country_id');
            $table->string('pincode');
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
        Schema::dropIfExists('company_profiles');
    }
}
