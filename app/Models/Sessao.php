<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;

    protected $table = 'sessoes';

    protected $fillable = [
        'plano_id',
        'data_hora_inicio',
        'data_hora_fim',
        'observacao',
        'status',
    ];

    // Relacionamento com PlanoAcompanhamento
    public function plano()
    {
        return $this->belongsTo(PlanoAcompanhamento::class, 'plano_id');
    }
}
