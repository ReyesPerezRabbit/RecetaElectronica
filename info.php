
<?php
session_start();

if(!isset($_SESSION['usuario'])){
    echo '
    <script>
    alert ("Por favor de iniciar Seccion")
    window.location = "index.php";
    </script>
    ';
   // header("location: index.php");
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8743b6a6f6.js" crossorigin="anonymous"></script>
    <title>Informacion de Recetas</title>
    <link rel="stylesheet" href="assets/css/estiloinfo.css">

</head>
<body>

<header>
    <div class="header-content">
        <div class="logo">
        <h1>Receta <b>Electronica</b></h1>
        </div>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="info.php">Inicio</a></li>
                    <li><a href="php/cerrar_sesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>

        </div>
    </div>
</header>
<div class="container-cover">
    <div class="container-cover-info">
<h1></h1>
<p></p>

    </div>
</div>
<div class="container-content">
<article>
    <h1>Informacion sobre la creacion de la receta Electronica</h1>
<hr>

    <p>Si ya tienes una enfermedad diagnosticada solo ´presiona lo siguiente </p>
        <a href="formEnfer.php">! ENFERMEDADES ¡</a>
        
        <p>si deseas ser diagnosticado cun una enfermedad selecciona lo siguiente</p>
        <a href="formSintomas.php">! SINTOMAS ¡</a>

</article>

</div>
<div class="container-footer">
    <footer>
        <div class="logo">
            <img src="assets/imagenes/icono3.png" alt="">
        </div>
        <div class="redes-footer">
            <a href=""><i class="fa-brands fa-facebook icon-redes-footer"></i></a>
            <a href=""><i class="fa-brands fa-discord icon-redes-footer"></i></a>
            <a href=""><i class="fa-brands fa-google icon-redes-footer"></i></a>
        </div>
        <hr>
        <h3>Pagina Diseñada por Java Crew </h3>
    </footer>
</div>
</body>
</html>
