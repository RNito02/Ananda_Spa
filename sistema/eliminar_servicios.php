<?php
	$ID= $_GET['ID'];
	include("cnn.php");

	$sql="DELETE from Servicios where ID='".$ID."'";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado){
		echo"<script languaje='JavaScrip'>
		alert('Los datos se eliminaro correctamente');
		window.location='/sistema/Editar_Productos.php'</script>;
        </Script>"
        ;
	
	}
?>