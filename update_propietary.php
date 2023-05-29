<?php
include './include/authentication.php';
include("./include/inicia_conexion.php");
// Pasar los id's para edición


// $sql = "
//             update inmueble set nombre = ?, propietario = ?  where i.inmueble = ?;
//             ";

// $stmt = mysqli_prepare($conexion, $sql);
// mysqli_stmt_bind_param($stmt, "sii", $_POST['id'], $_POST['id']);
// mysqli_stmt_execute($stmt);
// mysqli_stmt_bind_result($stmt, $inmueble_nombre, $propietario_nombre, $habitaciones, $categoria_nombre, $zona, $dimension, $departamento, $ciudad, $descripcion);

// if (isset($_POST['register_propietary'])) {
//     if (strlen($_POST['propietario_nombre']) >= 1 && strlen($_POST['email']) && strlen($_POST['telefono']) >= 1) {
//         $name = trim($_POST['propietario_nombre']);
//         $telefono = trim($_POST['telefono']);
//         $email = trim($_POST['email']);
//         $consult = "INSERT INTO propietario(nombre, telefono, email) VALUES ('$name', '$telefono', '$email')";
//         $result = mysqli_query($conexion, $consult);
//         if ($result) {
//             ?>
//             <h1> Propietario ingresado exitosamente</h1>
//             <?php
//         } else {
//             ?>
//             <h1> Hijole </h1>
//             <?php
//         }
//     }
}
?>
<a href="./inmueble_update.php">Editar una propiedad</a>
<a href="./inmuebles.php">Ver más propiedades</a>