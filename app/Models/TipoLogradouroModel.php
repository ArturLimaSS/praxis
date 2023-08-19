<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLogradouroModel extends Model
{
    use HasFactory;

    protected $table = 'tipo_logradouro';

    protected $fillable = [
        'id', 
        'nome'
    ];
}
