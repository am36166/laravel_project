<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServicefinancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       DB::table('servicefinanciers')->insert([
           'nom' => 'Ahmed',
            'prenom' => 'Alami',
            'user_id'  => '2',
        ]);

    }
}
