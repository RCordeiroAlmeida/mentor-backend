<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'data_nascimento',
        'nome_pai',
        'nome_mae',
        'email',
        'telefone',
        'endereco',
        'cpf',
    ];
}
