<?php session_start();

require 'conexion.php';
require 'functions.php';
   
$errores = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $password = hash('sha512', $password);

  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
  $statement->execute( 
    array(
        ':usuario' => $usuario,
        ':password' => $password    
    )    
  );
  $resultado = $statement->fetch();

  if ($resultado !== false) {
    $_SESSION['usuario'] = $usuario;
    header('Location: '.RUTA.'dashboard.php');
  } else {
    $errores .= '<li class="error">Tu usuario y/o contraseña son incorrectos</li>';
  }

}  
require 'views/login.view.php';

 ?>