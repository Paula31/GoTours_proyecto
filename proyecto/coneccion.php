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

function probabilidades_atributos($estancia, $transporte, $precio, $conn)
{

    /*
    $sql_count = "SELECT COUNT(provincia) as total FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $total = $data['total'];

    $sql = "SELECT * FROM paquete WHERE provincia = $provincia;";
    $paquetes = $conn->query($sql);
*/
    for ($i = 0; $i < 8; $i++) {

        $probabilidad_atributo = obtener_probabilidad_atributo(
            $estancia,
            $transporte,
            $precio,
            $i,
            $conn
        );

        $probabilidad_clase = obtener_probabilidad_clase($i, $conn);

        $probabilidad_final[$i] = $probabilidad_atributo * $probabilidad_clase;

        // se van comparanda cada probabilidad entre ellas, para sacar la mayor
        if ($i == 0) {
            $probabilidad_p = $probabilidad_final[$i];
            $provincia_p = $i;
        }

        if ($probabilidad_final[$i] > $probabilidad_p) {
            $probabilidad_p = $probabilidad_final[$i];
            $provincia_p = $i;
        }
    }
    $ProbabilidadFinal1[8] = $provincia_p;

    return $ProbabilidadFinal1[8];
}

function traer_paquete($estancia, $transporte, $precio, $provincia, $conn)
{


    $sql_count = "SELECT id as id FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $id = $data['id'];
    $paquete[0] =  $id;

    $sql_count = "SELECT name_paquete as name_paquete FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $name_paquete = $data['name_paquete'];
    $paquete[1] =  $name_paquete;

    $sql_count = "SELECT descripcion as descripcion FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $descripcion = $data['descripcion'];
    $paquete[2] =  $descripcion;

    $sql_count = "SELECT dias as dias FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $dias = $data['dias'];
    $paquete[3] =  $dias;

    $sql_count = "SELECT precio as precio FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $precio = $data['precio'];
    $paquete[4] =  $precio;

    $sql_count = "SELECT transporte as transporte FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $transporte = $data['transporte'];
    $paquete[5] =  $transporte;


    $paquete[6] =  $provincia;

    $sql_count = "SELECT Estanciaid as Estanciaid FROM paquete WHERE provincia = $provincia;";
    $result = mysqli_query($conn, $sql_count);
    $data = mysqli_fetch_assoc($result);
    $Estanciaid = $data['Estanciaid'];
    $paquete[5] =  $Estanciaid;

    return $paquete;
}

function obtener_actividades($id_paquete, $conn)
{

    $sql = "SELECT id FROM actividades_paquete WHERE Paqueteid = $id_paquete;";
    $id_actividades = mysqli_query($conn, $sql);
    $i = 0;
    $dia =1;

    if (mysqli_num_rows($id_actividades) > 0) {

        while ($row = mysqli_fetch_assoc($id_actividades)) {
            $proc = "CALL obtener_actividades(?,?, @dia_actividad_out, @nombre_actividad,
            @provincia_actividad, @tipo_actividad, @imagen_actividad)";

            $call = mysqli_prepare($conn, $proc);
            mysqli_stmt_bind_param($call, 'ii', $row["id"], $dia);
            mysqli_stmt_execute($call);

            //se extraen los datos del proc
            $select = mysqli_query($conn, 'SELECT  @dia_actividad_out, @nombre_actividad,
            @provincia_actividad, @tipo_actividad, @imagen_actividad');
            $result = mysqli_fetch_assoc($select);

            $actividades[$i] = [$result['@dia_actividad_out'],$result['@nombre_actividad'],
            $result['@provincia_actividad'], $result['@tipo_actividad'], $result['@imagen_actividad']];
        $i++;
        $dia++;
        }
    } else {
        echo "0 results";
    }

    return $actividades;
}
