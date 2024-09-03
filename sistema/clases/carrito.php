<?php


require '../config/config.php';
if(isset($_POST['ID'])){

    $id =$_POST['ID'];
    $token = $_POST['token'];

    $token_tmp = hash_hmac('sha1',$id , KEY_TOKEN);

    if($token == $token_tmp){
        if(isset($_SESSION['carrito_p']['producto'][$id])){
            $_SESSION['carrito_p']['producto'][$id] +=1;
        }
        else{
            $_SESSION['carrito_p']['producto'][$id]=1;
        }
        $datos['numero']=count($_SESSION['carrito_p']['producto']);
        $datos['ok']=true;
    }else{
        $datos['ok']=false;
    }
}else{
    $datos['ok']=false;
}

echo json_encode($datos);
