<?php
namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPacientes = Paciente::count();
        return view('dashboard', compact('totalPacientes'));
    }
}
