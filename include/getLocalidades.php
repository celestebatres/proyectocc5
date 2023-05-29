<?php
	require ('conexion.php');
	
	$id_municipio = $_POST['id_municipio'];
	
	$query = "SELECT `zona`, `ciudad`, `nombre` FROM `zona` WHERE `ciudad` = $id_municipio;";
	$resultado=$mysqli->query($query);
    $html= "<option value='0'>Seleccionar Zona</option>";
	while($row = $resultado->fetch_assoc())
	{
		$html.= "<option value='".$row['zona']."'>".$row['nombre']."</option>";
	}
	echo $html;
?>