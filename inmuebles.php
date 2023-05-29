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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/menu.css">
    <link rel="stylesheet" href="./styles/global.css">
    <title>Menu</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Inmuebles</a>
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

    <div class="content">
        <!-- Barra de Busqueda. TODO: Agregar filtros -->
        <form class="d-flex searchbar my-4" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <!-- Insertar -->
        <a href="./inmueble_nuevo.php"><button class="btn btn-primary">Insertar</button></a>
        <!-- Lista de Inmuebles -->
        <strong>
            <font size='6'>Resultados de la busqueda</font>
        </strong> <br><br>
        <div class="d-flex">
            <!-- Imagenes -->
            <?PHP
            $i = 0;
            $sql = "select p.nombre as Propietario, i.inmueble as inmueble, i.nombre as inmueble_nombre, c.nombre as Categoria, z.nombre as Zona, i.descripcion as Descripcion from inmueble i
                    inner join propietario p on i.propietario = p.propietario
                    inner join categoria c on i.categoria = c.categoria
                    inner join zona z on i.zona = z.zona";

            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $propietario, $inmueble, $inmueble_nombre, $categoria, $zona, $descripcion);

            while (mysqli_stmt_fetch($stmt)) {
                if ($i % 2 == 0) {
                    $color = "#CCCCCC";
                } else {
                    $color = "#FFFFFF";
                }



                echo '<div class="card col-sm-4 mx-3 my-3" style="width: 18rem;">
        <img src="https://mira.gt/wp-content/uploads/2021/08/Carrusel-apartamentos-24.png" class="card-img-top"
            alt="apartamento">
        <div class="card-body">
            <h5 class="card-title">' . $inmueble_nombre . ' </h5>
            <p class="card-text">' . $descripcion . '</p>
            <a href="javascript:fun_view(' . $inmueble .');" class="btn btn-primary">Ver detalles<a/>
            <a href="javascript:fun_del(' . $inmueble . ');" class="btn btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg></a>

          <a href="javascript:fun_del(' . $inmueble . ');" class="btn btn-danger" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
        </svg>
          </a>
        </div>
    </div>
    ';
                $i++;
            }
            mysqli_stmt_close($stmt);
            if ($i == 0) {
                echo "<tr><td colspan=6 align=center> No se encontraron resultados </td><tr>";
            }
            ?>
        </div>
        <form name='fview' method='post' action='inmueble_view.php'>
            <input type="hidden" name="id">
        </form>
</body>
</html>

<script language="javascript">

    function fun_view(pid){
        document.fview.id.value=pid;
        document.fview.submit();
    }
    function fun_del(pid){
        respuesta = confirm('Está seguro de eliminar el registro?');
        if(respuesta){
            document.fdelete.id.value=pid;
            document.fdelete.submit();
        }
        
    }    
</script>