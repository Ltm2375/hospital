@extends('layout.plantilla')

@section('contenido')
<div class="container">
    <h1>Dashboard</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pacientes Registrados</h5>
            <p class="card-text"><i class="fa-regular fa-user"></i> {{ $totalPacientes }}</p>
        </div>
    </div>
    <style>
        .card {
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 2rem;
            color: #007bff;
        }
    </style>

</div>
@endsection