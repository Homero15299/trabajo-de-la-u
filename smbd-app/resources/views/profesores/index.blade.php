<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Información de Profesores</title>
    <style>
        body {
            background-image: url('https://i.pinimg.com/736x/05/14/37/051437cf7aaacbb580cf6fc5494816a4.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: rgb(241, 6, 6);
            margin: 0;
            padding: 0;
        }
        h1, h2, h3 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
            font-weight: bold;
        }
        td {
            background-color: #444;
            color: #fff;
        }
        tr:nth-child(even) td {
            background-color: #555;
        }
        a.button, button {
            display: inline-block;
            padding: 8px 12px;
            margin: 4px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            border: none;
        }
        a.button:hover, button:hover {
            background-color: #45a049;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h1>Vista de Profesores</h1>
    <h2>Consultar Información</h2>
    <h3>Sen Seis</h3>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Programa</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
                <th>Fecha de Nacimiento</th>
                <th>Tipo de Sangre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $profesor)
            <tr>
                <td>{{ $profesor->nombre }}</td>
                <td>{{ $profesor->apellido }}</td>
                <td>{{ $profesor->edad }}</td>
                <td>{{ $profesor->programa }}</td>
                <td>{{ $profesor->tipo_id }}</td>
                <td>{{ $profesor->numero_id }}</td>
                <td>{{ $profesor->fecha_nacimiento }}</td>
                <td>{{ $profesor->tipo_sangre }}</td>
                <td>
                    <!-- Enlace para editar el profesor -->
                    <a class="button" href="{{ route('profesores.edit', $profesor->id) }}">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                    <!-- Formulario para eliminar al profesor -->
                    <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">
                            <i class="fa fa-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

