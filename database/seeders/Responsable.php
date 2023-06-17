<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Responsable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
     /*   DB::table('responsablefilieres')->insert([
            'user_id' => 1 ,
            'nom_resp' => 'Moussaid',
             'prenom_resp' => 'Khalid',
         ]);
      */   
         DB::table('responsablefilieres')->insert([
            'user_id' => 15,
            'nom_resp' => 'Yassin',
             'prenom_resp' => 'Sadil',
         ]);

         DB::table('responsablefilieres')->insert([
            'user_id' => 16,
            'nom_resp' => 'taha',
             'prenom_resp' => 'Sadil',
         ]);
 
    }
}
