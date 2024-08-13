<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $paciente=Paciente::where('dni','like','%'.$buscarpor.'%')->get();
        return view('paciente.index', compact('paciente','buscarpor'));
    }

    
    public function create()
    {
        return view('paciente.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'dni' => 'required|digits:8|unique:paciente,dni',  // El DNI debe ser único y tener 8 dígitos
            'nombre' => 'required|string|max:30',
            'apellidos' => 'required|string|max:255',
            'sexo' => 'required|in:Masculino,Femenino',  // Sexo debe ser 'Masculino' o 'Femenino'
            'fechaNacimiento' => 'required|date|before:today',  // Debe ser una fecha válida antes de hoy
            'estadoCivil' => 'required|string|max:255',
            'seguro' => 'nullable|string|max:255',
            'correo' => 'required|email|max:255|unique:paciente,correo',  // Correo debe ser único
            'telefono' => 'nullable|digits:9',  // Teléfono opcional, con longitud 9
        ],
        [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'El DNI ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 255 caracteres.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser una cadena de texto.',
            'apellidos.max' => 'Los apellidos no deben exceder los 255 caracteres.',
            'sexo.required' => 'El sexo es obligatorio.',
            'sexo.in' => 'El sexo debe ser Masculino o Femenino.',
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fechaNacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fechaNacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'estadoCivil.required' => 'El estado civil es obligatorio.',
            'estadoCivil.string' => 'El estado civil debe ser una cadena de texto.',
            'estadoCivil.max' => 'El estado civil no debe exceder los 255 caracteres.',
            'seguro.string' => 'El seguro debe ser una cadena de texto.',
            'seguro.max' => 'El seguro no debe exceder los 255 caracteres.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo debe ser una dirección de correo válida.',
            'correo.max' => 'El correo no debe exceder los 255 caracteres.',
            'correo.unique' => 'El correo ya está registrado.',
            'telefono.digits' => 'El teléfono debe tener 9 dígitos.',
        ]);
    
        $paciente=new Paciente();
        $paciente->dni=$request->dni;
        $paciente->nombre=$request->nombre;
        $paciente->apellidos=$request->apellidos;
        $paciente->sexo=$request->sexo;
        $paciente->fechaNacimiento=$request->fechaNacimiento;
        $paciente->estadoCivil=$request->estadoCivil;
        $paciente->seguro=$request->seguro;
        $paciente->correo=$request->correo;
        $paciente->telefono=$request->telefono;
        $paciente->save();
        return redirect()->route('paciente.index')->with('datos', 'Paciente registrado...!');
    }

    
    public function show($dni)
    {
        $paciente = Paciente::where('dni', $dni)->first();

        if ($paciente) {
            return response()->json($paciente);
        }

        return response()->json(null, 404);
    }

    
    public function edit($id)
    {
        $paciente=Paciente::findOrFail($id);
        return view('paciente.edit', compact('paciente'));
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'dni' => 'required|digits:8',  // El DNI debe ser obligatorio y tener 8 dígitos
            'nombre' => 'required|string|max:30',
            'apellidos' => 'required|string|max:255',
            'sexo' => 'required|in:Masculino,Femenino',  // Sexo debe ser 'Masculino' o 'Femenino'
            'fechaNacimiento' => 'required|date|before:today',  // Debe ser una fecha válida antes de hoy
            'estadoCivil' => 'required|string|max:255',
            'seguro' => 'nullable|string|max:255',
            'correo' => 'required|email|max:255',  // Correo debe ser único
            'telefono' => 'nullable|digits:9',  // Teléfono opcional, con longitud 9
        ],
        [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 255 caracteres.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser una cadena de texto.',
            'apellidos.max' => 'Los apellidos no deben exceder los 255 caracteres.',
            'sexo.required' => 'El sexo es obligatorio.',
            'sexo.in' => 'El sexo debe ser Masculino o Femenino.',
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fechaNacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'fechaNacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'estadoCivil.required' => 'El estado civil es obligatorio.',
            'estadoCivil.string' => 'El estado civil debe ser una cadena de texto.',
            'estadoCivil.max' => 'El estado civil no debe exceder los 255 caracteres.',
            'seguro.string' => 'El seguro debe ser una cadena de texto.',
            'seguro.max' => 'El seguro no debe exceder los 255 caracteres.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo debe ser una dirección de correo válida.',
            'correo.max' => 'El correo no debe exceder los 255 caracteres.',
            'telefono.digits' => 'El teléfono debe tener 9 dígitos.',
        ]);
    
        $paciente=Paciente::findOrFail($id);
        $paciente->dni=$request->dni;
        $paciente->nombre=$request->nombre;
        $paciente->apellidos=$request->apellidos;
        $paciente->sexo=$request->sexo;
        $paciente->fechaNacimiento=$request->fechaNacimiento;
        $paciente->estadoCivil=$request->estadoCivil;
        $paciente->seguro=$request->seguro;
        $paciente->correo=$request->correo;
        $paciente->telefono=$request->telefono;
        $paciente->save();
        return redirect()->route('paciente.index')->with('datos', 'Registro actualizado...!');
    }

    public function destroy($id)
    {
        //
    }
}
