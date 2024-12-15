<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    public function professor()
    {
        return $this->belongsTo(Pessoa::class, 'professor_id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
