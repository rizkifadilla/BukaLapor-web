<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_instance');
            $table->unsignedBigInteger('id_instance_units');
            $table->string('title');
            $table->text('subtitle');
            $table->string('seen')->nullable();
            $table->enum('status', array('Waiting', 'Verified', 'Not Verified', 'Process', 'Done'))->default('Waiting');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_intance')->references('id')->on('instances')->onDelete('cascade');
            $table->foreign('id_intance_units')->references('id')->on('instance_units')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
