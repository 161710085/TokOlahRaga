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
         $this->command->info('####### Tabel provinsi berhasil terisi! #######');
         $this->call(provinsi::class);
         $this->command->info('####### Tabel provinsi berhasil terisi! #######');
         $this->call(kota::class);
         $this->command->info('####### Tabel provinsi berhasil terisi! #######');
         $this->call(kecamatan::class);
         $this->command->info('####### Tabel provinsi berhasil terisi! #######');
 
    
        }
}
