<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoModel extends Model
{
    use HasFactory;
    protected $table = 'endereco';
    protected $fillable = [
        "tipo_logradouro_id",
        "cidade_id",
        "pessoa_id",
        "logradouro",
        "numero",
        "cep",
        "bairro"
    ];

    public function pessoa()
    {
        return $this->belongsTo(PessoaModel::class, 'pessoa_id');
    }
}
