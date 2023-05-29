<!-- Donde se hace el proceso de insert -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include './include/inicia_conexion.php';

$id = null;
$inmueble_nombre = $_POST['inmueble_nombre'];
$propietario = $_POST['propietario'];
$categoria = $_POST['categoria'];
$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];
$zona = $_POST['zona']; //String -- Hacer comparaciones con string
$habitaciones = $_POST['habitaciones'];
$descripcion = $_POST['descripcion'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  echo ($inmueble_nombre . $propietario . $categoria . $departamento . $ciudad . $zona . $habitaciones . $descripcion)
  ?>
</body>
</html>