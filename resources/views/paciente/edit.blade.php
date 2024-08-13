@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Editar Registro</h1>
    <form id="form-paciente" method="POST" action="{{ route('paciente.update', $paciente->dni) }}">
        @method('put')
        @csrf
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required>
                @error('nombre')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos', $paciente->apellidos) }}" required>
                @error('apellidos')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="dni">DNI</label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni', $paciente->dni) }}" readonly required>
                @error('dni')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="sexo">Sexo</label>
                <select class="custom-select @error('sexo') is-invalid @enderror" id="sexo" name="sexo" required>
                    <option value="" disabled>Sexo</option>
                    <option value="Masculino" {{ old('sexo', $paciente->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo', $paciente->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
                @error('sexo')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="fechaNacimiento">Nacimiento</label>
                <input type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror" id="fechaNacimiento" name="fechaNacimiento" value="{{ old('fechaNacimiento', $paciente->fechaNacimiento) }}" required>
                @error('fechaNacimiento')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="estadoCivil">Estado civil</label>
                <select class="custom-select @error('estadoCivil') is-invalid @enderror" id="estadoCivil" name="estadoCivil" required>
                    <option value="" disabled>Estado civil</option>
                    <option value="Soltero" {{ old('estadoCivil', $paciente->estadoCivil) == 'Soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="Casado" {{ old('estadoCivil', $paciente->estadoCivil) == 'Casado' ? 'selected' : '' }}>Casado</option>
                </select>
                @error('estadoCivil')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="correo">Correo</label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo', $paciente->correo) }}" placeholder="ejemplo@gmail.com" required>
                </div>
                @error('correo')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono', $paciente->telefono) }}" required>
                @error('telefono')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="seguro">Seguro</label>
                <select class="custom-select @error('seguro') is-invalid @enderror" id="seguro" name="seguro" required>
                    <option value="" disabled>Seguro</option>
                    <option value="Si" {{ old('seguro', $paciente->seguro) == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('seguro', $paciente->seguro) == 'No' ? 'selected' : '' }}>No</option>
                </select>
                @error('seguro')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Guardar</button>
        <a href="{{ route('cancelar') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form-paciente');
        const inputs = form.querySelectorAll('input, select');

        inputs.forEach(input => {
            input.addEventListener('blur', validateField);
            input.addEventListener('input', validateField);
        });

        function validateField(event) {
            const input = event.target;
            const value = input.value;
            let isValid = true;
            let errorMessage = '';

            if (input.hasAttribute('required') && (value === '' || input.selectedIndex === 0)) {
                isValid = false;
                errorMessage = 'Este campo es obligatorio';
            } else if (input.name === 'nombre' || input.name === 'apellidos') {
                if (!/^[a-zA-Z\s]+$/.test(value)) {
                    isValid = false;
                    errorMessage = 'Solo se permiten letras y espacios';
                }
            } else if (input.name === 'dni' && (value.length !== 8 || isNaN(value))) {
                isValid = false;
                errorMessage = 'El DNI debe tener 8 dígitos';
            } else if (input.name === 'correo' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                isValid = false;
                errorMessage = 'El correo debe ser una dirección de correo válida';
            } else if (input.name === 'telefono' && (value.length !== 9 || isNaN(value))) {
                isValid = false;
                errorMessage = 'El teléfono debe tener 9 dígitos';
            }

            if (isValid) {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                if (input.nextElementSibling && input.nextElementSibling.classList.contains('invalid-feedback')) {
                    input.nextElementSibling.remove();
                }
            } else {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
                if (input.nextElementSibling && input.nextElementSibling.classList.contains('invalid-feedback')) {
                    input.nextElementSibling.textContent = errorMessage;
                } else {
                    const errorSpan = document.createElement('span');
                    errorSpan.classList.add('invalid-feedback');
                    errorSpan.setAttribute('role', 'alert');
                    errorSpan.innerHTML = `<strong>${errorMessage}</strong>`;
                    input.parentNode.appendChild(errorSpan);
                }
            }
        }
    });
</script>
@endsection
