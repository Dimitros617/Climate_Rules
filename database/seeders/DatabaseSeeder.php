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


        //Statistics types: 1 Ekonomika, 2 Kupní síla, 3 Daň, 4 Nálada, 5 Nespokojenost, 6 Délka života, 7 Znečištění

        DB::table('statistics_types')->insert([
            'position' => 1,
            'name' => 'Ekonomika',
            'code_name' => 'economy',
            'unit' => 'CRi',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6h-6z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'position' => 2,
            'name' => 'Kupní síla',
            'code_name' => 'level_economy',
            'unit' => 'CRi',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><g><rect fill="none" height="24" width="24"/><path d="M19,14V6c0-1.1-0.9-2-2-2H3C1.9,4,1,4.9,1,6v8c0,1.1,0.9,2,2,2h14C18.1,16,19,15.1,19,14z M17,14H3V6h14V14z M10,7 c-1.66,0-3,1.34-3,3s1.34,3,3,3s3-1.34,3-3S11.66,7,10,7z M23,7v11c0,1.1-0.9,2-2,2H4c0-1,0-0.9,0-2h17V7C22.1,7,22,7,23,7z"/></g></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'position' => 3,
            'name' => 'Daň',
            'code_name' => 'tax',
            'unit' => 'CRi',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><g><rect fill="none" height="24" width="24"/></g><g><g><g><path d="M7.5,4C5.57,4,4,5.57,4,7.5S5.57,11,7.5,11S11,9.43,11,7.5S9.43,4,7.5,4z M7.5,9C6.67,9,6,8.33,6,7.5S6.67,6,7.5,6 S9,6.67,9,7.5S8.33,9,7.5,9z M16.5,13c-1.93,0-3.5,1.57-3.5,3.5s1.57,3.5,3.5,3.5s3.5-1.57,3.5-3.5S18.43,13,16.5,13z M16.5,18 c-0.83,0-1.5-0.67-1.5-1.5s0.67-1.5,1.5-1.5s1.5,0.67,1.5,1.5S17.33,18,16.5,18z M5.41,20L4,18.59L18.59,4L20,5.41L5.41,20z"/></g></g></g></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'position' => 4,
            'name' => 'Nálada',
            'code_name' => 'happiness',
            'unit' => 'CRi',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.7 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'position' => 5,
            'name' => 'Nespokojenost',
            'code_name' => 'level_happiness',
            'unit' => 'CRi',
            'positive_value' => 0,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-4.51 2.11l.26 2.79-2.74.62-1.43 2.41L12 18.82l-2.58 1.11-1.43-2.41-2.74-.62.26-2.8L3.66 12l1.85-2.12-.26-2.78 2.74-.61 1.43-2.41L12 5.18l2.58-1.11 1.43 2.41 2.74.62-.26 2.79L20.34 12l-1.85 2.11zM11 15h2v2h-2zm0-8h2v6h-2z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'position' => 6,
            'name' => 'Délka života',
            'code_name' => 'health',
            'unit' => 'let',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/></svg>',
        ]);

        DB::table('statistics_types')->insert([
            'position' => 7,
            'name' => 'Znečištění',
            'code_name' => 'gasses',
            'unit' => 'CRi',
            'positive_value' => 0,
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="16" height="16" fill="currentColor" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd" viewBox="0 0 81 59.28">    <defs>        <style>.fil2{fill:#fefefe}</style>    </defs>    <g id="Layer_x0020_1">        <g id="_2357101684704">            <path style="fill:none" d="M73.67.03v60.96H1.78V.03z" />            <path class="" d="M37.72 15.95c7.85 0 14.62 5.57 16.15 13.26l.9 4.5 4.58.33c4.67.3 8.32 4.22 8.32 8.86 0 4.95-4.04 8.99-8.98 8.99H19.75c-6.62 0-11.98-5.36-11.98-11.98 0-6.14 4.58-11.26 10.66-11.89l3.21-.33 1.5-2.85c2.84-5.48 8.41-8.89 14.58-8.89zm0-5.99c-8.65 0-16.17 4.91-19.92 12.1-9.01.96-16.02 8.59-16.02 17.85 0 9.91 8.06 17.97 17.97 17.97h38.94c8.26 0 14.98-6.71 14.98-14.98 0-7.9-6.15-14.31-13.93-14.85C57.7 17.71 48.62 9.96 37.72 9.96z" />        </g>        <path class="" d="M54.96 37.1c-.37-1.36 1.06-4.18 1.63-5.44.86-.19.66.01 1.1.01.67-.01.02-.17 1.14-.08.6.72.83 1.7 1.18 2.55.41 1.03 1.19 2.37.43 3.04-1.46.88-1.95-.48-2.77-1-.68.81-1.19 1.58-2.71.92zM42.82 23.42c-.54-4.16.83-8.11 5.45-6.71 7.93 2.41 11.33 13.17 1.69 12.67-4.2-.22-6.64-2.11-7.14-5.96zm29.88.23c-1.17 7.29-10.77 6.62-12.27 4-.84-1.47-.8-3.72-.04-5.24 3.15-6.28 14.09-9.83 12.31 1.24zm-5.85 13.14c3.05.29 4.33.76 7.45-.48 7.32-2.91 6.08-13.63 4-19.29-7.21-19.75-34.09-19.66-41.1.17-1.49 4.21-2.31 10.85-.38 14.93.94 1.99 2.37 3.42 4.6 4.28 3 1.15 4.29.68 7.3.39.18 2.86-.72 8.34 1.04 9.93 1.86 1.68 3.29.09 4.12.18.62.06.87.65 2.13.55.93-.07 1.31-.58 1.84-.54.55.04.93.63 2.13.55 1.13-.08 1.28-.68 2-.54 1.38.26 2.36 1.29 3.94-.31 1.61-1.63.75-7.06.93-9.82z" />        <path class="fil2" d="M42.82 23.42c.5 3.85 2.94 5.74 7.14 5.96 9.64.5 6.24-10.26-1.69-12.67-4.62-1.4-5.99 2.55-5.45 6.71zM60.39 22.41c-.76 1.52-.8 3.77.04 5.24 1.5 2.62 11.1 3.29 12.27-4 1.78-11.07-9.16-7.53-12.31-1.24zM60.01 34.14c-.35-.85-.58-1.83-1.18-2.55-1.12-.09-.47.07-1.14.08-.44 0-.24-.2-1.1-.01-.57 1.26-2 4.08-1.63 5.44 1.52.66 2.03-.11 2.71-.92.82.52 1.31 1.88 2.77 1 .76-.66-.02-2.01-.43-3.04z" />    </g></svg>',
        ]);





        //Nation statistic values templates

        // SET 1 - Euronia

        // Economics / Ekonomika

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 1,
            'index' => 10,
            'value' => 10,
        ]);


        // Economy level / LE Level ekonomiky / Kupni sila

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 1,
            'value' => 2,
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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 7,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 8,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 9,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 2,
            'index' => 10,
            'value' => 6,
        ]);


        // Tax / Dane

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 3,
            'index' => 10,
            'value' => 10,
        ]);


        // Happiness / Nalada

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 6,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 7,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 8,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 9,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 4,
            'index' => 10,
            'value' => 9,
        ]);


        // Happiness level / LE Level nalady / Nespokojenost

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 6,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 7,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 9,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 5,
            'index' => 10,
            'value' => 0,
        ]);


        // Health / Zdravi / Delka zivota

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => 76,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => 79,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => 82,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 85,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 88,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 91,
        ]);


        // gasses / SP Sklenikove Plyny / Znecisteni

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => -7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => -5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => -3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 6,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 7,
            'value' => -1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 9,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 10,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 11,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 12,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 13,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 14,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 15,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 16,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 17,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 18,
            'value' => 10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 19,
            'value' => 11,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 1,
            'statistics_type_id' => 7,
            'index' => 20,
            'value' => 12,
        ]);


        // SET 2 - Aso-Tchin

        // Economics / Ekonomika

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
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 3,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 1,
            'index' => 10,
            'value' => 10,
        ]);


        // Economy level / LE Level ekonomiky / Kupni sila

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 7,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 8,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 9,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 2,
            'index' => 10,
            'value' => 6,
        ]);


        // Tax / Dane

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 3,
            'index' => 10,
            'value' => 10,
        ]);


        // Happiness / Nalada

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

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 6,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 7,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 8,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 9,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 4,
            'index' => 10,
            'value' => 9,
        ]);


        // Happiness level / LE Level nalady / Nespokojenost

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
            'value' => 2,
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
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 6,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 7,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 9,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 5,
            'index' => 10,
            'value' => 0,
        ]);


        // Health / Zdravi / Delka zivota

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => 76,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => 79,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => 82,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 85,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 88,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 91,
        ]);


        // gasses / SP Sklenikove Plyny / Znecisteni

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => -14,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => -12,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => -10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => -8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 6,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 7,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 9,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 10,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 11,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 12,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 13,
            'value' => 10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 14,
            'value' => 12,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 15,
            'value' => 14,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 16,
            'value' => 16,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 17,
            'value' => 18,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 18,
            'value' => 20,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 19,
            'value' => 22,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 2,
            'statistics_type_id' => 7,
            'index' => 20,
            'value' => 24,
        ]);


        // SET 3 - Unitica

        // Economics / Ekonomika

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 1,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 2,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 3,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 1,
            'index' => 10,
            'value' => 10,
        ]);


        // Economy level / LE Level ekonomiky / Kupni sila

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 5,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 7,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 8,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 9,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 2,
            'index' => 10,
            'value' => 6,
        ]);


        // Tax / Dane

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 1,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 3,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 4,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 3,
            'index' => 10,
            'value' => 10,
        ]);


        // Happiness / Nalada

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 1,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 2,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 5,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 6,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 7,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 8,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 9,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 4,
            'index' => 10,
            'value' => 9,
        ]);


        // Happiness level / LE Level nalady / Nespokojenost

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 4,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 5,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 6,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 7,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 8,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 9,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 5,
            'index' => 10,
            'value' => 0,
        ]);


        // Health / Zdravi / Delka zivota

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => 76,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => 79,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => 82,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 85,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 88,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 91,
        ]);


        // gasses / SP Sklenikove Plyny / Znecisteni

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => -7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => -5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => -3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 6,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 7,
            'value' => -1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 9,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 10,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 11,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 12,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 13,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 14,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 15,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 16,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 17,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 18,
            'value' => 10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 19,
            'value' => 11,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 3,
            'statistics_type_id' => 7,
            'index' => 20,
            'value' => 12,
        ]);


        // SET 4 - Surilos + Inselia

        // Economics / Ekonomika

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 1,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 2,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 3,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 1,
            'index' => 10,
            'value' => 10,
        ]);


        // Economy level / LE Level ekonomiky / Kupni sila

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 5,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 7,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 8,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 9,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 2,
            'index' => 10,
            'value' => 6,
        ]);


        // Tax / Dane

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 1,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 3,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 4,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 3,
            'index' => 10,
            'value' => 10,
        ]);


        // Happiness / Nalada

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 1,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 2,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 5,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 6,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 7,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 8,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 9,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 4,
            'index' => 10,
            'value' => 9,
        ]);


        // Happiness level / LE Level nalady / Nespokojenost

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 4,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 5,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 6,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 7,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 9,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 5,
            'index' => 10,
            'value' => 0,
        ]);


        // Health / Zdravi / Delka zivota

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => 76,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => 79,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => 82,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 85,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 88,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 91,
        ]);


        // gasses / SP Sklenikove Plyny / Znecisteni

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => -7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => -5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => -3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 6,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 7,
            'value' => -1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 9,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 10,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 11,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 12,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 13,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 14,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 15,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 16,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 17,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 18,
            'value' => 10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 19,
            'value' => 11,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 4,
            'statistics_type_id' => 7,
            'index' => 20,
            'value' => 12,
        ]);


        // SET 5 - (Inselia - nebude-li se Surilosem)

        // Economics / Ekonomika

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 1,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 2,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 3,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 1,
            'index' => 10,
            'value' => 10,
        ]);


        // Economy level / LE Level ekonomiky / Kupni sila

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 5,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 7,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 8,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 9,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 2,
            'index' => 10,
            'value' => 6,
        ]);


        // Tax / Dane

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 1,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 3,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 4,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 3,
            'index' => 10,
            'value' => 10,
        ]);


        // Happiness / Nalada

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 1,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 2,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 5,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 6,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 7,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 8,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 9,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 4,
            'index' => 10,
            'value' => 9,
        ]);


        // Happiness level / LE Level nalady / Nespokojenost

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 4,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 5,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 6,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 7,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 9,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 5,
            'index' => 10,
            'value' => 0,
        ]);


        // Health / Zdravi / Delka zivota

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => 76,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => 79,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => 82,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 85,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 88,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 91,
        ]);


        // gasses / SP Sklenikove Plyny / Znecisteni

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => -7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => -5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => -3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 6,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 7,
            'value' => -1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 9,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 10,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 11,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 12,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 13,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 14,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 15,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 16,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 17,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 18,
            'value' => 10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 19,
            'value' => 11,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 5,
            'statistics_type_id' => 7,
            'index' => 20,
            'value' => 12,
        ]);


        // SET 6 - Minerawe

        // Economics / Ekonomika

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 1,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 2,
            'value' => 2,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 3,
            'value' => 3,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 4,
            'value' => 4,

        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 1,
            'index' => 10,
            'value' => 10,
        ]);


        // Economy level / LE Level ekonomiky / Kupni sila

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 5,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 6,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 7,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 8,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 9,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 2,
            'index' => 10,
            'value' => 6,
        ]);


        // Tax / Dane

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 1,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 3,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 4,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 5,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 6,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 7,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 8,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 9,
            'value' => 9,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 3,
            'index' => 10,
            'value' => 10,
        ]);


        // Happiness / Nalada

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 1,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 2,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 4,
            'value' => 3,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 5,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 6,
            'value' => 5,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 7,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 8,
            'value' => 7,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 9,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 4,
            'index' => 10,
            'value' => 9,
        ]);


        // Happiness level / LE Level nalady / Nespokojenost

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 1,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 2,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 3,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 4,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 5,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 6,
            'value' => 1,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 7,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 9,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 5,
            'index' => 10,
            'value' => 0,
        ]);


        // Health / Zdravi / Delka zivota

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 1,
            'value' => 58,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 2,
            'value' => 61,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 3,
            'value' => 64,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 4,
            'value' => 67,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 5,
            'value' => 70,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 6,
            'value' => 73,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 7,
            'value' => 76,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 8,
            'value' => 79,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 9,
            'value' => 82,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 6,
            'index' => 10,
            'value' => 85,
        ]);


        // gasses / SP Sklenikove Plyny / Znecisteni

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 1,
            'value' => -14,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 2,
            'value' => -12,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 3,
            'value' => -10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 4,
            'value' => -8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 5,
            'value' => -6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 6,
            'value' => -4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 7,
            'value' => -2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 8,
            'value' => 0,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 9,
            'value' => 2,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 10,
            'value' => 4,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 11,
            'value' => 6,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 12,
            'value' => 8,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 13,
            'value' => 10,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 14,
            'value' => 12,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 15,
            'value' => 14,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 16,
            'value' => 16,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 17,
            'value' => 18,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 18,
            'value' => 20,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 19,
            'value' => 22,
        ]);

        DB::table('nation_statistic_values_templates')->insert([
            'set' => 6,
            'statistics_type_id' => 7,
            'index' => 20,
            'value' => 24,
        ]);



        //Nations template

        DB::table('nations_templates')->insert([
            'id' => 1,
            'name' => 'Euronia',
            'statistic_values_set' => 1,
        ]);

        DB::table('nations_templates')->insert([
            'id' => 2,
            'name' => 'Aso-chin',
            'statistic_values_set' => 2,
        ]);

        DB::table('nations_templates')->insert([
            'id' => 3,
            'name' => 'Unitica',
            'statistic_values_set' => 3,
        ]);

        DB::table('nations_templates')->insert([
            'id' => 4,
            'name' => 'Surilos',
            'statistic_values_set' => 4,
        ]);

        DB::table('nations_templates')->insert([
            'id' => 5,
            'name' => 'Inselia',
            'statistic_values_set' => 4,
        ]);

        DB::table('nations_templates')->insert([
            'id' => 6,
            'name' => 'Minerawe',
            'statistic_values_set' => 6,
        ]);


        // Start to nation statistics / Pocatecni hodnoty statu

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 1,
            'index' => 4,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 2,
            'index' => 4,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 3,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 4,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 5,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 6,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 1,
            'statistic_type_id' => 7,
            'index' => 13,
        ]);

        // nation --- 2

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 1,
            'index' => 3,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 2,
            'index' => 3,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 3,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 4,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 5,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 6,
            'index' => 4,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 2,
            'statistic_type_id' => 7,
            'index' => 12,
        ]);

        //nation --- 3

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 1,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 2,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 3,
            'index' => 4,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 4,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 5,
            'index' => 5,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 6,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 3,
            'statistic_type_id' => 7,
            'index' => 16,
        ]);


        //nation --- 4

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 1,
            'index' => 3,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 2,
            'index' => 3,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 3,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 4,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 5,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 6,
            'index' => 3,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 4,
            'statistic_type_id' => 7,
            'index' => 12,
        ]);


        //nation --- 5

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 1,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 2,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 3,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 4,
            'index' => 7,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 5,
            'index' => 7,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 6,
            'index' => 4,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 5,
            'statistic_type_id' => 7,
            'index' => 10,
        ]);


        //nation --- 6

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 1,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 2,
            'index' => 2,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 3,
            'index' => 6,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 4,
            'index' => 7,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 5,
            'index' => 7,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 6,
            'index' => 3,
        ]);

        DB::table('start_to_nation_statistics')->insert([
            'nation_template_id' => 6,
            'statistic_type_id' => 7,
            'index' => 10,
        ]);

        // Technologické směry
        /*
         *
        1 Nezařazeno - Opravné a doplňkové technologie
        2 Vodíková technologie
        3 Autonomní řízení
        4 Umělá inteligence
        5 Cirkulární ekonomika
        6 Termovize
        7 Virtuální realita
        8 Nanotechnologie
        9 Vesmírné technologie
        10 Čistější zdroje a úspora energie

        */

        DB::table('branches')->insert([
            'id' => '1',
            'name' => 'Nezařazeno',
            'code' => 'nothing',
            'color' => 'aaaead',
        ]);

        DB::table('branches')->insert([
            'id' => '2',
            'name' => 'Vodíková technologie',
            'code' => 'hydrogen',
            'color' => '209be1',
        ]);

        DB::table('branches')->insert([
            'id' => '3',
            'name' => 'Autonomní řízení',
            'code' => 'autodrive',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '4',
            'name' => 'Umělá inteligence',
            'code' => 'ai',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '5',
            'name' => 'Cirkulární ekonomika',
            'code' => 'circular',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '6',
            'name' => 'Termovize',
            'code' => 'thermo',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '7',
            'name' => 'Virtuální realita',
            'code' => 'vr',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '8',
            'name' => 'Nanotechnologie',
            'code' => 'nano',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '9',
            'name' => 'Vesmírné technologie',
            'code' => 'space',
            'color' => 'ebc80c',
        ]);

        DB::table('branches')->insert([
            'id' => '10',
            'name' => 'Čistější zdroje a úspora energie',
            'code' => 'energy',
            'color' => 'ebc80c',
        ]);


        // Oblasti života, kde jsou technologie využívány
        /*
        1 Nezařazeno
        2 A (agriculture) - Zemědělství
        3 E (energetics) - Energetika ?a ekonomika
        4 T (transportation) - Doprava
        5 L (learning) - Vzdělávání, humanita, lidský přístup
        6 F (free time) - Zábava (entertainment)
        7 M (medicine) - Lékařství / Medicína
        */

        DB::table('areas')->insert([
            'id' => '1',
            'name' => 'Nezařazeno',
            'description' => 'Popisek k nezařazeno',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16"><path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Zemědělství',
            'description' => 'Popisek k zemědělství',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tree-fill" viewBox="0 0 16 16"><path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Energetika',
            'description' => 'Popisek k energetice',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-battery-charging" viewBox="0 0 16 16">  <path d="M9.585 2.568a.5.5 0 0 1 .226.58L8.677 6.832h1.99a.5.5 0 0 1 .364.843l-5.334 5.667a.5.5 0 0 1-.842-.49L5.99 9.167H4a.5.5 0 0 1-.364-.843l5.333-5.667a.5.5 0 0 1 .616-.09z"/>  <path d="M2 4h4.332l-.94 1H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h2.38l-.308 1H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z"/>  <path d="M2 6h2.45L2.908 7.639A1.5 1.5 0 0 0 3.313 10H2V6zm8.595-2-.308 1H12a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H9.276l-.942 1H12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.405z"/>  <path d="M12 10h-1.783l1.542-1.639c.097-.103.178-.218.241-.34V10zm0-3.354V6h-.646a1.5 1.5 0 0 1 .646.646zM16 8a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Doprava',
            'description' => 'Popisek k dopravě',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stoplights-fill" viewBox="0 0 16 16">  <path fill-rule="evenodd" d="M6 0a2 2 0 0 0-2 2H2c.167.5.8 1.6 2 2v2H2c.167.5.8 1.6 2 2v2H2c.167.5.8 1.6 2 2v1a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-1c1.2-.4 1.833-1.5 2-2h-2V8c1.2-.4 1.833-1.5 2-2h-2V4c1.2-.4 1.833-1.5 2-2h-2a2 2 0 0 0-2-2H6zm3.5 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM8 13a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Vzdělávání',
            'description' => 'Popisek k vzdělávání',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">  <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>  <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Zábava',
            'description' => 'Popisek k zábavě',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-controller" viewBox="0 0 16 16">  <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>  <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Lékařství',
            'description' => 'Popisek k lekářství',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 16 16">  <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Zm5.71-2.858a.5.5 0 1 0-.708.707.5.5 0 0 0 .707-.707ZM6.974 6.939a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707ZM5.56 8.354a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm2.828 2.828a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707Zm1.414-2.121a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.706-.708.5.5 0 0 0 .707.708Zm-4.242.707a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm1.414-2.122a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707ZM8.646 3.354l4 4 .708-.708-4-4-.708.708Zm-1.292 9.292-4-4-.708.708 4 4 .708-.708Z"/></svg>',
        ]);

        DB::table('areas')->insert([
            'name' => 'Lékařství',
            'description' => 'Popisek k lekářství',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bandaid-fill" viewBox="0 0 16 16">  <path d="m2.68 7.676 6.49-6.504a4 4 0 0 1 5.66 5.653l-1.477 1.529-5.006 5.006-1.523 1.472a4 4 0 0 1-5.653-5.66l.001-.002 1.505-1.492.001-.002Zm5.71-2.858a.5.5 0 1 0-.708.707.5.5 0 0 0 .707-.707ZM6.974 6.939a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707ZM5.56 8.354a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm2.828 2.828a.5.5 0 1 0-.707-.707.5.5 0 0 0 .707.707Zm1.414-2.121a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.706-.708.5.5 0 0 0 .707.708Zm-4.242.707a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707Zm1.414-.707a.5.5 0 1 0-.707-.708.5.5 0 0 0 .707.708Zm1.414-2.122a.5.5 0 1 0-.707.707.5.5 0 0 0 .707-.707ZM8.646 3.354l4 4 .708-.708-4-4-.708.708Zm-1.292 9.292-4-4-.708.708 4 4 .708-.708Z"/></svg>',
        ]);


        //Stav

        DB::table('nations_technologies_status')->insert([
            'name' => 'Koupit',
            'code' => 'new',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/></svg>',
        ]);

