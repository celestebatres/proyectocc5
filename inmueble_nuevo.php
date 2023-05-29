<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include("./include/inicia_conexion.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
        <form name="datos" method="POST" action="inmueble_insert.php">
            <b>
                <p class="fs-4 text-center my-2">Publicar Inmueble</p>
            </b>
            <div class="mb-4">
                <label for="" class="form-label">Nombre</label>
                <input autocomplete="off" type="text" class="form-control" name="inmueble_nombre">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Propietario</label>
                <select class="form-select" aria-label="Default select example" name="propietario">
                    <option selected>Seleccione propietario</option>
                    <?php
                    $sql = "select p.propietario, p.nombre as propietario_nombre from propietario p";
                    $stmt = mysqli_prepare($conexion, $sql);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $propietario, $propietario_nombre);
                    while (mysqli_stmt_fetch($stmt)) {
                        echo '
                        <option value="' . $propietario . '">' . $propietario_nombre . '</option>
                        ';
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </select>
                <a href="propietario_nuevo.php">Generar Propietario</a>
            </div>
            <div class="tipo mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="venta">
                    <label class="form-check-label" for="venta">
                        Venta
                    </label>
                    <input type="text" class="form-control mx-1 my-1" placeholder="Precio">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="renta">
                    <label class="form-check-label" for="renta">
                        Renta
                    </label>
                    <input type="text" class="form-control mx-1 my-1" placeholder="Precio">
                </div>
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                    <option selected>Seleccione opción</option>
                    <?php
                    $sql = "select c.nombre as categoria from categoria c";
                    $stmt = mysqli_prepare($conexion, $sql);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $categoria);
                    while (mysqli_stmt_fetch($stmt)) {
                        echo '
                        <option value="' . $categoria . '">' . $categoria . '</option>
                        ';
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Ubicación</label>
                <select class="form-select" aria-label="Default select example" name="departamento">
                    <option selected>Seleccione departamento</option>
                    <?php
                    $sql = "select d.departamento, d.nombre as departamento from departamento d";
                    $stmt = mysqli_prepare($conexion, $sql);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $departamento, $nombred);
                    while (mysqli_stmt_fetch($stmt)) {
                        echo '
                        <option value="' . $departamento . '">' . $nombred . '</option>
                        ';
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </select>
                <br>
                <select class="form-select" aria-label="Default select example" name="ciudad">
                    <option selected>Seleccione ciudad</option>
                    <?php
                    $sql = "select c.nombre as ciudad from ciudad c";
                    $stmt = mysqli_prepare($conexion, $sql);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $ciudad);
                    while (mysqli_stmt_fetch($stmt)) {
                        echo '
                        <option value="1">' . $ciudad . '</option>
                        ';
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </select>
                <br>
                <input autocomplete="off" type="text" class="form-control" name="zona" placeholder="Ingrese zona">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Dimensión</label>
                <input autocomplete="off" type="text" class="form-control" name="dimension">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Habitaciones</label>
                <input autocomplete="off" type="number" class="form-control" name="habitaciones">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Descripción</label>
                <input autocomplete="off" type="text" class="form-control" name="descripcion">
            </div>

            <div class="d-grid">
                <input autocomplete="off" type="submit" class="btn btn-primary"></input>
            </div>
        </form>
    </div>
</body>

</html>