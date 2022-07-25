
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario Enfermedad</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/estiloformularios.css">
</head>
<body> 
    <form method="POST" >
        <h1>Formulario De Enfermedad</h1>

        Nombre del Paciente:<input type="text" name="nombre_paciente" placeholder="Nombre del Paciente" >

        Nombre de la Enfermedad:<input type="text" name="nombre_enfermedad" placeholder="Nombre de la Enfermedad" >

        Nombre del Medicamento:<input type="text" name="nombre_medicamento" placeholder="Nombre del Medicamento" >

        Tiempo Diagnosticado:<input type="text" name="tiempo_diagnosticado" placeholder="Tiempo Diagnosticado" >

        Direccion:<input type="text" name="direccion" placeholder="Direccion" >

        Email:<input type="text" name="email" placeholder="Email" >

        Telefono:<input type="text" name="telefono" placeholder="Telefono" >

       
        <button type="submit"  href="info.php" name="Guardar">Imprimir</button>

        
<!--  <input type="submit" name="Guardar" onclick="index.php"> -->
        
        <a href="info.php" type="button">Pagina Principal</a>
        <a href="recetaPDF.php" type="button">Ver Pdf</a>

       
    </form>
    <?php
    include("php/regis_enfer.php");
    ?>
</body>
</html>


