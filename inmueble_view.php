<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include("./include/inicia_conexion.php");

$id_i = $_POST['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/global.css">
    <title>Inmueble</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Detalles de Inmueble:
                <?php echo $id_i ?>
            </a>
        </div>
        <div class="links collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" href="./inmuebles.php">Inmuebles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./propietarios.php">Propietarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./signout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="card inmueble my-5" style="width: 50rem;">
        <span class="badge bg-success">Venta</span>
        <img src="https://blog.wasi.co/wp-content/uploads/2019/07/claves-fotografia-inmobiliaria-exterior-casa-software-inmobiliario-wasi.jpg"
            class="card-img-top" alt="inmueble">

        <div class="card-body">
            <?php

            $sql = "
            select i.nombre as inmueble_nombre, p.nombre as propietario_nombre, i.habitaciones as habitaciones, cat.nombre as categoria, z.nombre as zona, i.dimension as dimension, d.nombre as departamento, c.nombre as ciudad ,i.descripcion as descripcion from inmueble i
            inner join propietario p on i.propietario = p.propietario
            inner join categoria cat on i.categoria = cat.categoria
            inner join zona z on i.zona = z.zona
            inner join ciudad c on z.ciudad = c.ciudad
            inner join departamento d on c.departamento = d.departamento where i.inmueble = ?;
            ";

            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "i", $_POST['id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $inmueble_nombre, $propietario_nombre, $habitaciones, $categoria_nombre, $zona, $dimension, $departamento, $ciudad, $descripcion);
            $tipo = 'Casa';
            while (mysqli_stmt_fetch($stmt)) {
                echo '
            <h1>' . $inmueble_nombre . '</h1>
            <p class="fs-5">' . $propietario_nombre . '</p>
            <p class="fs-4"></p>
            <p class="fs-4">Precio: ' . '$5000' . '</p>
            <br><br>
            <hr>
            <div class="container">
                <h2 class="text-center">Detalles del Inmueble</h2>
                <br>
                <div class="row">
                    <div class="col">
                        <p><b>Departamento: </b>'.$departamento.'</p>
                    </div>
                    <div class="col">
                        <p><b>Tipo de Inmueble: </b>'.$tipo.'</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b>Ciudad: </b>'.$ciudad.'</p>
                    </div>
                    <div class="col">
                        <p><b>Area Construida: </b>'.$dimension.'</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b>Zona: </b>'.$zona.'</p>
                    </div>
                    <div class="col">
                        <p><b>Habitaciones: </b>'.$habitaciones.'</p>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div class="detalles">
                <h2 class="text-center">Descripción Adicional</h2>
                <p>'.$descripcion.'</p>
            </div>
            ';
            }
            mysqli_stmt_close($stmt);
            ?>
        </div>
    </div>
</body>

</html>