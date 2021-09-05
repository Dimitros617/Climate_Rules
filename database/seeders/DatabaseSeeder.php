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

        //Permitions

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




        //Phases of game

        DB::table('phases')->insert([
            'id' => 1,
            'name' => 'Nová',
            'code' => 1,

        ]);

        DB::table('phases')->insert([
            'id' => 2,
            'name' => 'Probíhá',
            'code' => 2,

        ]);

        DB::table('phases')->insert([
            'id' => 3,
            'name' => 'Zprávy',
            'code' => 3,

        ]);
        DB::table('phases')->insert([
            'id' => 4,
            'name' => 'Daně',
            'code' => 4,

        ]);
        DB::table('phases')->insert([
            'id' => 5,
            'name' => 'Pauza',
            'code' => 5,

        ]);
        DB::table('phases')->insert([
            'id' => 6,
            'name' => 'Ukončeno',
            'code' => 6,

        ]);



        //Nations template

        DB::table('nations_templates')->insert([
            'id' => 1,
            'name' => 'Euronia',
            'economy' => 1,
            'tax' => 1,
            'happiness' => 1,
            'gasses' => 1,
            'health' => 1,
            'money' => 1,

        ]);

        DB::table('nations_templates')->insert([
            'id' => 2,
            'name' => 'Aso-chin',
            'economy' => 2,
            'tax' => 2,
            'happiness' => 2,
            'gasses' => 2,
            'health' => 2,
            'money' => 2,

        ]);

        DB::table('nations_templates')->insert([
            'id' => 3,
            'name' => 'Minerawe',
            'economy' => 3,
            'tax' => 3,
            'happiness' => 3,
            'gasses' => 3,
            'health' => 3,
            'money' => 3,

        ]);

        DB::table('nations_templates')->insert([
            'id' => 4,
            'name' => 'Suriolos',
            'economy' => 4,
            'tax' => 4,
            'happiness' => 4,
            'gasses' => 4,
            'health' => 4,
            'money' => 4,

        ]);

    }
}
