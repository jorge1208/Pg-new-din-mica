<?php
//CONEXION BASE DE DATOS
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "formulario2";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}
//VERIFICACION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $ocupacion = $_POST['ocupacion'];
    $fecha = $_POST['fecha'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $nacionalidad = $_POST['nacionalidad'];
    $ingles = $_POST['ingles'];
    $lenguajes = implode(", ", $_POST['lenguajes']);
    $perfil = $_POST['perfil'];
    $experiencia = implode(", ", $_POST['experiencia']);
    $formacion = implode(", ", $_POST['formacion']);
    $idiomas = implode(", ", $_POST['idiomas']);
    $aptitudes = implode(", ", $_POST['aptitudes']);

    //INSERTAR DATOS
    $insertarDatos = "INSERT INTO datos5 (nombre, ocupacion, fecha, telefono, email, nacionalidad, ingles, perfil, experiencia, formacion, idiomas, aptitudes) 
                  VALUES ('$nombre', '$ocupacion', '$fecha','$telefono', '$email', '$nacionalidad','$ingles', '$perfil', '$experiencia', '$formacion', '$idiomas', '$aptitudes')";


    $resultado = mysqli_query($enlace, $insertarDatos);

    //VERIFICACION
    if ($resultado) {
        echo "Los datos se han insertado correctamente.";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($enlace);
    }
}




// Generar el perfil en HTML
echo '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="CV1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="main">
        <div class="top-section">
            <img src="foto.png" class="perfil">
            <p class="i1">' .(isset($_POST['nombre']) ? $_POST['nombre'] : '') .'</p>
            <p class="i2">' .(isset($_POST['ocupacion']) ? $_POST['ocupacion'] : '') .'</p>
        </div>

        <div class="clearfix"></div>

        <div class="block1">
            <div class="content-box" style="padding-left: 40px;">
                <p class="head">Datos</p>
                <p class="i3" > <i class="fas fa-birthday-cake"></i>&nbsp;&nbsp;' .(isset($_POST['fecha']) ? $_POST['fecha'] : '') .' . </p>
                <p class="i3" > <i class="fa fa-phone"></i>&nbsp;&nbsp; ' .(isset($_POST['telefono']) ? $_POST['telefono'] : '') .'  </p>
                <p class="i3" > <i class="fa fa-envelope"></i>&nbsp;&nbsp; ' .(isset($_POST['email']) ? $_POST['email'] : '') .' </p>
                <p class="i3" > <i class="fa fa-map-marker"></i>&nbsp;&nbsp;' .(isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : '') .' </p>
                <br/>
                <p class="head"> Nivel de Ingles</p> 
                <p class="i3" > '.(isset($_POST['ingles']) ? $_POST['ingles'] : '') .' </p>
                <br/>
                <p class="head">Lenguajes de programación</p>
                <p class="i3" >'. (isset($_POST['lenguajes']) ? implode('</p><p class="i3">', $_POST['lenguajes']) : '') . '</p>        
                <br/> 
                <p class="head">APTITUDES</p> 
                <ul class="tex">
                    <li>'. (isset($_POST['habilidades']) ? implode('</p><p class="i3">', $_POST['habilidades']) : '') . '</li>
                </ul> 
                <br/>
                <p class="head">HABILIDADES</p> 
                <ul class="tex">
                    <li>'. (isset($_POST['habilidades']) ? implode('</p><p class="i3">', $_POST['habilidades']) : '') . '</li>

                </ul>
                <br/>
                <p class="head">Otros intereses</p>
                <ul class="tex">
                    <li>Lectura de libros</li>
                </ul>
            </div>
        </div>
        <div class="linea"></div>
        <div class="block2">
            <div class="content-box">
                <p class="head">PERFIL</p>
                <p class="i3" style="font-size: 14px;">' . (isset($_POST['perfil']) ? $_POST['perfil'] : 'Soy un apasionado por la tecnología y el desarrollo web.') . '</p>
                <br/>
                <p class="head">EXPERIENCIA LABORAL</p>
                <p class="i-4">'. (isset($_POST['experiencia']) ? implode('</p><p class="i3">', $_POST['experiencia']) : '') . '</p>
                <br/>
                <p class="head">FORMACIÓN</p> 
                <p class="i-4">'. (isset($_POST['formacion']) ? implode('</p><p class="i3">', $_POST['formacion']) : '') . '</p>
                <br/>
            </div>
        </div>
    </div>
</body>
</html>';
?>
