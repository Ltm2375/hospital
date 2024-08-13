@extends('layout.plantilla')
@section('contenido')
<div class="container">
    @if (session('datos'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <h4 class="alert-heading">{{session('datos')}}</h4>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        // Cierra la alerta automáticamente después de 3 segundos (3000 ms)
        setTimeout(function() {
            $('.alert').alert('close');
        }, 1900);
    </script>
    @endif
    @if (session('datos2'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <h4 class="alert-heading">{{session('datos2')}}</h4>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        // Cierra la alerta automáticamente después de 3 segundos (3000 ms)
        setTimeout(function() {
            $('.alert').alert('close');
        }, 1900);
    </script>
    @endif

    <h1>Lista de pacientes <i class="fa-solid fa-hospital-user fa-fade fa-1xl" style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6; color: #588ee4;"></i></h1>

    <a href="{{ route('paciente.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Nuevo Registro</a>
    <nav class="navbar navbar-dark bg-dark float-right">
        <form class="form-inline my-2 my-lg-0 ">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="DNI" aria-label="Search" value="{{$buscarpor}}">
            <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    <table class="table shadow-lg p-3 mb-5 bg-body rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre y Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paciente as $itemPaciente)
            <tr class="{{ $itemPaciente->sexo == 'Masculino' ? 'masculino' : 'femenino' }}">
                <td>{{$itemPaciente->nombre . ' ' .$itemPaciente->apellidos}}</td>
                <td>{{$itemPaciente->dni}}</td>
                <td>{{$itemPaciente->telefono}}</td>
                <td><a href="{{ route('paciente.edit', $itemPaciente->dni )}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pencil"></i> Editar</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        .masculino {
            background-color: #2e58dd;
            color: white;
        }

        .femenino {
            background-color: pink;
            color: black;
        }
    </style>
</div>

@endsection