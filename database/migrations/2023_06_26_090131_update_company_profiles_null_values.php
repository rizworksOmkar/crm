<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanyProfilesNullValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_profiles', function (Blueprint $table) {

                $table->string('company_name')->nullable()->change();
                $table->string('company_logo_1')->nullable()->change();
                $table->string('company_logo_2')->nullable()->change();
                $table->string('company_email_id_1')->nullable()->change();
                $table->string('company_email_id_2')->nullable()->change();
                $table->string('company_country_code')->nullable()->change();
                $table->string('company_phone_number_1')->nullable()->change();
                $table->string('company_phone_number_2')->nullable()->change();
                $table->string('company_landline_1')->nullable()->change();
                $table->string('company_landline_2')->nullable()->change();
                $table->string('company_registered_address')->nullable()->change();
                $table->unsignedBigInteger('city_id')->nullable()->change();
                $table->unsignedBigInteger('state_id')->nullable()->change();
                $table->unsignedBigInteger('country_id')->nullable()->change();
                $table->string('pincode')->nullable()->change();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            //
        });
    }
}
