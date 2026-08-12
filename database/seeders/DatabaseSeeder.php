<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProfilDesaSeeder::class,
            SejarahKepalaDesaSeeder::class,
            DusunSeeder::class,
            StatistikPendudukSeeder::class,
            IrigasiSeeder::class,
            BatasWilayahSeeder::class,
            PerangkatDesaSeeder::class,
            LembagaKemasyarakatanSeeder::class,
            IpmSeeder::class,
            SekolahSeeder::class,
            UsahaEkonomiSeeder::class,
            TenagaKesehatanSeeder::class,
            SaranaKesehatanSeeder::class,
        ]);
    }
}