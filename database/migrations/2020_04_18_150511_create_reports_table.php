<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
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
            $table->unsignedBigInteger('id_intance');
            $table->unsignedBigInteger('id_intance_units');
            $table->string('title');
            $table->text('subtitle');
            $table->string('seen')->nullable();
            $table->string('status');

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_intance')->references('id')->on('instances');
            $table->foreign('id_intance_units')->references('id')->on('instance_units');
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
