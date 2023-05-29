<?php
    include("printconsole.php");
	require ('conexion.php');
	
	$id_estado = $_POST['id_estado'];
    write_to_console($id_estado);
	$queryM = "SELECT `ciudad`, `departamento`, `nombre` FROM `ciudad` WHERE `departamento` = $id_estado";
	$resultadoM = $mysqli->query($queryM);
	if($resultadoM){
        write_to_console("Bueno sql ciudad");
    }else{
        write_to_console("Error");
    }
	$html= "<option value='0'>Seleccionar Ciudad</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['ciudad']."'>".$rowM['nombre']."</option>";
	}
	
	echo $html;
?>