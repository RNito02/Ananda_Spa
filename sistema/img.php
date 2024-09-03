<?php session_start();

require 'conexion.php';
require 'functions.php';
  
// comprobar session
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'usuario') {
  // traer el nombre del usuario
  $user = iniciarSession('usuarios', $conexion);

} else {
  header('Location: '.RUTA.'index.php');
}
?>