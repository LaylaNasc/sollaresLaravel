<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public function disciplinasOfertadas()
    {
        return $this->hasMany(Disciplina::class, 'professor_id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'aluno_id');
    }
}