<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
//            $this->call(CompanySeeder::class);
//            $this->call(ClientSeeder::class);
//            $this->call(UserSeeder::class);
            $this->call(EventSeeder::class);
        });
    }
}
