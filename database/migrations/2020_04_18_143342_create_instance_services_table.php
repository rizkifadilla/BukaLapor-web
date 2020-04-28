<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_services', function (Blueprint $table) {
            $table->id();
            $table->string('index');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('instance_services')->insert([
            ['index' => '1.1','name' => 'Pelayanan Masyarakat'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instance_services');
    }
}
