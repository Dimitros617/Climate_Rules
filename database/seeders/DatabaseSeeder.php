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


        //languages

        DB::table('languages')->insert([
            'id' => 1,
            'name' => 'Čeština',
            'code' => 1,

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
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16"><circle cx="8" cy="8" r="8"/></svg>',

        ]);

        DB::table('phases')->insert([
            'id' => 2,
            'name' => 'Probíhá',
            'code' => 2,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16"><path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/></svg>',

        ]);

        DB::table('phases')->insert([
            'id' => 3,
            'name' => 'Zprávy',
            'code' => 3,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots-fill" viewBox="0 0 16 16"><path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>',

        ]);
        DB::table('phases')->insert([
            'id' => 4,
            'name' => 'Daně',
            'code' => 4,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/></svg>',

        ]);
        DB::table('phases')->insert([
            'id' => 5,
            'name' => 'Pauza',
            'code' => 5,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pause-circle-fill" viewBox="0 0 16 16">  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z"/></svg>',

        ]);
        DB::table('phases')->insert([
            'id' => 6,
            'name' => 'Ukončeno',
            'code' => 6,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">  <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/></svg>',

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




        //start step scale

        DB::table('start_step_scales')->insert([
            'id' => 1,
            'gas' => 30,
            'step' => 10,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 2,
            'gas' => 27,
            'step' => 9,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 3,
            'gas' => 24,
            'step' => 8,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 4,
            'gas' => 21,
            'step' => 7,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 5,
            'gas' => 18,
            'step' => 6,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 6,
            'gas' => 15,
            'step' => 6,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 7,
            'gas' => 12,
            'step' => 4,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 8,
            'gas' => 8,
            'step' => 3,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 9,
            'gas' => 4,
            'step' => 2,
        ]);

        DB::table('start_step_scales')->insert([
            'id' => 10,
            'gas' => 0,
            'step' => 1,
        ]);




        //temperature event counter



        DB::table('temperature_event_counter')->insert([
            'id' => 1,
            'temperature' => 1.5,
            'event' => 1,
            'difficulty' => 3,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 2,
            'temperature' => 2,
            'event' => 1,
            'difficulty' => 2,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 3,
            'temperature' => 2.5,
            'event' => 1,
            'difficulty' => 1,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 4,
            'temperature' => 2.5,
            'event' => 1,
            'difficulty' => 3,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 5,
            'temperature' => 3,
            'event' => 1,
            'difficulty' => 2,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 6,
            'temperature' => 3.5,
            'event' => 1,
            'difficulty' => 1,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 7,
            'temperature' => 3.5,
            'event' => 1,
            'difficulty' => 3,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 8,
            'temperature' => 4,
            'event' => 1,
            'difficulty' => 2,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 9,
            'temperature' => 4.5,
            'event' => 1,
            'difficulty' => 1,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 10,
            'temperature' => 4.5,
            'event' => 1,
            'difficulty' => 3,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 11,
            'temperature' => 5,
            'event' => 1,
            'difficulty' => 2,
        ]);

        DB::table('temperature_event_counter')->insert([
            'id' => 12,
            'temperature' => 5.5,
            'event' => 1,
            'difficulty' => 1,
        ]);



    }
}
