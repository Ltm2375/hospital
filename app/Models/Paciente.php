<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public $timestamps=false;
    
    // Especifica el nombre de la tabla
    protected $table = 'paciente';

    // Especificar la clave primaria si no es 'id'
    protected $primaryKey = 'dni';
    
    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'sexo',
        'fechaNacimiento',
        'estadoCivil',
        'seguro',
        'correo',
        'telefono',
    ];
}
