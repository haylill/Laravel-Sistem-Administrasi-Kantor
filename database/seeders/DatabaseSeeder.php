<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\agama;
use \App\Models\jabatan;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // agama
        Agama::create([
            'nama_agama' => 'Islam'
          ]);
            Agama::create([
                'nama_agama' => 'Kristen'
            ]);
            Agama::create([
                'nama_agama' => 'Katolik'
            ]);
            Agama::create([
                'nama_agama' => 'Hindu'
            ]);
            Agama::create([
                'nama_agama' => 'Budha'
            ]);
            Agama::create([
                'nama_agama' => 'Konghucu'
            ]);
        // jabatan
        Jabatan::create([
            'nama_jabatan' => 'Direktur'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Manager'
        ]);
        Jabatan::create([
            'nama_jabatan' => 'Staff'
        ]);
    }
}
