<?php
namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\EnfermedadesPaciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPacientes = Paciente::count();

        // Obtener la enfermedad que más se repite
        $enfermedadMasComun = EnfermedadesPaciente::select('enfermedadID', DB::raw('count(*) as total'))
            ->groupBy('enfermedadID')
            ->orderByDesc('total')
            ->first();

        $nombreEnfermedadMasComun = null;

        if ($enfermedadMasComun) {
            // Obtener el nombre de la enfermedad
            $nombreEnfermedadMasComun = $enfermedadMasComun->enfermedad->nombre;
        }

        return view('dashboard', compact('totalPacientes', 'nombreEnfermedadMasComun'));
    }
}
