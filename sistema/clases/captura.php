<?php

require '../config/config.php';
require '../config/base.php';
$db = new Database();
$con = $db->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
print_r($datos);

if (is_array($datos)){

    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];
    
    $sql = $con->prepare("INSERT INTO compra(ID_transaccion, Fecha, status, Email, ID_cliente, toal) VALUES (?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);
    $id = $con->lastInsertId();

    if( $id > 0){

        $productos = isset($_SESSION['carrito_p']['producto']) ? $_SESSION['carrito_p']['producto']: null;

        if ($productos != null){
            foreach ($productos as $clave => $cantidad){
                $sql = $con->prepare("SELECT ID, Nombre, Precio FROM productos WHERE id=? AND URLI=1");
                $sql->execute([$clave]);
                $row_prod = $sql->fetch(PDO::FETCH_ASSOC);
        
                $sql_insert = $con->prepare("INSERT INTO detalle_compra (ID_compra, ID_producto, Nombre, Cantidad, Precio) VALUES (?,?,?,?,?)");
                $sql_insert->execute([$id, $clave, $row_prod['Nombre'], $cantidad, $row_prod['Precio']]);

            }
        }
        unset($_SESSION['carrito_p']);

    }

}
