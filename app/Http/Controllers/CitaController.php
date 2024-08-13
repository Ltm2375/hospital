<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');
        $cita=Cita::where('dni','like','%'.$buscarpor.'%')->get();
        return view('cita.index', compact('cita','buscarpor'));
    }


    public function create()
    {
        return view('cita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'dni' => 'required|digits:8',  // El DNI debe ser obligatorio y tener 8 dígitos
        ],
        [
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
        ]);

        $cita=new Cita();
        $cita->dni=$request->dni;
        $cita->fecha=$request->fecha;
        $cita->hora=$request->hora;
        $cita->motivo=$request->motivo;
        $cita->estado="Programada";
        $cita->doctor=$request->doctor;
        $cita->especialidad=$request->especialidad;
        $cita->save();
        return redirect()->route('cita.index')->with('datos3', 'Cita registrada...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
