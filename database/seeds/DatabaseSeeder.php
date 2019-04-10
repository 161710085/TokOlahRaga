<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->command->info('####### Tabel User Terisi !!! #######');
         $this->call(DataTokoSeeder::class);
         $this->command->info('####### Tabel DataToko Terisi !!! #######');
    
        }
}
