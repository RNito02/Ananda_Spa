


<?php

if(isset($_POST['btnAccion'])){
    
    switch($_POST['btnAccion']){
        case 'Agregar':
            if(is_numeric( openssl_decrypt($_POST['ID'],COD,KEY))){
                $ID=openssl_decrypt($_POST['ID'],COD,KEY);
                $mensaje.="OK ID correcto".$ID."<br/>";

            } else{
                $mensaje.="Upsss... ID incorrecto".$ID."<br/>";
            }

            if(is_string( openssl_decrypt($_POST['Nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['Nombre'],COD,KEY);
                $mensaje.="OK nombre".$NOMBRE."<br/>";

            } else{
                $mensaje.="Upsss... Nombre incorrecto".$NOMBRE."<br/>"; break;
            }

            if(is_string( openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="OK nombre".$CANTIDAD."<br/>";

            } else{
                $mensaje.="Upsss... cantidad incorrecta".$CANTIDAD."<br/>"; break;
            }

            if(is_string( openssl_decrypt($_POST['Precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['Precio'],COD,KEY);
                $mensaje.="OK nombre".$PRECIO."<br/>";

            } else{
                $mensaje.="Upsss... Precio incorrecto".$PRECIO."<br/>"; break;
            }

            

            if(!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                    'Talla'=>$Talla,
                    'Color'=>$Color,
                    
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{

                $idProductos=array_column($_SESSION['CARRITO'],"ID");
                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya a sido seleccionado');</script>";
                    $mensaje= "";

                }else{

                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'PRECIO'=>$PRECIO,
                    'CANTIDAD'=>$CANTIDAD,
                    'Talla'=>$Talla,
                    'Color'=>$Color,
                );
                $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                $mensaje="Producto agregado al carrito";
                }

            }
            


            break;
            case "Eliminar":
                if(is_numeric( openssl_decrypt($_POST['ID'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['ID'],COD,KEY);
                    
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('Elemento borrado')</script>";

                        }

                    }
    
                } else{
                    $mensaje.="Upsss... ID incorrecto".$ID."<br/>";
                }
            break;

    }
}

?>