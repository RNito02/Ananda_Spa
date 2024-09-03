<?php

require 'config/config.php';
require 'config/base.php';
$db = new Database();
$con =$db->conectar();

$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Hubo un error al procesar la petición';
    exit;
}else{

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp){
        $sql = $con->prepare("SELECT count(ID) FROM Productos WHERE ID=? AND URLI=1");
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0){
            $sql = $con->prepare("SELECT Nombre, Precio, Marca, Color, Talla, Stock FROM Productos WHERE ID=? AND URLI=1 LIMIT 1");
            $sql->execute([$id]);
            $row =$sql->fetch(PDO::FETCH_ASSOC);

            $Nombre = $row['Nombre'];
            $Precio = $row['Precio'];
			$Marca = $row['Marca'];
			$Color = $row['Color'];
			$Talla = $row['Talla'];
			$Stock = $row['Stock'];

        }else{
			echo 'Hubo un error al procesar la petición';
			exit;}
    }else{
        echo 'Hubo un error al procesar la petición';
        exit;
    }
}
$sql = $con->prepare("SELECT ID, Precio, Marca, Color, Talla, Stock FROM Productos WHERE URLI=1");
$sql->execute();
$resultado =$sql->fetchAll(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Detalle del Producto</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<style>
    body
	{
		background-color: #71E7F0;
	}
</style>
<br>
	<body>
	<section id="price">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
							<div class="col-md-10 order-md-8 text-left">
								<a href="checkout.php" class="btn btn-primary">Ir al carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
							</div>
							</div>
							<h1 class="heading wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
						<h1>Estos son los detalles del producto:	
						</h1>
					</div>	


				</div>
			</div>
		</div>
	</section>
		<main>
			<section id="price">
				<div class="container">
					<div class="row">
					<div class="card-body col-md-5 order-md-9 text-right">
                                <table id="datatablesSimple">
                                    <thead>
										<tr>
										<h2>Producto: <?php echo $Nombre; ?></h2>
										<h2>Precio de: <?php echo MONEDA . number_format($Precio, 2, '.', ','); ?></h2>
										<p class="lead">
										<h2>Marca: <?php echo $Marca; ?></h2>
										<h2>Color: <?php echo $Color; ?></h2>
										<h2>Talla: <?php echo $Talla; ?></h2>
										<h2>Stock: <?php echo $Stock; ?></h2>
										</tr>
                                    </thead>
								</table>
					</div>
						<div class="col-md-5 order-md-9 text-right">
							<div class="col-md-10 order-md-8 text-left">
						
								<br>
								<div class="d-grid gap-4 col-8 mx-auto">
									<button class="btn-lg btn-warning" type="button" onclick="addProducto(<?php  echo $id;?>, '<?php echo $token_tmp; ?>')">Agregar al carrito</button>
								</div>
								<br>
								<a type="button" class="btn btn-primary btn-xs d-grid gap-4 col-8 mx-auto" href="Productos.php">Volver al catalogo</a>		
							</div>
						</div>			
					</div>
				</div>
			</section>
		</main>
		<br>
		<br>
								
	<script src="js/productos.js"></script>
		<script>
			function addProducto(id,token){
				let url = 'clases/carrito.php'
				let formData = new FormData()
				formData.append('ID',id) 
				formData.append('token',token) 

				fetch(url,{
				method: 'POST',
				body: formData,
				mode:'cors'
				})
				.then(response => response.json())
				.then(data => {
				if(data.ok){
					let elemento = document.getElementById("num_cart")
					elemento.innerHTML = data.numero
				}
				})
				
				}
		</script>
	</body>
</html>
