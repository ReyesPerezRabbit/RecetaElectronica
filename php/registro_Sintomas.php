<?php 

include("php/conexion_Sintomas.php");

if (isset($_POST['Guardar'])) {

    if (strlen($_POST['nombrecompleto']) >= 1 && 
	strlen($_POST['curp']) >= 1 &&
    strlen($_POST['edad']) >= 1 &&
    strlen($_POST['tiempomalestar']) >= 1 &&
    strlen($_POST['lugarmolestia']) >= 1 &&
	strlen($_POST['direccion']) >= 1  ) {

	    $nombrecompleto = trim($_POST['nombrecompleto']);
	    $curp = trim($_POST['curp']);
        $edad = trim($_POST['edad']);
        $tiempomalestar = trim($_POST['tiempomalestar']);
        $lugarmolestia = trim($_POST['lugarmolestia']);
        $direccion = trim($_POST['direccion']);

	    $fecha_reg = date("d/m/y");

	    $consulta = "INSERT INTO formsintomas( nombrecompleto, curp, edad, tiempomalestar, lugarmolestia, direccion, fecha_reg) 
        VALUES (' $nombrecompleto','  $curp',' $edad','  $tiempomalestar ','  $lugarmolestia','   $direccion',' $fecha_reg ')";

	    $resultado = mysqli_query($conexion,$consulta);
		
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Haz guardado tus datos correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

/*
if($conex) {
    echo 'Conectado a la base de datos';
}else{
    echo 'no se pudo Conectar a la base de datos';
}*/


?>




