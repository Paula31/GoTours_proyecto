<?php
include 'coneccion.php';

if (isset($_POST['create'])) {


    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];

    registrar($nombre, $apellido, $email, $telefono, $contraseña, $connection);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
    include("menu.html");
    ?>
    <div>
        <form action="registration.php" method="post" id="registration">
            <div class="container">
                <h1> Registrarse </h1>
                <p> Llena el siguiente formulario </p>

                <div class="form-group col-md-4 ">
                    <label for="nombre"><b>Nombre</b></label>
                    <input class="form-control" type="text" name="nombre" required>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="apellido"><b>Apellidos</b></label>
                    <input class="form-control" type="text" name="apellido" required>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="email"><b>Correo Electronico:</b></label>
                    <input class="form-control" type="email" name="email" required>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="telefono"><b>Teléfono</b></label>
                    <input class="form-control" type="text" name="telefono" required>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="contraseña"><b>Contraseña</b></label>
                    <input class="form-control" type="password" name="contraseña" required>
                </div>

                <div class="form-group col-md-4 ">
                    <input type="submit" class="form-control" id="create_btn" name="create" value="Registrarse">
                </div>

                <div class="form-group col-md-4 ">
                    <a href="index.php"><button type="button" class="form-control" id="back">Volver a la página principal</button></a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>