<?php

namespace Database\Seeders;

use App\Models\JenisBelanja;
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
        $this->call(JenisBelanjaSeeder::class);
        $this->call(FungsiSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PokSeeder::class);
    }
}
