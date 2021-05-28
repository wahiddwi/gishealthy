<?php

use App\Pasien;
use App\Kelurahan;
use App\Kecamatan;
use App\Wilayah;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PasienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
        for ($i = 0; $i < 12; $i++) {
            Pasien::insert([
                'id_kelurahan' => kelurahan::all()->random()->id,
                'id_kecamatan' => kecamatan::all()->random()->id,
                'id_wilayah' => wilayah::all()->random()->id,
                'nama_pasien' => $faker->name,
                'usia' => $faker->numberBetween(1, 100),
                'jenis_kelamin' => $faker->randomElement(['P', 'L']),
                'status' => $faker->randomElement(['Positif', 'Meninggal', 'Sembuh']),
                'alamat' => $faker->address,
                'created_at' => '2021-' . mt_rand(1, 12) . '-12',
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
