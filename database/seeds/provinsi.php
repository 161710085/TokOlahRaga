<?php

use Illuminate\Database\Seeder;

class provinsi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $temp = array( 'nama' => 'Kalimantan Timur' );
		DB::table('provinsis')->insert($temp);
    }
}
