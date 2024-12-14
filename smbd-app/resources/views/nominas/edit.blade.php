<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Información de la Nómina</title>
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
            font-size: 2rem;
            margin-top: 20px;
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
            font-size: 1rem;
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
            font-size: 1rem;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Formulario para Editar Nómina</h2>
    <form action="{{ route('nominas.update', $nomina->id) }}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="profesor_id">Profesor ID:</label>
        <input type="number" id="profesor_id" name="profesor_id" value="{{ old('profesor_id', $nomina->profesor_id) }}" class="form-control{{ $errors->has('profesor_id') ? ' is-invalid' : '' }}" placeholder="Profesor ID" required aria-required="true">
        @error('profesor_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="salario_mensual">Salario Mensual:</label>
        <input type="number" id="salario_mensual" name="salario_mensual" value="{{ old('salario_mensual', $nomina->salario_mensual) }}" class="form-control{{ $errors->has('salario_mensual') ? ' is-invalid' : '' }}" placeholder="Salario Mensual" required aria-required="true" step="0.01">
        @error('salario_mensual')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="tipo_vinculacion">Tipo de Vinculación:</label>
        <input type="text" id="tipo_vinculacion" name="tipo_vinculacion" value="{{ old('tipo_vinculacion', $nomina->tipo_vinculacion) }}" class="form-control{{ $errors->has('tipo_vinculacion') ? ' is-invalid' : '' }}" placeholder="Tipo de Vinculación" required aria-required="true">
        @error('tipo_vinculacion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <button type="submit">Actualizar Nómina</button>
    </form>
</body>
</html>
