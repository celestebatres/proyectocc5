<!-- Donde se hace el proceso de insert -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include './include/authentication.php';
include './include/inicia_conexion.php';
include './include/printconsole.php';

$inmueble_nombre = trim($_POST['inmueble_nombre']);
$propietario = trim($_POST['propietario']);
$categoria = trim($_POST['categoria']);
$zona = trim($_POST['cbx_localidad']); 
$dimension = trim($_POST['dimension']); 
$habitaciones = trim($_POST['habitaciones']);
$descripcion = trim($_POST['descripcion']);

if ((isset($_POST['venta'])) && (trim($_POST['venta']) == 'on')) {
    write_to_console("venta esta apachado");
    $tipo = "venta";
    $precio = trim($_POST['precio_venta']); 
                                      //por alguna extraña razon no manda el precio por POST cuando solo una casilla de precios esta llena, fijo tienen que estar las dos
}else if((isset($_POST['renta'])) && (trim($_POST['renta']) == 'on')){
    write_to_console("renta esta apachado");
    $tipo = "renta";
    $precio = trim($_POST['precio_renta']); 

}
write_to_console($tipo);
write_to_console($precio);
$estado = 1;
$fecha_modificacion = 'hoy';

if(isset($_POST['register_propietary'])) {
  if(strlen($inmueble_nombre) >= 1 && strlen($propietario) && strlen($categoria) >=1 && strlen($categoria) >=1 && strlen($departamento) >=1 && strlen($ciudad) >=1 && strlen($zona) >=1 && strlen($habitaciones) >=1 && strlen($descripcion) >=1  ) {
      
      $consult = "INSERT INTO inmueble(propietario, categoria, zona, nombre, dimension, habitaciones, descripcion) VALUES ('$propietario', '$categoria', '$zona', '$inmueble_nombre', '$dimension', '$habitaciones', '$descripcion')";
      $result = mysqli_query($conexion, $consult);

      $consult_i_tipo = "INSERT INTO inmueble_tipo(inmueble, tipo, precio) values ('$id', '$tipo', '$precio');";
      $result_i_tipo = mysqli_query($conexion, $consult_i_tipo);

      $consult_i_estado = "INSERT INTO inmueble_estado(inmueble, estado, fecha_modificacion) values ('$id', '$estado', '$fecha_modificacion');";
      $result_i_estado = mysqli_query($conexion, $consult_i_estado);

      if($result && $result_i_tipo && $result_i_estado){
          ?>
          <h1> Inmueble ingresado exitosamente</h1>
          <?php
      }else{
          ?> 
          <h1> Hijole </h1>
          <?php
      }
  }
}

?>