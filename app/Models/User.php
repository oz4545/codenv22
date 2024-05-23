<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'contraseña',
        'foto_perfil',
        'nick',
        'puntaje',
    ];

    public function forms()
    {
        return $this->hasMany(Form::class, 'usuario_id');
    }

    public function levels()
    {
        return $this->hasMany(Level::class, 'usuario_id');
    }

    public function userAnswers()
    {
        return $this->hasMany(userAnswers::class, 'usuario_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'usuario_id');
    }

    public function rankings()
    {
        return $this->hasOne(Ranking::class, 'usuario_id');
    }
}
