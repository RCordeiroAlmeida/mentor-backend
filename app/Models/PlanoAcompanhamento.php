<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoAcompanhamento extends Model
{

    use HasFactory;

    protected $table = 'plano_acompanhamento';

    protected $fillable =[
        'paciente_id',
        'profissional_id',
        'data_inicio',
        'queixa_inicial',
        'status'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function profissional(){
        return $this->belongsTo(Profissional::class);
    }

    public function sessoes(){
        return $this->hasMany(Sessao::class, 'plano_id');
    }

}
