<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    public $timestamps = false;

    // Especifica el nombre de la tabla
    protected $table = 'historiaclinica';
    // Especificar la clave primaria
    protected $primaryKey = 'historiaClinicaID';

    protected $fillable = [
        'dni',
    ];

    public function enfermedadesPacientes()
    {
        return $this->hasMany(EnfermedadesPaciente::class, 'historiaClinicaID', 'historiaClinicaID');
    }
}
