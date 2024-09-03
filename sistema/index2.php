<?php session_start();

require 'conexion.php';
require 'functions.php';

// comprobar session
if (isset($_SESSION['usuario'])) {
  // validar los datos por privilegio
  $conexion = conexion($bd_config);
  $usuario = iniciarSession('usuarios', $conexion);
 
  if ($usuario['tipo_usuario'] == 'administrador') {
    header('Location: '.RUTA.'Dashboard.php');
  } elseif ($usuario['tipo_usuario'] == 'usuario') {
    header('Location: '.RUTA.'Pagina1.html');
  } else {
    header('Location: '.RUTA.'500.html');
  }
} else {
  header('Location: '.RUTA.'500.html');
} 
?>