<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loadings')->insert([
            [
                'receiving' => '2024/07/23',
                'name' => '青木宣親',
                'number' => '品川300 か21-21',
                'charge' => '山崎',
                'issue' => '2024/07/27',
                'remarks' => '代車 世田谷300 か26-69',
                'place' => '世田谷',
                'created_at' => '2024/01/13 11:11:11'
            ],
            [
                'receiving' => '2024/07/25',
                'name' => '山田哲人',
                'number' => '品川300 か24-32',
                'charge' => '宇野',
                'issue' => '2024/07/29',
                'remarks' => '代車 世田谷300 か8-13',
                'place' => '世田谷',
                'created_at' => '2024/01/15 11:11:11'
            ],
            [
                'receiving' => '2024/01/13',
                'name' => '木村拓哉',
                'number' => '品川300 か00-32',
                'charge' => '山崎',
                'issue' => '2024/07/30',
                'remarks' => '代車 世田谷300 か08-14',
                'place' => '品川',
                'created_at' => '2024/01/13 11:11:11'
            ],
        ]);
    }
}