<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intervenant extends Model
{

    protected $table = 'intervenants' ;
    protected $primaryKey = 'id_interv' ;
    protected $fillable = [
        'nom_en',
        'prenom_e'
    ];
    use HasFactory;
}
