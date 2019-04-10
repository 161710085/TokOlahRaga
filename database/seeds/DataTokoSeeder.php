<?php

use Illuminate\Database\Seeder;
use App\merk;
use App\kategori;
use App\jenis;
class DataTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $m = merk::create(['nama_merk'	=> 'Adidas', 'slug' => 'adidas']);
        $m2 = merk::create(['nama_merk'	=> 'New Balance', 'slug' => 'new-balance']);
        $m3 = merk::create(['nama_merk'	=> 'Umbro', 'slug' => 'umbro']);
        $m4 = merk::create(['nama_merk'	=> 'Puma', 'slug' => 'puma']);
        $m5 = merk::create(['nama_merk'	=> 'Under Armour', 'slug' => 'under-armour']);
        $m6 = merk::create(['nama_merk'	=> 'Reebok', 'slug' => 'rebook']);
        $m7 = merk::create(['nama_merk'	=> 'Nike', 'slug' => 'nike']);
        $m8 = merk::create(['nama_merk'	=> 'Specs', 'slug' => 'specs']);
        $m9 = merk::create(['nama_merk'	=> 'League', 'slug' => 'league']);
        $m10 = merk::create(['nama_merk'	=> 'MBB Apparel', 'slug' => 'mb-apparel']);
        $m11 = merk::create(['nama_merk'	=> 'Sembada', 'slug' => 'sembada']);
        $m12 = merk::create(['nama_merk'	=> 'Fila', 'slug' => 'fila']);
        $m14 = merk::create(['nama_merk'	=> 'Asics', 'slug' => 'asics']);
        $m15 = merk::create(['nama_merk'	=> 'Yonex', 'slug' => 'yonex']);
        $m16 = merk::create(['nama_merk'	=> 'Mizuno', 'slug' => 'mizuno']);
        $m17 = merk::create(['nama_merk'	=> 'Mitre', 'slug' => 'mitre']);

        $kategori = kategori::create(['nama_kategori'	=> 'Jersey', 'slug' => 'jersey']);
        $kategori2 = kategori::create(['nama_kategori'	=> 'Rompi', 'slug' => 'rompi']);
        $kategori3 = kategori::create(['nama_kategori'	=> 'Bola', 'slug' => 'bola']);
        $kategori4 = kategori::create(['nama_kategori'	=> 'Kaos Kaki', 'slug' => 'kaos-kaki']);
        $kategori5 = kategori::create(['nama_kategori'	=> 'Jaket', 'slug' => 'jaket']);
        $kategori6 = kategori::create(['nama_kategori'	=> 'Celana', 'slug' => 'celana']);
        $kategori7 = kategori::create(['nama_kategori'	=> 'Aksesoris', 'slug' => 'aksesoris']);
        $kategori8 = kategori::create(['nama_kategori'	=> 'Raket', 'slug' => 'raket']);
        $kategori8 = kategori::create(['nama_kategori'	=> 'Sepatu', 'slug' => 'sepatu']);
        
        $jenis = jenis::create(['nama_olahraga'	=> 'Futsal', 'slug' => 'futsal']);
        $jenis2 = jenis::create(['nama_olahraga'	=> 'Sepak Bola', 'slug' => 'sepak-bola']);
        $jenis3 = jenis::create(['nama_olahraga'	=> 'Badminton', 'slug' => 'badminton']);
        $jenis4 = jenis::create(['nama_olahraga'	=> 'Renang', 'slug' => 'renang']);
        $jenis5 = jenis::create(['nama_olahraga'	=> 'Volly', 'slug' => 'volly']);
        $jenis6 = jenis::create(['nama_olahraga'	=> 'Basket', 'slug' => 'basket']);
        $jenis7 = jenis::create(['nama_olahraga'	=> 'Atletik', 'slug' => 'atletik']);
        $jenis8 = jenis::create(['nama_olahraga'	=> 'Tenis', 'slug' => 'tenis']);
    }
}
