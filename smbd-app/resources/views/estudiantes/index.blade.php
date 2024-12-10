<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Información</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/736x/05/14/37/051437cf7aaacbb580cf6fc5494816a4.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #f10606;
        }
        h2, h3 {
            text-align: center;
            margin: 20px 0;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #555;
            color: #fff;
        }
        th {
            background-color: #333;
        }
        td {
            background-color: #444;
        }
        a.button, button {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            color: #fff;
            text-decoration: none;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a.button:hover, button:hover {
            background-color: #0056b3;
        }
        button {
            padding: 5px 10px;
        }
        button.btn-danger {
            background-color: #dc3545;
        }
        button.btn-danger:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
    <h2>Consultar Información</h2>
    <h3>Estudiantes</h3>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Programa</th>
                <th>Tipo de ID</th>
                <th>Semestre</th>
                <th>Número de ID</th>
                <th>Fecha de Nacimiento</th>
                <th>Tipo de Sangre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellido }}</td>
                <td>{{ $estudiante->edad }}</td>
                <td>{{ $estudiante->programa }}</td>
                <td>{{ $estudiante->tipo_id }}</td>
                <td>{{ $estudiante->semestre }}</td>
                <td>{{ $estudiante->numero_id }}</td>
                <td>{{ $estudiante->fecha_nacimiento }}</td>
                <td>{{ $estudiante->tipo_sangre }}</td>
                <td>
                    <a class="button" href="{{ route('estudiantes.edit', $estudiante->id) }}">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
