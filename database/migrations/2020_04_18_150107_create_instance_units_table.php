<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_intance');
            $table->unsignedBigInteger('id_intance_type');
            $table->unsignedBigInteger('id_intance_service');
            $table->unsignedBigInteger('id_province');
            $table->unsignedBigInteger('id_district');
            $table->unsignedBigInteger('id_subdistrict');
            $table->unsignedBigInteger('id_user');
            $table->string('name');
            $table->string('address');

            $table->foreign('id_intance')->references('id')->on('instances')->onDelete('cascade');
            $table->foreign('id_intance_type')->references('id')->on('instance_types')->onDelete('cascade');
            $table->foreign('id_intance_service')->references('id')->on('instance_services')->onDelete('cascade');
            $table->foreign('id_province')->references('id')->on('m_zone_provinces');
            $table->foreign('id_district')->references('id')->on('m_zone_districts');
            $table->foreign('id_subdistrict')->references('id')->on('m_zone_subdistricts');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('instance_units');
    }
}
