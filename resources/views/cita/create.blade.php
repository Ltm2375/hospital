@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Nueva Cita</h1>
    <form method="POST" action="{{ route('cita.store') }}" id="form-paciente">
        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="dni">DNI</label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-regular fa-address-card"></i></span>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}" required>
                </div>
                @error('dni')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="nombre">Nombre del paciente</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" readonly required>
                @error('nombre')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="correo">Correo</label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo') }}" placeholder="ejemplo@gmail.com" readonly required>
                </div>
                @error('correo')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="telefono">Teléfono</label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-phone"></i></span>
                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" readonly required>
                </div>
                @error('telefono')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="doctor">Doctor</label>
                <select class="custom-select @error('doctor') is-invalid @enderror" id="doctor" name="doctor" required>
                    <option selected disabled>-</option>
                    <option value="Dr. Smith" {{ old('doctor') == 'Dr. Smith' ? 'selected' : '' }}>Dr. Smith</option>
                    <option value="Dr. Johnson" {{ old('doctor') == 'Dr. Johnson' ? 'selected' : '' }}>Dr. Johnson</option>
                </select>
                @error('doctor')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="especialidad">Especialidad</label>
                <select class="custom-select @error('especialidad') is-invalid @enderror" id="especialidad" name="especialidad" required>
                    <option selected disabled>-</option>
                    <option value="Pediatria" {{ old('especialidad') == 'Pediatria' ? 'selected' : '' }}>Pediatria</option>
                    <option value="Cirugia" {{ old('especialidad') == 'Cirugia' ? 'selected' : '' }}>Cirugia</option>
                    <option value="Ginecologia" {{ old('especialidad') == 'Ginecologia' ? 'selected' : '' }}>Ginecologia</option>
                </select>
                @error('especialidad')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ old('fecha') }}" required>
                @error('fecha')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="hora">Hora</label>
                <input type="time" class="form-control @error('hora') is-invalid @enderror" id="hora" name="hora" value="{{ old('hora') }}" required>
                @error('hora')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="motivo">Motivo</label>
                <textarea class="form-control @error('motivo') is-invalid @enderror" id="motivo" name="motivo" rows="3" required>{{ old('motivo') }}</textarea>
                @error('motivo')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Guardar</button>
        <a href="{{ route('cancelar2') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('dni').addEventListener('blur', function() {
        const dni = this.value;

        if (dni.length === 8 && !isNaN(dni)) {
            fetch(`/paciente/${dni}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        document.getElementById('nombre').value = `${data.nombre} ${data.apellidos}`;
                        document.getElementById('correo').value = data.correo;
                        document.getElementById('telefono').value = data.telefono;
                    } else {
                        document.getElementById('nombre').value = '';
                        document.getElementById('correo').value = '';
                        document.getElementById('telefono').value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const fechaInput = document.getElementById('fecha');
        const today = new Date();
        today.setDate(today.getDate() - 1); // Set to one day before today
        const minDate = today.toISOString().split('T')[0];
        fechaInput.setAttribute('min', minDate);
        fechaInput.value = minDate;

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
