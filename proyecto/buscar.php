<?php
include 'coneccion.php';

if (isset($_POST['buscar'])) {


    $estancia = (int)$_POST['estancia'];
    $transporte = (int)$_POST['transporte'];
    $precio = (int)$_POST['precio'];
    $provincia = (int)$_POST['provincia'];

    $paquetes = probabilidades_atributos($estancia, $transporte, $precio, $provincia, $connection);

    foreach ($paquetes as $valor) {
        echo 'paquete - ';
        echo $valor;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
    include("menu.html");
    ?>

    <section id="tours">

        <h2>Buscar un paquete vacacional</h2>
        <form name="search" method="post" id="search">

            <div class="form-group row">

                <div class="form-group col-md-4">
                    <label for="inputPassword4">Con estancia incluida</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridCheck" name="estancia" value=1>
                        <label class="form-check-label" for="gridCheck">
                            Sí
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="gridCheck" name="estancia" value=0>
                            <label class="form-check-label" for="gridCheck">
                                No
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Con transporte incluido</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="gridCheck" name="transporte" value="1">
                        <label class="form-check-label" for="gridCheck">
                            Sí
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="gridCheck" name="transporte" value="0">
                            <label class="form-check-label" for="gridCheck">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="form-group col-md-4 ">
                    <label for="inputEmail4">Precio estimado</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <select id="inputState" class="form-control" name="precio">
                            <option selected value=0>500 - 1000</option>
                            <option value=1>1000 - 2500</option>
                            <option value=2>2500 - 4000</option>
                            <option value=3>Más de 4000</option>
                        </select>
                    </div>

                </div>
                <div class="form-group col-md-4 ">
                    <label for="inputEmail4">Lugar</label>
                    <select id="inputState" class="form-control" name="provincia">
                        <option selected value="0">Todos</option>
                        <option vale=1>San José</option>
                        <option value=2>Alajuela</option>
                        <option value=3>Cartago</option>
                        <option value=4>Heredia</option>
                        <option value=5>Guanaste</option>
                        <option value=6>Puntarenas</option>
                        <option value=7>Limón</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-2">
                <input class="submit-btn form-control" type="submit" onclick="location.href='buscar.php'" value="Buscar" name="buscar"></input>
            </div>
            </div>
        </form>
    </section>

</body>

</html>