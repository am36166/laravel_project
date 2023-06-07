<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant_declarevirement extends Model
{
    protected $table = 'etudiant_declarevirements' ;
    protected $fillable = [
        'num_vir',
        'cne'

    ];
    
    
    use HasFactory;
}
