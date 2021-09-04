<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permition')->insert([
            'id' => 1,
            'name' => 'Nový',
            'default' => 1,
            'show' => 1,
            'play' => 0,
            'admin' => 0,
        ]);
        DB::table('permition')->insert([
            'id' => 2,
            'name' => 'Ověřený',
            'show' => 1,
            'play' => 1,
            'admin' => 0,

        ]);
        DB::table('permition')->insert([
            'id' => 3,
            'name' => 'Admin',
            'show' => 1,
            'play' => 1,
            'admin' => 1,

        ]);

        //Difficulties

        DB::table('difficulties')->insert([
            'id' => 1,
            'name' => 'Easy',
            'code' => 1,

        ]);

        DB::table('difficulties')->insert([
            'id' => 2,
            'name' => 'Medium',
            'code' => 2,

        ]);

        DB::table('difficulties')->insert([
            'id' => 3,
            'name' => 'Hard',
            'code' => 3,

        ]);

    }
}
