<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistic; // Pastikan ini ada

class StatisticSeeder extends Seeder
{
    public function run()
    {
        Statistic::create([
            'total_food_saved' => 50000, 
            'carbon_emission_saved' => 7.5, 
            'date' => '2025-05-01'
        ]);

        Statistic::create([
            'total_food_saved' => 30000, 
            'carbon_emission_saved' => 4.5, 
            'date' => '2025-05-03'
        ]);

        Statistic::create([
            'total_food_saved' => 45000, 
            'carbon_emission_saved' => 6.75, 
            'date' => '2025-05-06'
        ]);
    }
}
