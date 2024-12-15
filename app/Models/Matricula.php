<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Pessoa::class, 'aluno_id');
    }
}
