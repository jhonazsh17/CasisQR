<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "registro";

    protected $fillable = ['nombres','dni','estado_asistencia','foto_in','foto_out','exit_at'];
}
