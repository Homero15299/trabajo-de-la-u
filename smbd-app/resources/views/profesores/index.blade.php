<h1>Vista de Profesores</h1>




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
            color: rgb(241, 6, 6);
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
        }
        td {
            background-color: #444;
        }
    </style>
</head>
<body>
    <h2>Consultar Información</h2>
    <h3 style="text-align: center;">Sen Seis</h3>
    <table >
        <thead>
            <tr>
                <th>nombre</th>
                <th>apellido</th>
                <th>edad</th>
                <th>programa</th>
                <th>documento</th>
                <th>cedula</th>
                <th>fecha_nacimiento</th>
                <th>tipo_sangre</th>
                <th>Opciones</th>
            </tr>
        </thead>
        @foreach ( $profesores as $profesor )
        <tbody>
            <tr>
            <th>{{$profesor->nombre}}</th>
            <th>{{$profesor->apellido}}</th>
            <th>{{$profesor->edad}}</th>
            <th>{{$profesor->programa}}</th>
            <th>{{$profesor->tipo_id}}</th>
            <th>{{$profesor->numero_id}}</th>
            <th>{{$profesor->fecha_nacimiento}}</th>
            <th>{{$profesor->tipo_sangre}}</th>
            <th>
            <form action="{{route('profesores.destroy',$profesor->id) }}" method="POST">
                <a class="button"  href="{{ route('profesores.edit',$profesor->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="button" class="btn btn-dange btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                </form>
            </th>
            
            </tr>
            
        </tbody>
        @endforeach
    </table>

                    

              
    
</body>
</html>

</html>
