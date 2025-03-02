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
            'image' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgq_eoN9nP7LgUxh2K-JGh2OYN-FpanztymNDq9RXFEnLZed8LZldlOAVeWjAdaFjd1896aKxGeOScicmN9mym7mEYNd8XGKa7OITkps7vqU0KYu3h9jWSsANDqRGVtGS-qn8jkT_2g-HYl/s800/fruit_orange.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'もも',
            'detail' => '2',
            'image' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjFR0u6sU9SO2EmpdDbkWhRm0BNGTL025PCVABYGZj4tG7IZ3B7erC7IIhOEJfzjp2NXRLQcO7XWSsl4PdlKsUtkoiLnH8PRaClVmSb8ASmzoQ48mx7jQpzPsJd89IXH5DUq3HYMZLfyi0M/s800/fruit_momo.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'いちご',
            'detail' => '3',
            'image' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi16xaBrly6jqbVAhvgAWn-JdGhVIRXmatPCrcV8n742YEMOFnD6bq17TlSDPNZ-cSQEqXSrXlGKFkksGW0JL2CuRk1uHaC58YE2MKMfbeEoUDADcIUikvNVZ1LzeHQEG4EX3_eQ30kvoRm/s800/fruit_strawberry.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'パイナップル',
            'detail' => '4',
            'image' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgaaUwzdP0LHRtptl4oo6U8pWKzog1t7PtkUTkjKX4E36YrMdL4abwRoozLeFKctq1FVWpWhfnWBJy4DR9vxl19NstMH4zfeVehF262USm9k5jnGXoATrWdLLLTEeDjETviTGvIKuJ9E9nh/s800/fruit_pineapple.png',
            'price' => 100
        ];
        DB::table('items')->insert($param);
    }
}
