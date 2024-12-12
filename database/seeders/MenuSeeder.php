<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        for ($i=1; $i <= 5; $i++) { 
            DB::table('menus')->insert([
                ['name' => 'food '.$i,'price' => '1'.$i.'.00','status' => 'available', 'created_at' => $now, 'updated_at' => $now],

            ]);
        }

        for ($i=1; $i <= 5; $i++) { 
            DB::table('menus')->insert([
                ['name' => 'drink '.$i,'price' => '1'.$i.'.00','status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }
}
