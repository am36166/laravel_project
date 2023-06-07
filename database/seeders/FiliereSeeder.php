<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('filieres')->insert([
           'nom_fil' => 'SMI' ,
            'id_resp' => '2',
            'montant_form'=>'25000',
         ]);
    }
}
