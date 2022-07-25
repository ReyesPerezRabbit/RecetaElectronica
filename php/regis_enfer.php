<?php 

include("php/conex_enfer.php");

if (isset($_POST['Guardar'])) {
    

    if (strlen($_POST['nombre_paciente']) >= 1 && 
	strlen($_POST['nombre_enfermedad']) >= 1 &&
    strlen($_POST['nombre_medicamento']) >= 1 &&
    strlen($_POST['tiempo_diagnosticado']) >= 1 &&
    strlen($_POST['direccion']) >= 1 &&
    strlen($_POST['email']) >= 1 &&
	strlen($_POST['telefono']) >= 1  ) {

	    $nombre_paciente = trim($_POST['nombre_paciente']);
	    $nombre_enfermedad = trim($_POST['nombre_enfermedad']);
        $nombre_medicamento = trim($_POST['nombre_medicamento']);
        $tiempo_diagnosticado = trim($_POST['tiempo_diagnosticado']);
        $direccion = trim($_POST['direccion']);
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);

	    $fecha_reg = date("d/m/y");

	    $consulta = "INSERT INTO formenfermedad (nombre_paciente, nombre_enfermedad, nombre_medicamento, tiempo_diagnosticado, direccion, email, telefono, fecha_reg)
         VALUES ('$nombre_paciente','  $nombre_enfermedad', '$nombre_medicamento', ' $tiempo_diagnosticado','   $direccion',' $email','   $telefono ',' $fecha_reg')";

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



