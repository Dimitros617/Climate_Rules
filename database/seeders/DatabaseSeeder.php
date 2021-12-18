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


        //Statistics types

        DB::table('statistics_types')->insert([
            'id' => 1,
            'name' => 'Ekonomie',
            'code_name' => 'economy',
            'unit' => '%',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'id' => 2,
            'name' => 'Level ekonomie',
            'code_name' => 'level_economy',
            'unit' => '%',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">  <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>  <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'id' => 3,
            'name' => 'Daň',
            'code_name' => 'tax',
            'unit' => '%',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-piggy-bank-fill" viewBox="0 0 16 16">  <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zm7.173 3.876a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199zm-8.999-.65A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 1 0 .286-.958A7.601 7.601 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962zM5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'id' => 4,
            'name' => 'Nálada',
            'code_name' => 'happiness',
            'unit' => '',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill" viewBox="0 0 16 16">  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zM4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'id' => 5,
            'name' => 'Level nálady',
            'code_name' => 'level_happiness',
            'unit' => '',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>  <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'id' => 6,
            'name' => 'Skl. Plyny',
            'code_name' => 'gasses',
            'unit' => 'CO2',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 1000 1000" xml:space="preserve"><path d="M559 538c-27 0-48 9-63 28-16 18-23 44-23 76s7 57 23 75 37 27 63 27c28 0 48-9 63-27 14-17 21-43 21-76s-7-59-21-76c-15-18-35-27-63-27zM778 382s105-27 173 40c24-19 39-50 39-84 0-58-29-110-106-91-15-54-63-108-126-108-53 0-95 27-116 73 23 10 103 55 136 170z"/><path d="M741 427c-32-120-134-240-269-240-156 0-268 111-279 288-98 0-183 73-183 184s75 202 167 202h587c114 0 205-106 205-232 0-128-61-244-228-202zM390 559c-19-14-40-21-63-21-28 0-50 10-67 29s-25 44-25 76 8 56 24 74 38 27 65 27c23 0 47-8 66-24v45c-19 12-46 19-75 19-39 0-70-13-93-38-24-26-36-59-36-99 0-45 13-81 38-108 26-27 60-41 103-41 24 0 44 4 63 13v48zm265 185c-25 26-58 40-99 40-40 0-72-13-96-39-24-25-36-59-36-101 0-45 12-81 37-107s59-39 101-39c40 0 72 12 95 37 23 26 35 60 35 104s-13 78-37 105zm156 19v10h-88v-14l43-38c11-11 20-19 24-25 3-7 6-13 6-20s-2-13-6-17-12-6-21-6c-12 0-26 5-36 15v-17c10-8 25-12 39-12 13 0 23 3 30 10 8 6 12 15 12 26 0 8-2 16-7 24-4 8-12 18-25 30l-30 29v5h59z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'id' => 7,
            'name' => 'Zdraví',
            'code_name' => 'health',
            'unit' => 'let',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 16 16">  <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Zm5.71-2.858a.5.5 0 1 0-.708.707.5.5 0 0 0 .707-.707ZM6.974 6.939a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707ZM5.56 8.354a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm2.828 2.828a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707Zm1.414-2.121a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.706-.708.5.5 0 0 0 .707.708Zm-4.242.707a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm1.414-2.122a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707ZM8.646 3.354l4 4 .708-.708-4-4-.708.708Zm-1.292 9.292-4-4-.708.708 4 4 .708-.708Z"/></svg>',
        ]);






        //Nation statistic values templates

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 1,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 2,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 3,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 5,
        ]);

        //Economy level

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 5,
            'value' => 3,
        ]);

        //Tax

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 1,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 3,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 4,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 5,
            'value' => 5,
        ]);

            //Happiness
        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 1,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 2,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 5,
            'value' => 4,
        ]);

        //Happiness level

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 3,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 4,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 5,
            'value' => 0,
        ]);

        //gasses

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => -7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => -5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => -3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => -1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 11,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 12,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 13,
            'value' => 5,
        ]);

        //Health

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => 76,
        ]);

        //- SET 2 ----

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 1,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 2,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 8,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 16,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 32,
        ]);

        //Economy level

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 5,
            'value' => 3,
        ]);

        //Tax

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 1,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 3,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 4,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 5,
            'value' => 5,
        ]);

        //Happiness
        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 1,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 2,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 5,
            'value' => 4,
        ]);

        //Happiness level

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 3,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 4,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 5,
            'value' => 0,
        ]);

        //gasses

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => -7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => -5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => -3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => -1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 11,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 12,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 13,
            'value' => 5,
        ]);

        //Health

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => 76,
        ]);


        //Nations template

        DB::table('nations_templates')->insert([
            'name' => 'Euronia',
            'statistic_values_set' => 1,
        ]);

        DB::table('nations_templates')->insert([
            'name' => 'Aso-chin',
            'statistic_values_set' => 1,
        ]);

        DB::table('nations_templates')->insert([
            'name' => 'Minerawe',
            'statistic_values_set' => 2,

        ]);


        // Start to nation statistics

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 1,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 2,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 3,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 4,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 5,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 6,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 7,
            'index' => 2,
        ]);

        //nation --- 2

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 1,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 2,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 3,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 4,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 5,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 6,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 7,
            'index' => 2,
        ]);

        //nation --- 3

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 1,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 2,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 3,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 4,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 5,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 6,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 7,
            'index' => 2,
        ]);


