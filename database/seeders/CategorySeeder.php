<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
         "name"=>"accident",
       ]);
    //    DB::table('categories')->insert([
    //     "name"=>"murder",
    //   ]);
    //   DB::table('categories')->insert([
    //     "name"=>"robbery",
    //   ]);
    //   DB::table('categories')->insert([
    //     "name"=>"kidnapping",
    //   ]);

    }
}
