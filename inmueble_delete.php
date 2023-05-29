<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include './include/autenticacion.php';
    include("./include/inicia_conexion.php");

    echo $_POST['id'];

    // Eliminar inmueble y todas sus conexiones de relaciones - inmueble_cliente - inmueble_estado - inmueble_tipo - inmueble
    
    // $sql = "delete from socio_genero where codsocio = ?";
    // $stmt = mysqli_prepare($conexion, $sql);
    // mysqli_stmt_bind_param($stmt, "i", $_POST['id']);
    // mysqli_stmt_execute($stmt);

    // $sql = "delete from socio where codsocio = ?";
    // $stmt = mysqli_prepare($conexion, $sql);
    // mysqli_stmt_bind_param($stmt, "i", $_POST['id']);
    // mysqli_stmt_execute($stmt);
?>
