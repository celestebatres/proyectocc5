<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include("./include/inicia_conexion.php");
include("./include/printconsole.php");
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
    <title>Insertar</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Insertar</a>
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
    <div class="d-flex justify-content-center align-items-center vh-200">
        <form name="datos" method="POST" action="register_propietary.php">
            <b>
                <p class="fs-4 text-center my-2">Generar Propietario</p>
            </b>
            <div class="mb-4">
                <label for="" class="form-label">Nombre</label>
                <input autocomplete="off" type="text" class="form-control" name="propietario_nombre">
            </div>

            <div class="mb-4">
                <label for="" class="form-label">Telefono</label>
                <input autocomplete="off" type="text" class="form-control" name="telefono">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Correo Electronico</label>
                <input autocomplete="off" type="email" class="form-control" name="email">
            </div>

            <div class="d-grid">
                <input autocomplete="off" type="submit" class="btn btn-primary" name="register_propietary"></input>
            </div>

        </form>
    </div>
</body>

</html>