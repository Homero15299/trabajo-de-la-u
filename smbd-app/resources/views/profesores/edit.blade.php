<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información del Profesor</title>
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
            color: white;
        }
        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 10px;
            width: 50%;
            margin: 30px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select {
            display: block;
            width: 90%;
            padding: 8px;
            margin: 10px auto;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input.is-invalid, select.is-invalid {
            border-color: red;
        }
        .invalid-feedback {
            color: red;
            font-size: 0.9em;
            margin-top: -8px;
            margin-bottom: 10px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 92%;
            margin: 10px auto;
            display: block;
            font-size: 1.1em;
        }
        button:hover {
            background-color: #45a049;
        }
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Formulario para Editar Información de los Profesores</h2>

    <!-- Mensaje de éxito (si existe) -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profesores.update', $profesores->id) }}" role="form">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $profesores->nombre ?? '') }}" 
               class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre" required>
        @if ($errors->has('nombre'))
            <div class="invalid-feedback">
                {{ $errors->first('nombre') }}
            </div>
        @endif

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $profesores->apellido) }}" 
               class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="Apellido" required>
        @if ($errors->has('apellido'))
            <div class="invalid-feedback">
                {{ $errors->first('apellido') }}
            </div>
        @endif

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="{{ old('edad', $profesores->edad) }}" 
               class="form-control{{ $errors->has('edad') ? ' is-invalid' : '' }}" placeholder="Edad" required>
        @if ($errors->has('edad'))
            <div class="invalid-feedback">
                {{ $errors->first('edad') }}
            </div>
        @endif

        <label for="tipo_sangre">Tipo de Sangre:</label>
        <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre', $profesores->tipo_sangre) }}" 
               class="form-control{{ $errors->has('tipo_sangre') ? ' is-invalid' : '' }}" placeholder="Tipo de Sangre" required>
        @if ($errors->has('tipo_sangre'))
            <div class="invalid-feedback">
                {{ $errors->first('tipo_sangre') }}
            </div>
        @endif

        <label for="numero_id">Número de Documento:</label>
        <input type="number" id="numero_id" name="numero_id" value="{{ old('numero_id', $profesores->numero_id) }}" 
               class="form-control{{ $errors->has('numero_id') ? ' is-invalid' : '' }}" placeholder="Número de Documento" required>
        @if ($errors->has('numero_id'))
            <div class="invalid-feedback">
                {{ $errors->first('numero_id') }}
            </div>
        @endif

        <label for="tipo_id">Tipo de ID:</label>
        <input type="text" id="tipo_id" name="tipo_id" value="{{ old('tipo_id', $profesores->tipo_id) }}" 
               class="form-control{{ $errors->has('tipo_id') ? ' is-invalid' : '' }}" placeholder="Tipo de ID" required>
        @if ($errors->has('tipo_id'))
            <div class="invalid-feedback">
                {{ $errors->first('tipo_id') }}
            </div>
        @endif

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $profesores->fecha_nacimiento) }}" 
               class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" required>
        @if ($errors->has('fecha_nacimiento'))
            <div class="invalid-feedback">
                {{ $errors->first('fecha_nacimiento') }}
            </div>
        @endif

        <label for="programa">Programa:</label>
        <input type="text" id="programa" name="programa" value="{{ old('programa', $profesores->programa) }}" 
               class="form-control{{ $errors->has('programa') ? ' is-invalid' : '' }}" placeholder="Programa" required>
        @if ($errors->has('programa'))
            <div class="invalid-feedback">
                {{ $errors->first('programa') }}
            </div>
        @endif

        <label for="tipo_vinculacion_id">Tipo Contrato:</label>
        <select id="tipo_vinculacion_id" name="tipo_vinculacion_id" class="form-control{{ $errors->has('tipo_vinculacion_id') ? ' is-invalid' : '' }}">
        
            <option value="" selected>{{$profesores->tipoVinculacion->tipo_vinculacion}}</option>
            @foreach ($profesores as $profesor)
                <option value="{{ $profesores->id }}">
                {{ $profesores->tipoVinculacion->tipo_vinculacion }}
                </option>
    
            @endforeach
        </select>
        @if ($errors->has('tipo_vinculacion_id'))
            <div class="invalid-feedback">{{ $errors->first('tipo_vinculacion_id') }}</div>
        @endif

        <label for="salario_mensual_id">salario mensual</label>
        <select id="salario_mensual_id" name="salario_mensual_id" class="form-control{{ $errors->has('salario_mensual_id') ? ' is-invalid' : '' }}">
            <option value="" selected>{{$profesores->salarioMensual->salario}}</option>
            @foreach($profesores as $profesor)
        <option value="{{ $profesores->id }}">
        {{ $profesores->salarioMensual->salario }}
        </option>
    @endforeach
        </select>
        @if ($errors->has('salario_mensual_id'))
            <div class="invalid-feedback">{{ $errors->first('salario_mensual_id') }}</div>
        @endif

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
