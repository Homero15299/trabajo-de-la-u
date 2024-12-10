<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Información</title>
    <style>
        body {
            background-image: url('https://pics.filmaffinity.com/Troya-312937764-large.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: rgb(241, 6, 6);
        }
        h2 {
            text-align: center;
        }
        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, button {
            width: calc(100% - 20px);
            margin: 5px auto;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input.is-invalid {
            border-color: red;
        }
        .invalid-feedback {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Formulario para Insertar Información de los Estudiantes</h2>
    <form action="{{ route('estudiantes.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $estudiante->nombre ?? '') }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre">
        @error('nombre')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $estudiante->apellido ?? '') }}" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="Apellido">
        @error('apellido')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="{{ old('edad', $estudiante->edad ?? '') }}" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" placeholder="Edad">
        @error('edad')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="tipo_sangre">Tipo de sangre:</label>
        <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre', $estudiante->tipo_sangre ?? '') }}" class="form-control{{ $errors->has('tipo_sangre') ? ' is-invalid' : '' }}" placeholder="Tipo de sangre">
        @error('tipo_sangre')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="numero_id">Número de documento:</label>
        <input type="number" id="numero_id" name="numero_id" value="{{ old('numero_id', $estudiante->numero_id ?? '') }}" class="form-control{{ $errors->has('numero_id') ? ' is-invalid' : '' }}" placeholder="Número de documento">
        @error('numero_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="tipo_id">Tipo de ID:</label>
        <input type="text" id="tipo_id" name="tipo_id" value="{{ old('tipo_id', $estudiante->tipo_id ?? '') }}" class="form-control{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}" placeholder="Tipo de ID">
        @error('tipo_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento ?? '') }}" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}">
        @error('fecha_nacimiento')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="semestre">Semestre:</label>
        <input type="number" id="semestre" name="semestre" value="{{ old('semestre', $estudiante->semestre ?? '') }}" class="form-control{{ $errors->has('semestre') ? ' is-invalid' : '' }}" placeholder="Semestre">
        @error('semestre')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <label for="programa">Programa:</label>
        <input type="text" id="programa" name="programa" value="{{ old('programa', $estudiante->programa ?? '') }}" class="form-control{{ $errors->has('programa') ? ' is-invalid' : '' }}" placeholder="Programa">
        @error('programa')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <button type="submit">Insertar Estudiante</button>
    </form>
</body>
</html>
