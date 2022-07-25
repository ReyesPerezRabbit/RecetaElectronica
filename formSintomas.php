<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario Estudios</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/estiloformularios.css">
</head>
<body> 
    <form method="POST" >
        <h1>Formulario De Sintomas</h1>

        Nombre Completo:<input type="text" name="nombrecompleto" placeholder="Nombre Completo" >

        Digite su CURP:<input type="text" name="curp" placeholder=" Digite su CURP" >

        Cual es su Edad:<input type="text" name="edad" placeholder="Cual es su Edad" >

        Malestares y Tiempo de los Sintomas:<input type="text" name="tipo_malestar" placeholder="Malestares y Tiempo de los Sintomas" >

        Lugar de la molestia:<input type="text" name="lugarmolestia" placeholder="Lugar de la molestia" >

        Cual es su Direccion:<input type="text" name="direccion" placeholder="Cual es su Direccion" >



          <button type="submit" name="Guardar">Imprimir</button>

        
        <!--  <input type="submit" name="Guardar" onclick="index.php"> -->

        <a href="info.php" type="button">Pagina principal</a>

        


       
    </form>
    <?php
    include("php/registro_Sintomas.php");
    ?>
</body>
</html>


