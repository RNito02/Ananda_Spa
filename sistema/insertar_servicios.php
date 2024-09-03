<?php

    include ("cnn.php");
    

    $Nombre = $_POST["Nombre"];
    $Precio = $_POST["Precio"];
    $Descripcion  = $_POST["Descripcion"];
    $Sexo = $_POST["Sexo"];
    $Cantidad_Personas = $_POST["Cantidad_Personas"];

    $URLI = $_POST["URLI"];


 
    $insertar = "INSERT INTO Servicios(Nombre, Precio, Descripcion, Sexo, Cantidad_Personas, URLI) VALUES 
    ('$Nombre', '$Precio', '$Descripcion', '$Sexo', '$Cantidad_Personas', '$URLI') ";

    $resultado = mysqli_query ($conexion, $insertar);

    if($resultado){
        echo "<script>alert ('Se ha agregado el producto');
        window.location='/sistema/Table_Servicios.php'</script>";
    }
    else{
        echo "<script>alert ('No se ha agregado el producto');</script>";
    }

    
?>
