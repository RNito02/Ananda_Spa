<?php session_start();

require 'views/registro.administrador.view.php';
require 'conexion.php';
require 'functions.php';


// comprobar session
if (!isset($_SESSION['usuario'])) {
    header('Location: '.RUTA.'login.php');
  }
  
  $conexion = conexion($bd_config);
  $admin = iniciarSession('usuarios', $conexion);
  
  if ($admin['tipo_usuario'] == 'administrador') {
    // traer el nombre del usuario
    $user = iniciarSession('usuarios', $conexion);
  
  
    
  } else {
    header('Location: '.RUTA.'index.php');
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $ciudad = limpiarDatos($_POST['ciudad']);
    $direccion = limpiarDatos($_POST['direccion']);
    $nombre_completo = limpiarDatos($_POST['Nombre_Completo']);
    $password = hash('sha512', $password);
    $rol = $_POST['rol'];

    $errores = '';

    // validar los campos de texto
    if (empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    }else{
        // validacion de que el usuario no exista
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(
            ':usuario' => $usuario
        ));
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<li class="error">Este usuario ya existe</li>';
        }
    }
 
    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario,  password, ciudad, direccion, nombre_completo, tipo_usuario) VALUES(null, :usuario, :password, :ciudad, :direccion, :nombre_completo, :tipo_usuario)');
        $statement->execute(
            array(
                ':usuario' => $usuario,
                ':password' => $password,
                ':ciudad' => $ciudad,
                ':direccion' => $direccion,
                ':nombre_completo' => $nombre_completo,
                ':tipo_usuario' => $rol
            )    
        );

        header('Location: '.RUTA.'index2.php');

    }
}

?>