//        DB::table('nations_technologies_status')->insert([
//            'name' => 'Schvalování nákupu',
//            'code' => 'buy',
//            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/></svg>',
//        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Certifikovat',
            'code' => 'investment',
            'icon' => '',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Schvalování certifikace',
            'code' => 'certificate',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-exclamation" viewBox="0 0 16 16">  <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z"/>  <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/></svg>',
        ]);

        DB::table('nations_technologies_status')->insert([
            'name' => 'Aktivní',
            'code' => 'active',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill" viewBox="0 0 16 16">  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/></svg>',
        ]);



        // technologies = Jednotlivé technologie
        // technologies_statistics_types_changes = Technologické změny a upravy - co budou technologie upravovat

        DB::table('technologies')->insert([
            'id' => 2,
            'code' => 'T02',
            'name' => 'Daň z masa',
            'description' => '',
            'round_show' => 9,
            'price' => 0,
            'certificate' => 0,
            'visibility' => 0,

        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 2,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 3,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 4,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 2,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        DB::table('technologies')->insert([
            'id' => 3,
            'code' => 'T03',
            'name' => 'Zalesnění',
            'description' => '',
            'round_show' => 3,
            'price' => 24,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T03-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 3,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 3,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 3,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 3,
            'statistic_type_id' => 7,
            'index_move' => -3,
        ]);

        DB::table('technologies')->insert([
            'id' => 4,
            'code' => 'T04',
            'name' => 'Protipovodňová technologie',
            'description' => '',
            'round_show' => 2,
            'price' => 12,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T04-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 4,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 4,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 4,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 4,
            'code' => 'PZ',
            'name' => 'Protipovodňová technologie',
            'description' => 'Ochrana před povodněmi',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 5,
            'code' => 'T05',
            'name' => 'Mořské stěny',
            'description' => '',
            'round_show' => 2,
            'price' => 18,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T05-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 5,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 5,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 5,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 5,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 5,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 5,
            'code' => 'T',
            'name' => 'Mořské stěny',
            'description' => 'Ochrana před tsunami',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 6,
            'code' => 'T06',
            'name' => 'Zavlažovací systémy',
            'description' => '',
            'round_show' => 2,
            'price' => 11,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T06-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 6,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 6,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 6,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 6,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 6,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 6,
            'code' => 'S',
            'name' => 'Zavlažovací systémy',
            'description' => 'Ochrana před suchem',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 8,
            'code' => 'T08',
            'name' => 'Daň z vody',
            'description' => '',
            'round_show' => 5,
            'price' => 0,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T08-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 8,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 8,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 8,
            'statistic_type_id' => 3,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 8,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 8,
            'code' => 'S',
            'name' => 'Daň z vody',
            'description' => 'O 50 % snižuje dopady sucha',
            'coefficient' => 50,
        ]);


        DB::table('technologies')->insert([
            'id' => 9,
            'code' => 'T09',
            'name' => 'Mediální propagace snižování spotřeby',
            'description' => '',
            'round_show' => 5,
            'price' => 4,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T09-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 9,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 9,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 9,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 9,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 11,
            'code' => 'T11',
            'name' => 'Investice do obnovitelých zdrojů',
            'description' => '',
            'round_show' => 3,
            'price' => 10,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T11-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 11,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 11,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 11,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 11,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 11,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 13,
            'code' => 'T13',
            'name' => 'Investice do elektromobility',
            'description' => 'Popište, jaké zdroje energie lze v elektromobilitě využít. Z balíku 100 % investice rozhdodněte, kolika procenty byste který druh podpořili a proč.',
            'round_show' => 3,
            'price' => 18,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T13-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 13,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 2,
            'technology_id' => 13,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 13,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 13,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 13,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 15,
            'code' => 'T15',
            'name' => 'Vodíková fúze',
            'description' => '',
            'round_show' => 5,
            'price' => 38,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T15-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 15,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 15,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 15,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 15,
            'statistic_type_id' => 4,
            'index_move' => 2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 15,
            'statistic_type_id' => 7,
            'index_move' => -3,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 15,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 16,
            'code' => 'T16',
            'name' => 'Dotace na zateplování',
            'description' => '',
            'round_show' => 3,
            'price' => 16,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T16-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 16,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 16,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 16,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 16,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 16,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 17,
            'code' => 'T17',
            'name' => 'Zavedení odolnějších odrůd',
            'description' => '',
            'round_show' => 3,
            'price' => 6,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T17-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 17,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 17,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 17,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 17,
            'statistic_type_id' => 6,
            'index_move' => -1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 17,
            'code' => 'S/PZ/VZ/EZ',
            'name' => 'Zavedení odolnějších odrůd',
            'description' => 'O 50 % snižuje dopad sucha, povodní, poklesu zemědělských výnosů a epidemie v zemědělství',
            'coefficient' => 50,
        ]);


        DB::table('technologies')->insert([
            'id' => 18,
            'code' => 'T18',
            'name' => 'Recyklace Cradle2Cradle',
            'description' => '',
            'round_show' => 3,
            'price' => 3,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T18-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 18,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 18,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 18,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 18,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 19,
            'code' => 'T19',
            'name' => 'Vyléčení rakoviny',
            'description' => '',
            'round_show' => 5,
            'price' => 10,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T19-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 19,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 19,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 19,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 19,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 19,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 20,
            'code' => 'T20',
            'name' => 'Virtuální světy',
            'description' => '',
            'round_show' => 5,
            'price' => 5,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T20-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 6,
            'technology_id' => 20,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 7,
            'technology_id' => 20,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 20,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 20,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 21,
            'code' => 'T21',
            'name' => 'Zdravotní implantáty',
            'description' => '',
            'round_show' => 5,
            'price' => 15,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T21-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 21,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 21,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 21,
            'statistic_type_id' => 1,
            'index_move' => 2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 21,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 21,
            'statistic_type_id' => 7,
            'index_move' => 2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 21,
            'statistic_type_id' => 6,
            'index_move' => 2,
        ]);


        DB::table('technologies')->insert([
            'id' => 22,
            'code' => 'T22',
            'name' => 'Domácí 3D projekce',
            'description' => '',
            'round_show' => 3,
            'price' => 1,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T22-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 6,
            'technology_id' => 22,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 22,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 22,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 22,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 24,
            'code' => 'T24',
            'name' => 'Virtuální školství a úřady',
            'description' => '',
            'round_show' => 5,
            'price' => 10,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T24-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 5,
            'technology_id' => 24,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 7,
            'technology_id' => 24,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 24,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 24,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 24,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 25,
            'code' => 'T25',
            'name' => 'Technologie superlearningu',
            'description' => '',
            'round_show' => 2,
            'price' => 10,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T25-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 5,
            'technology_id' => 25,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 7,
            'technology_id' => 25,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 25,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 25,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 25,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 26,
            'code' => 'T26',
            'name' => 'Daň z ropy',
            'description' => '',
            'round_show' => 4,
            'price' => 0,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T26-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 26,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 26,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 26,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 26,
            'statistic_type_id' => 3,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 26,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 26,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 27,
            'code' => 'T27',
            'name' => 'Virtuální turistika',
            'description' => '',
            'round_show' => 3,
            'price' => 7,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T27-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 5,
            'technology_id' => 27,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 7,
            'technology_id' => 27,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 27,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 28,
            'code' => 'T28',
            'name' => 'Protipožární systémy',
            'description' => '',
            'round_show' => 4,
            'price' => 12,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T28-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 28,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 28,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 28,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 28,
            'code' => 'P',
            'name' => 'Protipožární systémy',
            'description' => 'Ochrana před požáry',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 29,
            'code' => 'T29',
            'name' => 'Zákaz cestování',
            'description' => '',
            'round_show' => 4,
            'price' => 0,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T29-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 4,
            'technology_id' => 29,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 29,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 29,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 29,
            'statistic_type_id' => 4,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 29,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);


        DB::table('technologies')->insert([
            'id' => 30,
            'code' => 'T30',
            'name' => 'Monitoring vzniku požáru',
            'description' => '',
            'round_show' => 2,
            'price' => 12,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T30-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 1,
            'technology_id' => 30,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 30,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 30,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 30,
            'code' => 'P',
            'name' => 'Monitoring vzniku požáru',
            'description' => 'Ochrana před požáry',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 31,
            'code' => 'T31',
            'name' => 'Vodíková energetika',
            'description' => '',
            'round_show' => 4,
            'price' => 19,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T31-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 31,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 2,
            'technology_id' => 31,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 31,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 31,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 31,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 32,
            'code' => 'T32',
            'name' => 'Pouštní solární elektřina',
            'description' => '',
            'round_show' => 4,
            'price' => 15,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T32-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 32,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 32,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 32,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 32,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 34,
            'code' => 'T34',
            'name' => 'Odstavení uhelných elektráren',
            'description' => '',
            'round_show' => 2,
            'price' => 8,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T34-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 34,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 34,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 34,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 34,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 34,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 35,
            'code' => 'T35',
            'name' => 'Zadržování vody v krajině',
            'description' => '',
            'round_show' => 4,
            'price' => 11,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T35-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 2,
            'technology_id' => 35,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 35,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 35,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 35,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 35,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 35,
            'code' => 'S/PZ',
            'name' => 'Zadržování vody v krajině',
            'description' => 'Ochrana před suchem a záplavami/povodněmi',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 37,
            'code' => 'T37',
            'name' => 'Městské zóny bez aut',
            'description' => '',
            'round_show' => 3,
            'price' => 4,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T37-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 4,
            'technology_id' => 37,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 37,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 37,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 37,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 38,
            'code' => 'T38',
            'name' => 'MHD zdarma',
            'description' => '',
            'round_show' => 2,
            'price' => 7,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T38-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 4,
            'technology_id' => 38,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 38,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 38,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 38,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 38,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 39,
            'code' => 'T39',
            'name' => 'Nanotechnologie',
            'description' => '',
            'round_show' => 2,
            'price' => 2,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T39-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 1,
            'technology_id' => 39,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 8,
            'technology_id' => 39,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 39,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 39,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 40,
            'code' => 'T40',
            'name' => 'Vesmírná elektrárna',
            'description' => '',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T40-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 40,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 9,
            'technology_id' => 40,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 40,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 40,
            'statistic_type_id' => 3,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 40,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 40,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 40,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 41,
            'code' => 'T41',
            'name' => 'Těžba surovin ve vesmíru',
            'description' => '',
            'round_show' => 5,
            'price' => 8,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T41-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 41,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 9,
            'technology_id' => 41,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 41,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 43,
            'code' => 'T43',
            'name' => 'Daň z letecké dopravy',
            'description' => '',
            'round_show' => 3,
            'price' => 0,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T43-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 43,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 43,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 43,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 43,
            'statistic_type_id' => 3,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 43,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 43,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 45,
            'code' => 'T45',
            'name' => 'Vodíkový pohon',
            'description' => '',
            'round_show' => 2,
            'price' => 18,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T45-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 45,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 2,
            'technology_id' => 45,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 45,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 45,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 45,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 46,
            'code' => 'T46',
            'name' => 'Autonomní řízení vozidel',
            'description' => '',
            'round_show' => 2,
            'price' => 7,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T46-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 4,
            'technology_id' => 46,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 3,
            'technology_id' => 46,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 46,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 46,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 46,
            'statistic_type_id' => 7,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 47,
            'code' => 'T47',
            'name' => 'Podpora rozvoje AI',
            'description' => '',
            'round_show' => 2,
            'price' => 13,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T47-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 47,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 4,
            'technology_id' => 47,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 47,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 47,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 48,
            'code' => 'T48',
            'name' => 'Sdílená ekonomika',
            'description' => 'Společné používání jedné věci. Já i soused potřebujeme používat auto, ale ani jeden z nás nepotřebujeme, aby to bylo jeho vlastní auto. A stejně to může fungovat i mezi státy. Sdílet lze například výrobu elektřiny, výrobu aut a jejich součástek, bydlení atd.',
            'round_show' => 2,
            'price' => 3,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T48-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 48,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 48,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 48,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 48,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 49,
            'code' => 'T49',
            'name' => 'Vesmírné technologie',
            'description' => '',
            'round_show' => 2,
            'price' => 14,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T49-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 49,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 9,
            'technology_id' => 49,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 49,
            'statistic_type_id' => 1,
            'index_move' => 2,
        ]);


        DB::table('technologies')->insert([
            'id' => 50,
            'code' => 'T50',
            'name' => 'Autonomní vodíková vozidla',
            'description' => '',
            'round_show' => 4,
            'price' => 14,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 50,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 2,
            'technology_id' => 50,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 50,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 50,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 51,
            'code' => 'T51',
            'name' => 'Ekodesign produktů',
            'description' => 'Ekodesign: začíná se již od návrhu produktu tak, aby měl minimální dopad na životní prostředí (nebo rovnou dopad pozitivní). Například takové výrobky, které se po vyhození celé rozloží a nic po nich nezbude.',
            'round_show' => 3,
            'price' => 13,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T51-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 51,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 51,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 51,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 51,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 52,
            'code' => 'T52',
            'name' => 'Zpracování vyhořelého jaderného paliva',
            'description' => '',
            'round_show' => 4,
            'price' => 5,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T52-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 52,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 52,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 52,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 52,
            'statistic_type_id' => 4,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 53,
            'code' => 'T53',
            'name' => 'Výroba dle 3R principů',
            'description' => 'Snížit množství odpadů tím, že věci využijeme znovu nebo jinak (z anglického reduce - reuse - recycle).',
            'round_show' => 5,
            'price' => 7,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T53-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 53,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 53,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 53,
            'statistic_type_id' => 1,
            'index_move' => -1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 53,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 53,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);


        DB::table('technologies')->insert([
            'id' => 54,
            'code' => 'T54',
            'name' => 'Biomimikry ve stavitelství',
            'description' => 'Využívání principů, které běžně fungují v přírodě, ve stavitelství. Inspirovat se můžeme třeba u kaktusů, některé z nich rostou tak, aby jejich horní části vrhaly stín na spodek rostliny a tím ji ochlazovaly.',
            'round_show' => 4,
            'price' => 12,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T54-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 54,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 54,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 54,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 54,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 55,
            'code' => 'T55',
            'name' => 'Termovize',
            'description' => '',
            'round_show' => 2,
            'price' => 11,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T55-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 55,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 55,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 55,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 55,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 58,
            'code' => 'T58',
            'name' => 'Projektový den Climate rules',
            'description' => 'Zjisti základní informace o tomto projektu.',
            'round_show' => 1,
            'price' => 5,
            'certificate' => 1,
            'img_url' => '/Img/technology-img/T58-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 5,
            'technology_id' => 58,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 58,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 58,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 59,
            'code' => 'T59',
            'name' => 'Inovace ve vzdělávání',
            'description' => '',
            'round_show' => 1,
            'price' => 12,
            'certificate' => 0,
            'img_url' => '/Img/technology-img/T59-img.jpg',
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 5,
            'technology_id' => 59,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 1,
            'technology_id' => 59,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 59,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 59,
            'statistic_type_id' => 7,
            'index_move' => -1,
        ]);

        // je speciální technologie - koeficient v proc?
        DB::table('special_technologies')->insert([
            'technology_id' => 59,
            'code' => 'NV',
            'name' => 'Inovace ve vzdělávání',
            'description' => 'Ochrana před nízkou kvalitou vzdělávání',
            'coefficient' => 100,
        ]);


        DB::table('technologies')->insert([
            'id' => 81,
            'code' => 'T81',
            'name' => 'EAŘ - Autonomní osobní přeprava',
            'description' => 'Naprogramujte mBota tak, aby při zjištění překážky postupně zpomaloval a zastavil před ní. Bonus: Cítíte-li se na víc, zajistěte, aby se mBot při zjištění překážky pokusil ji objet a pokračovat ve stejném směru. Pokud se mu 4x za sebou nepodaří najít volný prostor pro pokračování v jízdě, zastaví se.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 81,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 3,
            'technology_id' => 81,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 81,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 81,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 81,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 82,
            'code' => 'T82',
            'name' => 'EAŘ - Autonomní dálková přeprava',
            'description' => 'Naučte autíčko Maqueen tak, aby rozpoznalo vámi určený objekt před sebou a následovalo jej.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 82,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 3,
            'technology_id' => 82,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 82,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 82,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 82,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);


        DB::table('technologies')->insert([
            'id' => 83,
            'code' => 'T83',
            'name' => 'EAI - Rozpoznávání obrazu',
            'description' => 'Připravte určování rostliných a živočišných druhů či potenciálních chorob rostlin na základě rozpoznání obrazu dle upřesnění TCA.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 1,
            'technology_id' => 83,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 4,
            'technology_id' => 83,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 83,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 83,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 83,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 84,
            'code' => 'T84',
            'name' => 'EAI - Rozpoznávání zvuku',
            'description' => 'Připravte experiment na rozpoznání zvuku pomocí teachable machine či jiné tecnologie dle upřesnění TCA.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 1,
            'technology_id' => 84,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 4,
            'technology_id' => 84,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 84,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 84,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 84,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);


        DB::table('technologies')->insert([
            'id' => 85,
            'code' => 'T85',
            'name' => 'EVT - Vodík v mobilitě',
            'description' => 'Sestavte experiment výroby vodíku pomocí elektrolýzy a následně generování elektrického proudu z vyrobeného vodíku pro pohyb elektromobilu.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 85,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 2,
            'technology_id' => 85,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 85,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 85,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 85,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 86,
            'code' => 'T86',
            'name' => 'EVT - Vodík v energetice',
            'description' => 'Sestavte experiment výroby vodíku pomocí elektrolýzy a následně generování elektrického proudu z vyrobeného vodíku pro provoz zařízení.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 86,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 2,
            'technology_id' => 86,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 86,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 86,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 86,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);


        DB::table('technologies')->insert([
            'id' => 87,
            'code' => 'T87',
            'name' => 'ECE - Ekologické náhrady',
            'description' => 'Navrhněte vhodné ekologické nahrazení produktů předaných či určených TCA.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 87,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 87,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 87,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 87,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 87,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 88,
            'code' => 'T88',
            'name' => 'ECE - Průmyslová symbióza',
            'description' => 'Navrhněte vhodné využití, aby generovaný odpad našel uplatnění jako zdroj v jiné výrobě, tj. aby to, co je pro jednu továrnu odpadem, bylo pro jinou továrnu výrobním materiálem.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 3,
            'technology_id' => 88,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 5,
            'technology_id' => 88,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 88,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 88,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 88,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);


        DB::table('technologies')->insert([
            'id' => 89,
            'code' => 'T89',
            'name' => 'ETV - Termovize a tkáně',
            'description' => 'Navrhněte vhodné řešení využití termovize v oblasti živých tkání a organismů.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 89,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 89,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 89,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 89,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 89,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 90,
            'code' => 'T90',
            'name' => 'ETV - Termovize a materiály',
            'description' => 'Navrhněte vhodné řešení využití termovize v oblasti materiálů.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 90,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 6,
            'technology_id' => 90,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 90,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 90,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 90,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);



        DB::table('technologies')->insert([
            'id' => 91,
            'code' => 'T91',
            'name' => 'EVR - Virtuální realita pro život',
            'description' => 'Navrhněte vhodné řešení využití virtuální reality v oblasti sociální a zlepšení kvality života.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 91,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 7,
            'technology_id' => 91,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 91,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 91,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 91,
            'statistic_type_id' => 6,
            'index_move' => 1,
        ]);


        DB::table('technologies')->insert([
            'id' => 92,
            'code' => 'T92',
            'name' => 'EVR - Virtuální realita pro ekonomiku',
            'description' => 'Navrhněte vhodné řešení využití virtuální reality v oblasti ekonomiky, hospodářství, byznysu.',
            'round_show' => 4,
            'price' => 20,
            'certificate' => 1,
        ]);

        DB::table('technologies_areas')->insert([
            'area_id' => 7,
            'technology_id' => 92,
        ]);

        DB::table('technologies_branches')->insert([
            'branch_id' => 7,
            'technology_id' => 92,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 92,
            'statistic_type_id' => 1,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 92,
            'statistic_type_id' => 4,
            'index_move' => 1,
        ]);

        DB::table('technologies_statistics_types_changes')->insert([
            'technology_id' => 92,
            'statistic_type_id' => 7,
            'index_move' => -2,
        ]);



        //Money trancastion types

        DB::table('money_transaction_types')->insert([
            'name' => 'Běžná platba',
            'code' => 'common_pay',
        ]);

        DB::table('money_transaction_types')->insert([
            'name' => 'Splátka dluhu',
            'code' => 'debt_pay',
        ]);

        DB::table('money_transaction_types')->insert([
            'name' => 'Půjčka',
            'code' => 'loan',
        ]);

        DB::table('money_transaction_types')->insert([
            'name' => 'Pokuta',
            'code' => 'penalty',
        ]);

        DB::table('money_transaction_types')->insert([
            'name' => 'Odměna',
            'code' => 'reward_pay',
        ]);

        DB::table('money_transaction_types')->insert([
            'name' => 'Nákup',
            'code' => 'buy_pay',
        ]);

        DB::table('money_transaction_types')->insert([
            'name' => 'Ostatní',
            'code' => 'other',
        ]);


    }
}
