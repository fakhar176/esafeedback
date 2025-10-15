<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();


        DB::table('provinces')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('provinces')->insert([['id' => 1, 'name' => 'Punjab', 'urdu_name' => 'پنجاب', 'code' => 'PB', 'capital' => 'Lahore'], ['id' => 2, 'name' => 'Sindh', 'urdu_name' => 'سندھ', 'code' => 'SD', 'capital' => 'Karachi'], ['id' => 3, 'name' => 'Khyber Pakhtunkhwa', 'urdu_name' => 'خیبر پختونخوا', 'code' => 'KP', 'capital' => 'Peshawar'], ['id' => 4, 'name' => 'Balochistan', 'urdu_name' => 'بلوچستان', 'code' => 'BA', 'capital' => 'Quetta'], ['id' => 5, 'name' => 'Islamabad Capital Territory', 'urdu_name' => 'اسلام آباد کیپیٹل ٹیریٹری', 'code' => 'IS', 'capital' => 'Islamabad'], ['id' => 6, 'name' => 'Gilgit-Baltistan', 'urdu_name' => 'گلگت بلتستان', 'code' => 'GB', 'capital' => 'Gilgit'], ['id' => 7, 'name' => 'Azad Jammu & Kashmir', 'urdu_name' => 'آزاد جموں و کشمیر', 'code' => 'AK', 'capital' => 'Muzaffarabad'],]);


    }
}
