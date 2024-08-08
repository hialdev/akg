<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['avatar-akg-1.png', 'avatar-akg-2.png', 'avatar-akg-3.png'];
        $roles = [
            'Chef', 'Sous Chef', 'Pastry Chef', 'Restaurant Manager', 
            'Culinary Director', 'Food and Beverage Manager', 
            'Corporate Chef', 'Corporate Event Planner'
        ];
        
        for ($i = 1; $i <= 8; $i++) {
            DB::table('teams')->insert([
                'name' => "Team Member $i",
                'role' => $roles[$i - 1],
                'image' => $images[array_rand($images)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
