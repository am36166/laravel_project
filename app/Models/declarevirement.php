<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class declarevirement extends Model
{
    
    protected $table = 'declarevirements' ;
    protected $primaryKey = 'id' ;
    protected $fillable = [
        'num_vir',
        'type_vir',
        'montant',
        'type_paiement',
        'date_vir',
        'num_facilite'
    ];
    
    use HasFactory;
}
