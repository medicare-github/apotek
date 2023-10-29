<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Toko;
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
        // \App\Models\User::factory(10)->create();
        DB::table('tokos')->insert([
            'nama'=>'Toko A',
            'alamat'=>'Jalan Raya A'
        ]);
        $this->call([
            SettingTableSeeder::class,
            UserTableSeeder::class,
        ]);

    }
}
