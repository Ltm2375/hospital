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
    @if (session('datos3'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <h4 class="alert-heading">{{session('datos3')}}</h4>

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

    <h1>Lista de citas <i class="fa-solid fa-id-card-clip fa-bounce" style=" --fa-animation-duration: 2s; --fa-fade-opacity: 0.6; color: #e0563e;"></i></h1>

    <a href="{{ route('cita.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Nueva Cita</a>
    <nav class="navbar navbar-dark bg-dark float-right">
        <form class="form-inline my-2 my-lg-0 ">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="DNI" aria-label="Search" value="{{$buscarpor}}">
            <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    <table class="table shadow-lg p-3 mb-5 bg-body rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Motivo</th>
                <th scope="col">Estado</th>
                <th scope="col">Doctor</th>
                <th scope="col">Especialidad</th>
                <th scope="col">DNI</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cita as $itemCita)
            <tr >
                <td>{{$itemCita->citaID}}</td>
                <td>{{$itemCita->fecha}}</td>
                <td>{{$itemCita->hora}}</td>
                <td>{{$itemCita->motivo}}</td>
                <td>{{$itemCita->estado}}</td>
                <td>{{$itemCita->doctor}}</td>
                <td>{{$itemCita->especialidad}}</td>
                <td>{{$itemCita->dni}}</td>
                <td><a href="{{ route('cita.edit', $itemCita->dni )}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pencil"></i> Editar</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>

@endsection