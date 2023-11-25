<?php

namespace Database\Seeders;

use App\Models\Company\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->create([
            'id' => 1,
            'name' => 'Alesson Enterprise - [DEV]',
            'email' => 'asn9006@hotmail.com',
        ]);
    }
}
