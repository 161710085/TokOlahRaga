<?php

use Illuminate\Database\Seeder;

class kecamatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $balikpapan = array(
			# 1. Balikpapan
			array('nama' => 'Balikpapan Barat', 'id_kota' => '1'),
			array('nama' => 'Balikpapan Kota', 'id_kota' => '1'),
			array('nama' => 'Balikpapan Selatan', 'id_kota' => '1'),
			array('nama' => 'Balikpapan Tengah', 'id_kota' => '1'),
			array('nama' => 'Balikpapan Timur', 'id_kota' => '1'),
			array('nama' => 'Balikpapan Utara', 'id_kota' => '1'),
		);
		$berau = array(
			# 2. Berau
			array('nama' => 'Batu Putih', 'id_kota' => '2'),
			array('nama' => 'Biatan', 'id_kota' => '2'),
			array('nama' => 'Biduk-Biduk', 'id_kota' => '2'),
			array('nama' => 'Gunung Tabur', 'id_kota' => '2'),
			array('nama' => 'Kelay', 'id_kota' => '2'),
			array('nama' => 'Maratua', 'id_kota' => '2'),
			array('nama' => 'Pulau Derawan', 'id_kota' => '2'),
			array('nama' => 'Sambaliung', 'id_kota' => '2'),
			array('nama' => 'Segah', 'id_kota' => '2'),
			array('nama' => 'Tabalar', 'id_kota' => '2'),
			array('nama' => 'Talisayan', 'id_kota' => '2'),
			array('nama' => 'Tanjung Redeb', 'id_kota' => '2'),
			array('nama' => 'Teluk Bayur', 'id_kota' => '2'),
		);
		$bontang = array(
			# 3. Bontang
			array('nama' => 'Bontang Barat', 'id_kota' => '3'),
			array('nama' => 'Bontang Selatan', 'id_kota' => '3'),
			array('nama' => 'Bontang Utara', 'id_kota' => '3'),
		);
		$bulungan = array(
			# 4. Bulungan
			array('nama' => 'Bunyu', 'id_kota' => '4'),
			array('nama' => 'Peso', 'id_kota' => '4'),
			array('nama' => 'Peso Ilir', 'id_kota' => '4'),
			array('nama' => 'Sekatak', 'id_kota' => '4'),
			array('nama' => 'Tanjung Palas', 'id_kota' => '4'),
			array('nama' => 'Tanjung Palas Barat', 'id_kota' => '4'),
			array('nama' => 'Tanjung Palas Tengah', 'id_kota' => '4'),
			array('nama' => 'Tanjung Palas Timur', 'id_kota' => '4'),
			array('nama' => 'Tanjung Palas Utara', 'id_kota' => '4'),
			array('nama' => 'Tanjung Selor', 'id_kota' => '4'),
		);	
		$kubar = array(
			# 5. Kutai Barat
			array('nama' => 'Barong Tongkok', 'id_kota' => '5'),
			array('nama' => 'Bentian Besar', 'id_kota' => '5'),
			array('nama' => 'Bongan', 'id_kota' => '5'),
			array('nama' => 'Damai', 'id_kota' => '5'),
			array('nama' => 'Jempang', 'id_kota' => '5'),
			array('nama' => 'Laham', 'id_kota' => '5'),
			array('nama' => 'Linggang Bigung', 'id_kota' => '5'),
			array('nama' => 'Long Apari', 'id_kota' => '5'),
			array('nama' => 'Long Bagun', 'id_kota' => '5'),
			array('nama' => 'Long Hubung', 'id_kota' => '5'),
			array('nama' => 'Long Iram', 'id_kota' => '5'),
			array('nama' => 'Long Pahangai', 'id_kota' => '5'),
			array('nama' => 'Melak', 'id_kota' => '5'),
			array('nama' => 'Mook Manaar Bulatn', 'id_kota' => '5'),
			array('nama' => 'Muara Lawa', 'id_kota' => '5'),
			array('nama' => 'Muara Pahu', 'id_kota' => '5'),
			array('nama' => 'Nyuatan', 'id_kota' => '5'),
			array('nama' => 'Penyinggahan', 'id_kota' => '5'),
			array('nama' => 'Sekolaq Darat', 'id_kota' => '5'),
			array('nama' => 'Siluq Ngurai', 'id_kota' => '5'),
			array('nama' => 'Tering', 'id_kota' => '5'),
		);	
		$kukar = array(
			# 6. Kutai Kartanegara
			array('nama' => 'Anggana', 'id_kota' => '6'),
			array('nama' => 'Kembang Janggut', 'id_kota' => '6'),
			array('nama' => 'Kenohan', 'id_kota' => '6'),
			array('nama' => 'Kota Bangun', 'id_kota' => '6'),
			array('nama' => 'Loa Janan', 'id_kota' => '6'),
			array('nama' => 'Loa Kulu', 'id_kota' => '6'),
			array('nama' => 'Marang Kayu', 'id_kota' => '6'),
			array('nama' => 'Muara Badak', 'id_kota' => '6'),
			array('nama' => 'Muara Jawa', 'id_kota' => '6'),
			array('nama' => 'Muara Kaman', 'id_kota' => '6'),
			array('nama' => 'Muara Muntai', 'id_kota' => '6'),
			array('nama' => 'Muara Wis', 'id_kota' => '6'),
			array('nama' => 'Samboja', 'id_kota' => '6'),
			array('nama' => 'Sanga Sanga', 'id_kota' => '6'),
			array('nama' => 'Sebulu', 'id_kota' => '6'),
			array('nama' => 'Tabang', 'id_kota' => '6'),
			array('nama' => 'Tenggarong', 'id_kota' => '6'),
			array('nama' => 'Tenggarong Seberang', 'id_kota' => '6'),
		);
	
		$kutim = array(
			# 7. Kutai Timur
			array('nama' => 'Batu Ampar', 'id_kota' => '7'),
			array('nama' => 'Bengalon', 'id_kota' => '7'),
			array('nama' => 'Busang', 'id_kota' => '7'),
			array('nama' => 'Kaliorang', 'id_kota' => '7'),
			array('nama' => 'Karangan', 'id_kota' => '7'),
			array('nama' => 'Kaubun', 'id_kota' => '7'),
			array('nama' => 'Kombeng', 'id_kota' => '7'),
			array('nama' => 'Long Mesangat', 'id_kota' => '7'),
			array('nama' => 'Muara Ancalong', 'id_kota' => '7'),
			array('nama' => 'Muara Bengkal', 'id_kota' => '7'),
			array('nama' => 'Muara Wahau', 'id_kota' => '7'),
			array('nama' => 'Rantau Pulung', 'id_kota' => '7'),
			array('nama' => 'Sandaran', 'id_kota' => '7'),
			array('nama' => 'Sangatta Selatan', 'id_kota' => '7'),
			array('nama' => 'Sangatta Utara', 'id_kota' => '7'),
			array('nama' => 'Sangkulirang', 'id_kota' => '7'),
			array('nama' => 'Telen', 'id_kota' => '7'),
			array('nama' => 'Teluk Pandan', 'id_kota' => '7'),
		);
		$malinau = array(
			# 8. Malinau
			array('nama' => 'Bahau Hulu', 'id_kota' => '8'),
			array('nama' => 'Kayan Hilir', 'id_kota' => '8'),
			array('nama' => 'Kayan Hulu', 'id_kota' => '8'),
			array('nama' => 'Kayan Selatan', 'id_kota' => '8'),
			array('nama' => 'Malinau Barat', 'id_kota' => '8'),
			array('nama' => 'Malinau Kota', 'id_kota' => '8'),
			array('nama' => 'Malinau Selatan', 'id_kota' => '8'),
			array('nama' => 'Malinau Selatan Hilir', 'id_kota' => '8'),
			array('nama' => 'Malinau Selatan Hulu', 'id_kota' => '8'),
			array('nama' => 'Malinau Utara', 'id_kota' => '8'),
			array('nama' => 'Mentarang', 'id_kota' => '8'),
			array('nama' => 'Mentarang Hulu', 'id_kota' => '8'),
			array('nama' => 'Pujungan', 'id_kota' => '8'),
			array('nama' => 'Sungai Boh', 'id_kota' => '8'),
			array('nama' => 'Sungai Tubu', 'id_kota' => '8'),
		);
		$nunukan = array(
			# 9. Nunukan
			array('nama' => 'Krayan', 'id_kota' => '9'),
			array('nama' => 'Krayan Selatan', 'id_kota' => '9'),
			array('nama' => 'Lumbis', 'id_kota' => '9'),
			array('nama' => 'Lumbis Ogong', 'id_kota' => '9'),
			array('nama' => 'Nunukan', 'id_kota' => '9'),
			array('nama' => 'Nunukan Selatan', 'id_kota' => '9'),
			array('nama' => 'Sebatik', 'id_kota' => '9'),
			array('nama' => 'Sebatik Barat', 'id_kota' => '9'),
			array('nama' => 'Sebatik Tengah', 'id_kota' => '9'),
			array('nama' => 'Sebatik Timur', 'id_kota' => '9'),
			array('nama' => 'Sebatik Utara', 'id_kota' => '9'),
			array('nama' => 'Sebuku', 'id_kota' => '9'),
			array('nama' => 'Sei Menggaris', 'id_kota' => '9'),
			array('nama' => 'Sembakung', 'id_kota' => '9'),
			array('nama' => 'Tulin Onsoi', 'id_kota' => '9'),
		);
		$paser = array(
			# 10. Paser
			array('nama' => 'Batu Engau', 'id_kota' => '10'),
			array('nama' => 'Batu Sopang', 'id_kota' => '10'),
			array('nama' => 'Kuaro', 'id_kota' => '10'),
			array('nama' => 'Long Ikis', 'id_kota' => '10'),
			array('nama' => 'Long Kali', 'id_kota' => '10'),
			array('nama' => 'Muara Komam', 'id_kota' => '10'),
			array('nama' => 'Muara Samu', 'id_kota' => '10'),
			array('nama' => 'Pasir Balengkong', 'id_kota' => '10'),
			array('nama' => 'Tanah Grogot', 'id_kota' => '10'),
			array('nama' => 'Tanjung Harapan', 'id_kota' => '10'),
		);
		$ppu = array(
			# 11. Penajam Paser Utara
			array('nama' => 'Babulu', 'id_kota' => '11'),
			array('nama' => 'Penajam', 'id_kota' => '11'),
			array('nama' => 'Sepaku', 'id_kota' => '11'),
			array('nama' => 'Waru', 'id_kota' => '11'),
		);
		$samarinda = array(
			# 12. Samarinda
			array('nama' => 'Loa Janan Ilir', 'id_kota' => '12'),
			array('nama' => 'Palaran', 'id_kota' => '12'),
			array('nama' => 'Samarinda Ilir', 'id_kota' => '12'),
			array('nama' => 'Samarinda Kota', 'id_kota' => '12'),
			array('nama' => 'Samarinda Seberang', 'id_kota' => '12'),
			array('nama' => 'Samarinda Ulu', 'id_kota' => '12'),
			array('nama' => 'Samarinda Utara', 'id_kota' => '12'),
			array('nama' => 'Sambutan', 'id_kota' => '12'),
			array('nama' => 'Sungai Kunjang', 'id_kota' => '12'),
			array('nama' => 'Sungai Pinang', 'id_kota' => '12'),
		);
		$tidung = array(
			# 13. Tana Tidung
			array('nama' => 'Betayau', 'id_kota' => '13'),
			array('nama' => 'Sesayap', 'id_kota' => '13'),
			array('nama' => 'Sesayap Ilir', 'id_kota' => '13'),
			array('nama' => 'Tana Lia', 'id_kota' => '13'),
		);
		$tarakan = array(
			# 14. Tarakan
			array('nama' => 'Tarakan Barat', 'id_kota' => '14'),
			array('nama' => 'Tarakan Tengah', 'id_kota' => '14'),
			array('nama' => 'Tarakan Timur', 'id_kota' => '14'),
			array('nama' => 'Tarakan Utara', 'id_kota' => '14'),
		);
		
		DB::table('kecamatans')->insert($balikpapan);
		DB::table('kecamatans')->insert($berau);
		DB::table('kecamatans')->insert($bontang);
		DB::table('kecamatans')->insert($bulungan);
		DB::table('kecamatans')->insert($kubar);
		DB::table('kecamatans')->insert($kukar);
		DB::table('kecamatans')->insert($kutim);
		DB::table('kecamatans')->insert($malinau);
		DB::table('kecamatans')->insert($nunukan);
		DB::table('kecamatans')->insert($paser);
		DB::table('kecamatans')->insert($ppu);
		DB::table('kecamatans')->insert($samarinda);
		DB::table('kecamatans')->insert($tidung);
		DB::table('kecamatans')->insert($tarakan);
	}
}
