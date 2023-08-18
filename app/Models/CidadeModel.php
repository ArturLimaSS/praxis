<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CidadeModel extends Model
{
    use HasFactory;


    protected $table = 'cidade';
    protected $fillable = [
        'id', 
        'nome'
    ];
}
