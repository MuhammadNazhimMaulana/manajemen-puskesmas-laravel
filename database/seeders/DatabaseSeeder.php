<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter_Model;
use App\Models\Ruang_Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Factory for adding dummy docter
        Dokter_Model::factory(7)->create();

        // Factory for adding dummy room
        Ruang_Model::factory(4)->create();
    }
}
