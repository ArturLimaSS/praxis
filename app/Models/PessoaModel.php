<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaModel extends Model
{
    use HasFactory;

    protected $table = "pessoa";

    protected $fillable = [
        "id",
        "nome",
        "idade",
        "email",
        "sexo",
        "senha"
    ];

    public function enderecos()
    {
        return $this->hasMany(EnderecoModel::class, 'pessoa_id');
    }
}
