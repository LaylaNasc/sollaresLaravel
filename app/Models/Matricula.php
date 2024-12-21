<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'disciplina_id',
        'dataMatricula',
        'valorPago',
        'aluno_id',
        'periodo',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Pessoa::class, 'aluno_id');
    }
}
