<?php
require '../config_s/config.php';
require '../config_s/base.php';

if(isset($_POST['action'])){
    $action=$_POST['action'];
    $id=isset($_POST['ID'])? $_POST['ID']:0;

    if($action == 'agregar'){
        $cantidad =isset($_POST['cantidad'])? $_POST['cantidad']:0;  
        $respuesta=agregar($id,$cantidad);
        if($respuesta >0){
            $datos['ok'] =true;
        }else{
            $datos['ok'] =false;
        }
        $datos['sub'] = MONEDA . number_format($respuesta,2,'.');
    }else if($action == 'eliminar'){
        $datos['ok'] = eliminar($id);
    } else{
        $datos['ok'] = false;}
}else{
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($id,$cantidad){
    $res=0;

    if($id >0 && $cantidad >0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['servicio'][$id])){
            $_SESSION['carrito']['servicio'][$id]=$cantidad;

            $db= new Database();
            $con =$db->conectar();
            $consulta=("SELECT precio FROM Servicios WHERE ID = ? AND URLI = 1 LIMIT 1");
            $resultado->$db->prepare($consulta); 
            $resultado=execute();
            $row =$resultado->fetch(PDO::FETCH_ASSOC);

            $precio = $row['precio'];
            $res = $cantidad * $precio;

            return $res;
        }
    }else{
        return $res;
    }
}

function eliminar($id){
    if($id > 0){
        if(isset($_SESSION['carrito']['servicio'][$id])){
            unset($_SESSION['carrito']['servicio'][$id]);
            return true;
        }
        else {
            return false; 

        }
    }
}

?>