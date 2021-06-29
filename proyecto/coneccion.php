<?php

$host = "163.178.107.10";
$dbname = "proyecto_expertosb78959_h";
$user = "laboratorios";
$password = "KmZpo.2796";

global $connection;
$connection = mysqli_connect($host, $user, $password, $dbname) or die("No se pudo conectar a la BD: " . mysqli_connect_error());

mysqli_set_charset($connection, "utf8");

function registrar($nombre, $apellido, $email, $telefono, $contraseña, $conn)
{
    $sql = "INSERT INTO usuario (nombre, apellidos, correo, telefono, contraseña) 
                      VALUES ('$nombre', '$apellido', '$email', '$telefono', '$contraseña');";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function obtener_probabilidad_atributo($estancia, $transporte, $precio, $provincia, $conn)
{
    $proc = "CALL obtener_probabilidad_atributo(?, ?, ?, ?, @estanciaOut, @transporteOut, @precioOut)";

    $call = mysqli_prepare($conn, $proc);
    mysqli_stmt_bind_param($call, 'iiii', $estancia, $transporte, $precio, $provincia);
    mysqli_stmt_execute($call);

    //se extraen los datos del proc
    $select = mysqli_query($conn, 'SELECT  @estanciaOut, @transporteOut, @precioOut');
    $result = mysqli_fetch_assoc($select);

    $estancia_probabilidad[0] = $result['@estanciaOut'];
    $transporte_probabilidad[1] = $result['@transporteOut'];
    $precio_probabilidad[2] = $result['@precioOut'];


    $result_probabilidad =  $estancia_probabilidad[0] *  $transporte_probabilidad[1] * $precio_probabilidad[2];

    return $result_probabilidad;
}

function obtener_probabilidad_clase($provincia, $conn)
{
    $proc = "CALL obtener_probabilidad_clase(?, @total, @total_provincia)";
    $call = mysqli_prepare($conn, $proc);
    mysqli_stmt_bind_param($call, 'i', $provincia);
    mysqli_stmt_execute($call);

    //se extraen los datos del proc
    $select = mysqli_query($conn, 'SELECT  @total, @total_provincia');
    $result = mysqli_fetch_assoc($select);

    $total = $result['@total'];
    $total_provincia = $result['@total_provincia'];

    $probabilida_clase = $total_provincia / $total;

    return $probabilida_clase;
}

function probabilidades_atributos($estancia, $transporte, $precio, $provincia, $conn)
{

    $sql_count= "SELECT COUNT(provincia) as total FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $total = $data['total'];

    $sql = "SELECT * FROM paquete WHERE provincia = $provincia;";
    $paquetes = $conn->query($sql);
    $i=0;
    if ($paquetes->num_rows > 0) {

        // output data of each row
        while($row = $paquetes->fetch_assoc()) {
            $probabilidad_atributo[$i] = obtener_probabilidad_atributo($estancia, 
            $transporte, $precio, $provincia, $conn);

            $probabilidad_clase[$i] = obtener_probabilidad_clase($provincia, $conn);
    
            //se realiza la productoria de probabilidades
            $ProbabilidadFinal[$i] =  $probabilidad_atributo[$i] * $probabilidad_clase[$i];
    
    
            // se van comparanda cada probabilidad entre ellas, para sacar la mayor
            if ($i == 0) {
                $probabilidad = $ProbabilidadFinal[$i];
                $paquetes_ordernados[$i] = $row['id'];
                
            }
    
            if ($ProbabilidadFinal[$i] > $probabilidad) {
                $probabilidad = $ProbabilidadFinal[$i];
                $paquetes_ordernados[$i] = $row['id'];
            }
            $i++;
           
            echo '- i-';
            echo $i;
        
        }
      } else {
        echo "0 results";
      }

      return $paquetes_ordernados; 

}