// Směry

        DB::table('branches')->insert([
            'name' => 'Vodíková technologie',
            'code' => 'hydrogen',
            'color' => '209be1',
        ]);

        DB::table('branches')->insert([
            'name' => 'A. I.',
            'code' => 'ai',
            'color' => 'ebc80c',
        ]);


        // Technologické směry

        DB::table('technologies_areas')->insert([
            'name' => 'Zemědělství',
            'description' => 'Popisek k zemědělství',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16"><path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/></svg>',
        ]);

        DB::table('technologies_areas')->insert([
            'name' => 'Energetika',
            'description' => 'Popisek k energetice',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-battery-charging" viewBox="0 0 16 16">  <path d="M9.585 2.568a.5.5 0 0 1 .226.58L8.677 6.832h1.99a.5.5 0 0 1 .364.843l-5.334 5.667a.5.5 0 0 1-.842-.49L5.99 9.167H4a.5.5 0 0 1-.364-.843l5.333-5.667a.5.5 0 0 1 .616-.09z"/>  <path d="M2 4h4.332l-.94 1H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h2.38l-.308 1H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/>  <path d="M2 6h2.45L2.908 7.639A1.5 1.5 0 0 0 3.313 10H2V6zm8.595-2-.308 1H12a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H9.276l-.942 1H12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.405z"/>  <path d="M12 10h-1.783l1.542-1.639c.097-.103.178-.218.241-.34V10zm0-3.354V6h-.646a1.5 1.5 0 0 1 .646.646zM16 8a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8z"/></svg>',
        ]);

        DB::table('technologies_areas')->insert([
            'name' => 'Doprava',
            'description' => 'Popisek k dopravě',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stoplights-fill" viewBox="0 0 16 16">  <path fill-rule="evenodd" d="M6 0a2 2 0 0 0-2 2H2c.167.5.8 1.6 2 2v2H2c.167.5.8 1.6 2 2v2H2c.167.5.8 1.6 2 2v1a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-1c1.2-.4 1.833-1.5 2-2h-2V8c1.2-.4 1.833-1.5 2-2h-2V4c1.2-.4 1.833-1.5 2-2h-2a2 2 0 0 0-2-2H6zm3.5 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM8 13a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>',
        ]);

        DB::table('technologies_areas')->insert([
            'name' => 'Zábava',
            'description' => 'Popisek k zábavě',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">  <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>  <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/></svg>',
        ]);

        DB::table('technologies_areas')->insert([
            'name' => 'Lékařství',
            'description' => 'Popisek k lekářství',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 16 16">  <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Zm5.71-2.858a.5.5 0 1 0-.708.707.5.5 0 0 0 .707-.707ZM6.974 6.939a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707ZM5.56 8.354a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm2.828 2.828a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707Zm1.414-2.121a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.706-.708.5.5 0 0 0 .707.708Zm-4.242.707a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm1.414-2.122a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707ZM8.646 3.354l4 4 .708-.708-4-4-.708.708Zm-1.292 9.292-4-4-.708.708 4 4 .708-.708Z"/></svg>',
        ]);

        //Stav

        DB::table('nations_technologies_status')->insert([
            'name' => 'Skrytá',
            'code' => 'hidden',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Koupit',
            'code' => 'new',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Schvalování nákupu',
            'code' => 'buy',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Certifikovat',
            'code' => 'investment',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Schvalování certifikace',
            'code' => 'certificate',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Aktivní',
            'code' => 'active',
        ]);


        // Technologie

        DB::table('technologies')->insert([
            'code' => 'A-01',
            'name' => 'Autonomní vozidla',
            'description' => 'Popisek technologie',
            'price' => 5,
            'certificate' => 1,
            'img_url' => 'https://d15-a.sdn.cz/d_15/c_img_gY_Z/uQkGAm.jpeg',
            'branch_id' => 1,
            'area_id' => 1,
        ]);

        DB::table('technologies')->insert([
            'code' => 'S-02',
            'name' => 'Solární panely',
            'description' => 'Popisek technologie 2',
            'price' => 2,
            'certificate' => 1,
            'img_url' => 'https://wdet.org/media/daguerre/2019/10/07/6113b4cc203daf0eb857.png',
            'branch_id' => 2,
            'area_id' => 2,
        ]);

        DB::table('technologies')->insert([
            'code' => 'O-03',
            'name' => 'Odsolování mořské vody',
            'description' => 'Popisek technologie 3',
            'price' => 1,
            'certificate' => 1,
            'img_url' => 'https://www.ekobydleni.eu/i/TUNIS1-580x326-1.jpg',
            'branch_id' => 1,
            'area_id' => 3,
        ]);

        DB::table('technologies')->insert([
            'code' => 'Z-04',
            'name' => 'Zpracování vyhořelého jaderného paliva a možný buffer znaků',
            'description' => 'Popisek technologie 4',
            'price' => 1,
            'certificate' => 1,
            'branch_id' => 2,
            'area_id' => 4,
        ]);

        //Technologické změny a upravy - co budou technologie upravovat

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 1,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 1,
            'statistic_type_id' => 6,
            'index_move' => -1,
        ]);



        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 1,
            'index_move' => 2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 6,
            'index_move' => -1,
        ]);



        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 3,
            'statistic_type_id' => 7,
            'index_move' => 3,
        ]);



        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 3,
            'index_move' => 6,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 4,
            'index_move' => 5,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 7,
            'index_move' => 4,
        ]);

    }
}
