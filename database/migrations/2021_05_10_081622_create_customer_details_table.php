<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('regencies_id');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('province_id')->references('id')->on('indoregion_provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('indoregion_districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('village_id')->references('id')->on('indoregion_villages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('regencies_id')->references('id')->on('indoregion_regencies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('customer_details');
    }
}
