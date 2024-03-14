<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoryData = [
            ['name' => 'Benjamin'],
            ['name' => 'Minime'],
            ['name' => 'Cadet'],
            ['name' => 'Poussin'],
            ['name' => 'Junior'],
            ['name' => 'Senior'],
            ['name' => 'Vétéran'],
            ['name' => 'Master']
        ];

        DB::table('categories')->insert($categoryData);
    }
}
