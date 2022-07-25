
<?php
session_start();
if(isset ($_SESSION['usuario'])){
    header("location: info.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio De Seccion</title>
    <link rel="stylesheet" href="assets/css/estilologin.css">
</head>

<body>

    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>

                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                
                <!--Inicio de Seccion-->
                <form action="php/login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" name="usuario" placeholder="Usuario">
                    <input type="password" name="contrasena" placeholder="Contraseña">
                    <button>Entrar</button>
                </form>


                <!--Registro-->
                <form action="php/registro_usuario.php" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="text" name="nombre_completo" placeholder="Nombre completo" require>
                    <input type="text" name="correo" placeholder="Correo Electronico" require>
                    <input type="text" name="usuario" placeholder="Usuario" require>
                    <input type="password"  name="contrasena" placeholder="Contraseña" require>
                    <button>Regístrarse</button>
                    <br>
                    <br>
                    <a href="assets/document/manualregis.pdf" role="button">Manual de usuario</a>
                </form>
            </div>
        </div>

    </main>

    <script src="assets/js/script.js"></script>
</body>

</html>
