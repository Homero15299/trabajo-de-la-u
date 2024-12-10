<a?php
// inicio del archivo PHP
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicativo Educativo</title>
    <style>
        body {
            background-color: #40FFAD;
            color: #000000;
            font-family: Arial, sans-serif;
            background-image: url('https://www.senderismoeuropa.com/wp-content/uploads/2020/05/aquiles-en-troya-e1589990869569.jpg'); /* URL de la imagen de fondo */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            z-index: 1; /* Asegura que el contenido esté sobre el video de fondo */
            position: relative;
        }
        .button {
            margin: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        #logo {
            margin-top: 20px;
        }
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/O52zRz1Pw-4?autoplay=1" 
    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

    <div class="container">
        <img id="logo" src="https://images.ecestaticos.com/-vHPLpUcgwST1F-NkDXPkyp7sjw=/0x0:1920x1080/1338x752/filters:fill(white):format(jpg)/f.elconfidencial.com%2Foriginal%2F54f%2F56b%2F593%2F54f56b5933c455b042a2b65dbb17a26c.jpg" alt="Logo de la Empresa" height="100">
        <h1>Bienvenidos al Aplicativo Educativo</h1>
        <a class="button" href="{{route ('estudiantes.create')}}">Agregar estudiantes</a>
        <a class="button" href="{{route( 'estudiantes.index')}}">Consultar estudiantes</a>
        <a class="button" href="{{route('profesores.create')}}">Agregar profesores</a>
        <a class="button" href="{{route('profesores.index')}}">Consultar profesores</a>
        <a class="button" href="">Agregar Nomina</a>
        <a class="button" href="">Consultar Nomina</a>
    </div>
</body>
</html>
