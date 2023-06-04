<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth ;

use Illuminate\Http\Request;

class logincon extends Controller
{
    //
    public function login(Request $request){
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){ 

            $user_role=Auth::user()->role;
            
            switch ($user_role) {
                case 0: return redirect('/etudiantpage');
                break;

                case 1: return redirect('/responsableFil');
                break;

                case 2: return redirect('/servicefin');
                break;

                case 3: return redirect('/serviceinf');
                break;

            }
        }  
        
        return back()->with('Erreurs','Nom Utilisateur ou Mot de passe Incorrecte');
          
    }

    public function logout(){
                      
        if (Auth::check())  Auth::logout();
      
      return redirect()->route('login');
    
    }

}

