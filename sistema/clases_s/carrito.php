<?php


require '../config_s/config.php';
if(isset($_POST['ID'])){

    $id =$_POST['ID'];
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha1',$id , KEY_TOKEN);

    if($token == $token_tmp){
        if(isset($_SESSION['carrito']['servicio'][$id])){
            $_SESSION['carrito']['servicio'][$id] =1;
        }
        else{
            $_SESSION['carrito']['servicio'][$id]=1;
        }
        $datos['numero']=count($_SESSION['carrito']['servicio']);
        $datos['ok']=true;
    }else{
        $datos['ok']=false;
    }
}else{
    $datos['ok']=false;
}

echo json_encode($datos);
