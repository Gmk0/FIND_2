<?php

namespace Database\Seeders;

use App\Models\SousCategory;
use Illuminate\Database\Seeder;

class SousCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SousCategory::factory()->count(5)->create();
    }
}
