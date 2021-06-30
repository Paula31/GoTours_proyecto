<div>
        <?php

        if (isset($_POST['login'])) {

            include 'coneccion.php';

            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];
            $flag = false;

            $query = "SELECT nombre, contraseña FROM usuario 
                WHERE nombre = '".$nombre."' AND contraseña = '".$contraseña."';";


            if ($stmt = $connection->prepare($query)) {
                $stmt->execute();
                $stmt->bind_result($nombre_db, $contraseña_db);
                $stmt->fetch();
                if($nombre == $nombre_db && $contraseña == $contraseña_db){
                    header("Location: index.html");
                    echo '<script>alert("Ha iniciado sesión correctamente")</script>';
                } else {
                    header("Location: login.php");
                    echo '<script>alert("Nombre de usuario o contraseña incorrectos")</script>';
                }
                $stmt->close();
            }

        }
?>