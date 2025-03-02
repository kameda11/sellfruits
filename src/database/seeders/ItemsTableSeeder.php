<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'みかん',
            'detail' => '1',
            'image' => 'storage/app/public/items/fruit_orange.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'もも',
            'detail' => '2',
            'image' => 'storage/app/public/items/fruit_momo.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'いちご',
            'detail' => '3',
            'image' => 'storage/app/public/items/fruit_strawberry.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'パイナップル',
            'detail' => '4',
            'image' => 'storage/app/public/items/fruit_pineapple.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
    }
}
