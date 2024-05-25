<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turnos extends Model
{
    use HasFactory;

    protected $fillable = ['cedula', 'estado', 'nombre', 'tipo', 'factura', 'medicamento'];
}
