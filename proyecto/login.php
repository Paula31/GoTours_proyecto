<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>GoTours</title>
</head>

<body>

    <?php
    include 'menu.html';
    ?>

    <div>
        <?php

        if (isset($_POST['login'])) {

            include 'config.php';

            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];

            $query = "SELECT name, password FROM proyecto_expertosb78959.user";

            if ($stmt = $con->prepare($query)) {
                $stmt->execute();
                $stmt->bind_result($nombre_bd, $contraseña_bd);
                while ($stmt->fetch()) {

                    if ($nombre == $nombre_bd && $contraseña == $contraseña_bd) {
                        printf("%s, %s\n", $nombre_bd, $contraseña_bd);
                        echo 'inicio de sesión finalizado con éxito';
                        exit();
                    }
                }
                $stmt->close();
            }
        }

        ?>
    </div>

    <form action="index.php" method="post" id="login" class="login">
        <div class="container" id="login_style">
            <h1> Inicio de Sesión </h1>
            <p> Llena el siguiente formulario </p>
            <div class="form-group col-md-4 ">
                <label for="nombre"><b>Nombre</b></label>
                <input class="form-control col-md-4" type="text" name="nombre" required>
            </div>
            <div class="form-group col-md-4 ">
                <label for="contraseña"><b>Contraseña</b></label>
                <input class="form-control" type="password" name="contraseña" required>
            </div>
            <div class="form-group col-md-4 ">
                <input type="submit" class="form-control" id="login_btn" name="login" value="Iniciar Sesión">
            </div>

            <div class="form-group col-md-4 ">
                <a href="index.php"><button type="button" class="form-control" id="back">Volver a la página principal</button></a>
            </div>
        </div>
    </form>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>