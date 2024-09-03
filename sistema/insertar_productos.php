<?php

    include ("cnn.php");
    
    $Nombre  = $_POST["Nombre"];
    $Precio  = $_POST["Precio"];
    $Marca  = $_POST["Marca"];
    $Color  = $_POST["Color"];
    $Talla  = $_POST["Talla"];
    $Stock  = $_POST["Stock"];
    $URLI  = $_POST["URLI"];
 
    $insertar = "INSERT INTO Productos(Nombre, Precio, Marca, Color, Talla, Stock, URLI) VALUES 
    ('$Nombre', '$Precio', '$Marca', '$Color', '$Talla', '$Stock', '$URLI') ";

    $resultado = mysqli_query ($conexion, $insertar);

    if($resultado){
        echo "<script>alert ('Se ha agregado el producto');
        window.location='/sistema/tables.php'</script>";
    } 
    else{
        echo "<script>alert ('No se ha agregado el producto');</script>";
    }

    
?>
