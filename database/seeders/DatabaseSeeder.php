<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

   /*  DB::table('users')->insert([
          'username' => 'Responsable',
           'password' => Hash::make('responsable'),
             'role'     => '1',
      ]);
     */ 

     /*  DB::table('users')->insert([
           'username' => 'Servicefinancier',
           'password' => Hash::make('service123'),
           'role'     => '2',
        ]);
       */ 

     DB::table('users')->insert([
            'username' => 'Serviceinformatique',
            'password' => Hash::make('adminadmin'),
            'role'     => '3',
        ]);
    

       
        

        
    }
}
