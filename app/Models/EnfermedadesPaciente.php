<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadesPaciente extends Model
{
    protected $table = 'enfermedadespaciente';
    protected $primaryKey = 'enfermedadPacID';
    public $timestamps = false;

    protected $fillable = [
        'enfermedadID',
        'tratamiento',
        'diagnostico',
        'fecha',
    ];

    public function enfermedad()
    {
        return $this->belongsTo(Enfermedad::class, 'enfermedadID');
    }
}
