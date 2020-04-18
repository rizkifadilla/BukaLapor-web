<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_intance_type');
            $table->unsignedBigInteger('id_intance_service');
            $table->unsignedBigInteger('id_province');
            $table->unsignedBigInteger('id_district');
            $table->unsignedBigInteger('id_subdistrict');
            $table->string('name');
            $table->string('address');

            $table->foreign('id_intance_type')->references('id')->on('instance_types');
            $table->foreign('id_intance_service')->references('id')->on('instance_services');
            $table->foreign('id_province')->references('id')->on('m_zone_provinces');
            $table->foreign('id_district')->references('id')->on('m_zone_districts');
            $table->foreign('id_subdistrict')->references('id')->on('m_zone_subdistricts');
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
        Schema::dropIfExists('instances');
    }
}
