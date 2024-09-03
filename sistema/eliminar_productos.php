<?php session_start();

require 'conexion.php';
require 'functions.php';
  
// comprobar session
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'administrador') 
  // traer el nombre del usuario
  $user = iniciarSession('usuarios', $conexion);

  elseif ($admin['tipo_usuario'] == 'empleado') {
    // traer el nombre del usuario
    $user = iniciarSession('usuarios', $conexion);
  
} else {
  header('Location: '.RUTA.'index.php');
}

?>
<?php
	$ID= $_GET['ID'];
	include("cnn.php");

	$sql="DELETE from Productos where ID='".$ID."'";
	$resultado = mysqli_query($conexion, $sql);

	if($resultado){
		echo"<script languaje='JavaScrip'>
		alert('Los datos se eliminaro correctamente');
		window.location='/sistema/Editar_Productos.php'</script>;
        </Script>"
        ;
	
	}
?>