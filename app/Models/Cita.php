<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Especifica el nombre de la tabla
    protected $table = 'cita';

    // Especificar la clave primaria
    protected $primaryKey = 'citaID';

    protected $fillable = [
        'fecha',
        'hora',
        'motivo',
        'estado',
        'doctor',
        'especialidad',
        'dni',
    ];

    // Relación con el modelo Paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'dni', 'dni');
    }
}

