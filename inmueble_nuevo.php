<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include("./include/inicia_conexion.php");
include("./include/conexion.php");
include("./include/printconsole.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
		<script type="text/javascript">
            $(document).ready(function(){
                $("#cbx_estado").change(function () {
                    
                    $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_estado option:selected").each(function () {
                        id_estado = $(this).val();
						$.post("include/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#cbx_municipio").html(data);
                            console.log(id_estado);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_municipio").change(function () {
					$("#cbx_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("include/getLocalidades.php", { id_municipio: id_municipio }, function(data){
                            $("#cbx_localidad").html(data);
                            console.log(id_municipio);
						});            
					});
				})
			});
		</script>
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
                    <input class="form-check-input" type="checkbox"  id="venta" name="venta">
                    <label class="form-check-label" for="venta">
                        Venta
                    </label>
                    <input type="text" class="form-control mx-1 my-1" placeholder="Precio" id="precio_venta" name="precio_venta">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  id="renta" name="renta">
                    <label class="form-check-label" for="renta">
                        Renta
                    </label>
                    <input type="text" class="form-control mx-1 my-1" placeholder="Precio" name="precio_venta"  id="precio_renta">
                </div>
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">
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
                <select class="form-select" aria-label="Default select example" name="cbx_estado" id="cbx_estado">
                    <option selected>Seleccione departamento</option>
                    <?php
                    $sql = "SELECT `departamento`, `nombre` FROM `departamento`";
                    $resultado = $mysqli->query($sql);
                    if($resultado){
                        write_to_console("Bueno sql departamento");
                    }else{
                        write_to_console("Error");
                    }
                    while($row = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $row['departamento']; ?>"><?php echo $row['nombre']; ?></option>
                    <?php } ?>
                </select>
                <br>
                <label for="" class="form-label">Ciudad</label>
                <select class="form-select" aria-label="Default select example" name="cbx_municipio" id="cbx_municipio">
                </select>
                <br>
                <label for="" class="form-label">zona</label>
                <select class="form-select" aria-label="Default select example" name="cbx_localidad" id="cbx_localidad">
                </select>
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