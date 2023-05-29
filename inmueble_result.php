<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include("./include/inicia_conexion.php");

$sql = "select i.nombre as inmueble_nombre, i.habitaciones as habitaciones, cat.nombre as categoria, z.nombre as zona, i.descripcion, d.nombre as departamento, c.nombre as ciudad ,i.descripcion as descripcion from inmueble i
    inner join propietario p on i.propietario = p.propietario
    inner join categoria cat on i.categoria = cat.categoria
    inner join zona z on i.zona = z.zona
    inner join ciudad c on z.ciudad = c.ciudad
    inner join departamento d on c.departamento = d.departamento;";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $inmueble_nombre, $habitaciones, $categoria_nombre, $zona, $descripcion, $departamento, $ciudad, $descripcion);


?>