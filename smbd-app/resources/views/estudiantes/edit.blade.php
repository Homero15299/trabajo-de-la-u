<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
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
        label, input, button {
            display: block;
            width: 90%;
            margin: 10px auto;
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
    </style>
</head>
<body>
    <h2>Formulario para Editar Información de los Estudiantes</h2>
    <form action="{{route('estudiantes.update', '$estudiante->$id')}}" method="post" role="form" enctype="multipart/form-data">

        @csrf
        {{ method_field("PATCH") }}
        <label for="nombre">Nombre:</labelfor>
        <input type="text" id="nombre" name="nombre" value="{{isset($estudiante->nombre) ? $estudiante->nombre : ''}}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre">        
        @if ($errors->has('nombre'))
        <div class="invalid->feedback">
        {{ $errors->first('nombre')}}
        </div>
        @endif


        <labelfor for="apellido">Apellido:</labelfor>
        <input type="text" id="apellido" name="apellido" value="{{isset($estudiante->apellido) ? $estudiante->apellido : ''}}" class="form-control" {{ $errors->has('apellido') ? ' is-invalid' : '' }} placeholder="apellido">
        @if ($errors->has('apellido'))
        <div class="invalid->feedback">
        {{ $errors->first('apellido')}}
        </div>
        @endif


        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="{{isset($estudiante->edad) ? $estudiante->edad : ''}}" class="form-control" {{ $errors->has('edad') ? ' is-invalid' : '' }} placeholder="edad">
        @if ($errors->has('edad'))
        <div class="invalid->feedback">
        {{ $errors->first('edad')}}
        </div>
        @endif


        
        <label for="tipo_sangre">Tipo de sangre:</label>
        <input type="text" id="tipo_sangre" name="tipo_sangre" value="{{isset($estudiante->tipo_sangre) ? $estudiante->tipo_sangre : ''}}" class="form-control" {{ $errors->has('tipo_sangre') ? ' is-invalid' : '' }}" placeholder="tipo_sangre">
        @if ($errors->has('tipo_sangre'))
        <div class="invalid->feedback">
        {{ $errors->first('tipo_sangre')}}
        </div>
        @endif


        
        <label for="numero_id">Numero de documento:</label>
        <input type="number" id="numero_id" name="numero_id" value="{{isset($estudiante->numero_id) ? $estudiante->numero_id : ''}}" class="form-control" {{ $errors->has('numero_id') ? ' is-invalid' : '' }} placeholder="numero_id">
        @if ($errors->has('numero_id'))
        <div class="invalid->feedback">
        {{ $errors->first('numero_id')}}
        </div>
        @endif


      
        <label for="tipo_id">Tipo de id:</label>
        <input type="text" id="tipo_id" name="tipo_id" value="{{isset($estudiante->tipo_id) ? $estudiante->tipo_id : ''}}" class="form-control"  {{ $errors->has('tipo_id') ? ' is-invalid' : '' }} placeholder="tipo_id">
        @if ($errors->has('tipo_id'))
        <div class="invalid->feedback">
        {{ $errors->first('tipo_id')}}
        </div>
        @endif


        
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha de nacimiento" name="fecha_nacimiento" value="{{isset($estudiante->fecha_nacimiento) ? $estudiante->fecha_nacimiento : ''}}" class="form-control" {{ $errors->has('fecha-nacimiento') ? ' is-invalid' : '' }}" placeholder="fecha_nacimiento">
        @if ($errors->has('fecha_nacimiento'))
        <div class="invalid->feedback">
        {{ $errors->first('fecha_nacimiento')}}
        </div>
        @endif


        
        <label for="semestre">Semestre:</label>
        <input type="number" id="semestre" name="semestre" value="{{isset($estudiante->semestre) ? $estudiante->semestre : ''}}"  class="form-control"{{ $errors->has('semestre') ? ' is-invalid' : '' }} placeholder="semestre">
        @if ($errors->has('semestre'))
        <div class="invalid->feedback">
        {{ $errors->first('semestre')}}
        </div>
        @endif

        
        <label for="programa">Programa:</label>
        <input type="text" id="programa" name="programa"value="{{isset($estudiante->programa) ? $estudiante->programa : ''}}" class="form-control"{{ $errors->has('programa') ? ' is-invalid' : '' }} placeholder="programa">
        @if ($errors->has('programa'))
        <div class="invalid->feedback">
        {{ $errors->first('programa')}}
        </div>
        @endif

        <button class=""  type="submit">Actualizar Estudiante</button>
    </form>


</body>
</html>