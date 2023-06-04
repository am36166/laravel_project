<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants' ;
    protected $primaryKey = 'id' ;
    protected $fillable = [
        'cne' ,
        'nom_e',
        'prenom_e' ,
        'telephone' ,
        'adresse' ,
        'date_naissance',
        'urlimg' ,
        'user_id' ,
        'filiere_id' 
    ];
    
    public function user(){
        return $this->belongsTo(User::class) ;
    }

    public function virements(){
        return $this->hasMany(etudiant_declarevirement::class,'cne','cne');
    }
    use HasFactory;
}
