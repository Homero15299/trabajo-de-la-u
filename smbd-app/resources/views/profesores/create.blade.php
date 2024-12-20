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
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: 20px auto;
        }
        label {
            font-weight: bold;
        }
        label, input, select, button {
            display: block;
            width: 90%;
            margin: 10px auto;
        }
        input, select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .invalid-feedback {
            color: red;
            font-size: 0.9em;
            margin-top: -8px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Formulario para Insertar Información de los Profesores</h2>
    <form action="{{ route('profesores.store') }}" method="post">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $profesor->nombre ?? '') }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre">
        @if ($errors->has('nombre'))
            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
        @endif

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $profesor->apellido ?? '') }}" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="Apellido">
        @if ($errors->has('apellido'))
            <div class="invalid-feedback">{{ $errors->first('apellido') }}</div>
        @endif

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="{{ old('edad', $profesor->edad ?? '') }}" class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" placeholder="Edad">
        @if ($errors->has('edad'))
            <div class="invalid-feedback">{{ $errors->first('edad') }}</div>
        @endif

        <label for="tipo_sangre">Tipo de Sangre:</label>
        <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre', $profesor->tipo_sangre ?? '') }}" class="form-control{{ $errors->has('tipo_sangre') ? ' is-invalid' : '' }}" placeholder="Tipo de Sangre">
        @if ($errors->has('tipo_sangre'))
            <div class="invalid-feedback">{{ $errors->first('tipo_sangre') }}</div>
        @endif

        <label for="numero_id">Número de Documento:</label>
        <input type="number" id="numero_id" name="numero_id" value="{{ old('numero_id', $profesor->numero_id ?? '') }}" class="form-control{{ $errors->has('numero_id') ? ' is-invalid' : '' }}" placeholder="Número de Documento">
        @if ($errors->has('numero_id'))
            <div class="invalid-feedback">{{ $errors->first('numero_id') }}</div>
        @endif

        <label for="tipo_id">Tipo de ID:</label>
        <input type="text" id="tipo_id" name="tipo_id" value="{{ old('tipo_id', $profesor->tipo_id ?? '') }}" class="form-control{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}" placeholder="Tipo de ID">
        @if ($errors->has('tipo_id'))
            <div class="invalid-feedback">{{ $errors->first('tipo_id') }}</div>
        @endif

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $profesor->fecha_nacimiento ?? '') }}" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}">
        @if ($errors->has('fecha_nacimiento'))
            <div class="invalid-feedback">{{ $errors->first('fecha_nacimiento') }}</div>
        @endif

        <label for="programa">Programa:</label>
        <input type="text" id="programa" name="programa" value="{{ old('programa', $profesor->programa ?? '') }}" class="form-control{{ $errors->has('programa') ? ' is-invalid' : '' }}" placeholder="Programa">
        @if ($errors->has('programa'))
            <div class="invalid-feedback">{{ $errors->first('programa') }}</div>
        @endif

        <label for="tipo_vinculacion_id">Tipo Contrato:</label>
        <select id="tipo_vinculacion_id" name="tipo_vinculacion_id" class="form-control{{ $errors->has('tipo_vinculacion_id') ? ' is-invalid' : '' }}">
            <option value="" selected>Seleccione un tipo de vinculación</option>
            @foreach ($profesores as $profesor)
                <option value="{{ $profesor->id }}">
                    {{ $profesor->tipoVinculacion->tipo_vinculacion}}
                </option>
            @endforeach
        </select>
        @if ($errors->has('tipo_vinculacion_id'))
            <div class="invalid-feedback">{{ $errors->first('tipo_vinculacion_id') }}</div>
        @endif

        <!-- Campo Salario Mensual -->
        <label for="salario_mensual_id">Salario Mensual</label>
        <select id="salario_mensual_id" name="salario_mensual_id" class="form-control{{ $errors->has('salario_mensual_id') ? ' is-invalid' : '' }}">
            <option value="" selected>Seleccione un salario mensual</option>
            @foreach($profesores as $profesor)
                <option value="{{ $profesor->id }}">
                    ${{ $profesor->salarioMensual->salario }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('salario_mensual_id'))
            <div class="invalid-feedback">{{ $errors->first('salario_mensual_id') }}</div>
        @endif

        <!-- Botón -->
        <button type="submit">Insertar Profesor</button>
    </form>
</body>
</html>


