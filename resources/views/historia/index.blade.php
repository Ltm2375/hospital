@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Historia Clínica del Paciente</h1>

    <form method="GET" action="{{ route('historia.index') }}">
        <div class="form-group">
            <label for="dni">DNI del Paciente:</label>
            <input type="text" name="dni" id="dni" class="form-control" value="{{ request('dni') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    @if($paciente)
    <div class="mt-4">
        <h3>{{ $paciente->nombre }} {{ $paciente->apellidos }}</h3>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="sexo">Sexo:</label>
                <input type="text" class="form-control" value="{{ $paciente->sexo }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                <input type="text" class="form-control" value="{{ $paciente->fechaNacimiento }}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="estadoCivil">Estado Civil:</label>
                <input type="text" class="form-control" value="{{ $paciente->estadoCivil }}" readonly>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h3>Enfermedades del Paciente</h3>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Nombre de la Enfermedad</th>
                    <th>Tratamiento</th>
                    <th>Diagnóstico</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @if($historiaClinica)
                @foreach($historiaClinica->enfermedadesPacientes as $enfermedadPaciente)
                <tr>
                    <td>{{ $enfermedadPaciente->enfermedad->nombre }}</td>
                    <td>{{ $enfermedadPaciente->tratamiento }}</td>
                    <td>{{ $enfermedadPaciente->diagnostico }}</td>
                    <td>{{ $enfermedadPaciente->fecha }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">No se encontraron datos.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection