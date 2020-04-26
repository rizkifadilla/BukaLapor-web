<?php

use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
        	'id_user' => 1,
        	'id_instance' => 2,
        	'title' => "lorem ipsum dolor",
            'subtitle' => 'lorem dolor lorem lorem dolor lorem lorem dolor lorem',
            'status' => 'waiting',
        ]);
    }
}
