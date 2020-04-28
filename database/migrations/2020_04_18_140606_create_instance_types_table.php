<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_types', function (Blueprint $table) {
            $table->id();
            $table->string('index');
            $table->string('name');
            $table->timestamps();
        });
        DB::table('instance_types')->insert([
            ['index' => '1','name' => 'Negeri'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instance_types');
    }
}
