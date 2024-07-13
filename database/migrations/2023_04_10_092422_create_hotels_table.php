<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->integer('hotel_star');
            $table->string('hotel_type');
            $table->text('child_policy')->nullable();
            $table->integer('child_age_relaxation')->nullable();
            $table->integer('extra_breakfast_charge')->nullable();
            $table->integer('extra_person_charge')->nullable();
            $table->integer('extra_bed_charge')->nullable();
            $table->integer('base_discount')->nullable();
            $table->integer('special_discount')->nullable();
            $table->integer('agent_discount')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
