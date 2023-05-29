<?php
include './include/authentication.php';
include("./include/inicia_conexion.php");

if(isset($_POST['register_propietary'])) {
    if(strlen($_POST['propietario_nombre']) >= 1 && strlen($_POST['email']) && strlen($_POST['telefono']) >=1 ) {
        $name = trim($_POST['propietario_nombre']);
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $consult = "INSERT INTO propietario(nombre, telefono, email) VALUES ('$name', '$telefono', '$email')";
        $result = mysqli_query($conexion, $consult);
        if($result){
            ?>
            <h1> Propietario ingresado exitosamente</h1>
            <?php
        }else{
            ?> 
            <h1> Hijole </h1>
            <?php
        }
    }
}
?>
<a href="./inmueble_nuevo.php">Publicar una propiedad</a>
<a href="./propietario_nuevo.php">Regresar a generar otro propietario</a>