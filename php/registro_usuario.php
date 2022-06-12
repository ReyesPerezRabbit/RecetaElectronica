<?php

include 'conexion.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena)
 VALUES ('$nombre_completo', '$correo' , '$usuario' , '$contrasena' )";

//verificar que no se repitan los datos en la parte del correo
$verificar_correo = mysqli_query($conexion , "SELECT * FROM usuarios WHERE correo = '$correo' ");



if(mysqli_num_rows($verificar_correo) > 0){
echo '
<script>
alert("Este Usuario ya Esta Registrado ");
window.location = "../index.php"
</script>
';

exit();

}

//verificar que no se repitan los datos en la parte del usuario
$verificar_usuario = mysqli_query($conexion , "SELECT * FROM usuarios WHERE usuario = '$usuario' ");

if(mysqli_num_rows($verificar_usuario) > 0){
echo '
<script>
alert("Este Usuario ya Esta Registrado , Usa Otro Usuario Por favor");
window.location = "../index.php"
</script>
';

exit();

}


 $ejecutar = mysqli_query($conexion,  $query); 

 if($ejecutar){
     echo '
     <script>
     alert("Usuario Registrado")
     window.location = "../index.php";
     </script>
     ';

 }else{
     '
    <script>
    alert("Error al Registarse. Intente de Nuevo")
    window.location = "../index.php";
    </script>
    ';
 }

 mysqli_close($conexion);
?>
