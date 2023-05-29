<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/global.css">
    <title>Inmobiliaria</title>
</head>
<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="#">Inmobiliaria</a>
        </div>
      </nav>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form name="flogin" method="POST" action="verifica_login.php">
            <b><p class="fs-4 text-center">Iniciar Sesión</p></b>
            <?php
                if(isset($_GET['error']) && $_GET['error']==1){

            ?>
                <font color="red"><strong>Credenciales incorrectas</strong></font>
            <?php
                }
            ?>
            <div class="mb-4">
                <label for="" class="form-label">Correo</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>


    </div>
</body>
</html>