<?php session_start();

require 'conexion.php';
require 'functions.php';

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

        header('Location: '.RUTA.'login.php');

    }
}

require 'views/registro.view.php';

?>