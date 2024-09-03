<?php

$num_cart = 0;
if(isset($_SESSION['carrito']['servicio'])){
    $num_cart = count($_SESSION['carrito']['servicio']);
}

?>
<?php
require 'config_s/config.php';
require 'config_s/base.php';
$db = new Database();
$con =$db->conectar();

$servicios = isset($_SESSION['carrito']['servicio']) ? $_SESSION['carrito']['servicio']: null;



if ($servicios != null){
    foreach ($servicios as $clave => $cantidad){
        $sql = $con->prepare("SELECT ID, Nombre, Precio, Descripcion, Sexo, Cantidad_Personas FROM Servicios WHERE ID=? AND URLI=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);


    }
} else {
	header("location: Pagina2.php");
	exit;
		}
?>

<script>
    <?php session_start();

    require 'conexion.php';
    require 'functions.php';
    // comprobar session
    if (!isset($_SESSION['usuario'])) {
    header('Location: '.RUTA.'login.php');
    }
    $conexion = conexion($bd_config);
    $admin = iniciarSession('usuarios', $conexion);

    if ($admin['tipo_usuario'] == 'usuario') {
    // traer el nombre del usuario
    $user = iniciarSession('usuarios', $conexion);

    } else {
    header('Location: '.RUTA.'index.php');
    }
    ?>
</script>

<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>carta</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	
	<!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


	<script>
		window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
	</script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/estilos (1).css"> 
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilo-card.css">
    <link rel="stylesheet" href="css/EstiloNavbar.css">
    <link rel="stylesheet" href="css/EstiloCarrusel.css">
    <link rel="stylesheet" href="css/Testimonios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5a2dd7aaae.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
	</head>
<body>



	<div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2"></h6>
                        <h4 class="display-4">Realiza tu pago: </h4>
                    </div>
                </div>
            </div>   
        </div>
    </div>



	<main>
    <section id="price">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">			
	<main>
		<div class="container text-center">

		<div class="row">
			<div class="col-6">
				<h4>Detalles de pago</h4>
				<div id="paypal-button-container"></div>
			</div>
			<div class="col-6">

			<div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><h5><b>PRODUCTO</b></h5></th>

                            <th><h5><b>SUBTOTAL</b></h5></th>
                            <th></th>

                            <br>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        }else{
                            $total =0;
                            foreach($lista_carrito as $producto){
                                $id =$producto['ID'];
								$nombre =$producto['Nombre'];
                                $precio =$producto['Precio'];
                                $subtotal =$cantidad * $precio;
                                $total +=$subtotal;
								$total_IVA = $total + (($total * 16)/100);
                        ?>

                        <tr>
                            <td><h5><?php echo $nombre ?></h5</td>
                            
                            <td>

                            <td><h5>
                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.'); ?></div>
							</h5></td>
                            
						</tr>
                        <?php } ?>
                    </tbody>
					<tr>
                          
                          <td colspan="2">
                            <p class="h3 text-right" id="total"><?php echo MONEDA . number_format($total_IVA,"2",'.',',');?></p> <center>--IVA incluido--</center>
							</td>
                    </tr>
                    
                </table>
                <div class="col-md-10 order-md-8 text-left">
						<a href="Pagina2.php" class="btn btn-danger">Cancelar</span></a>
				</div>
                <br>
                <?php } ?>
			 
            </div>



	
	
	
	
	<!--<div class="container">
							<a class="btn btn-default pull-right wow bounceIn" data-wow-duration="500ms" data-wow-delay="1200ms"
								href="index.php" role="button">Volver</a>-->
                            
							<!---<a class="btn btn-default pull-right wow bounceIn" data-wow-duration="500ms" data-wow-delay="1200ms"
								href="#" role="button">More Info
							</a>-->
                            </tr>
							</tbody>
							</div>
							</div>
						</div>
					</div>
				</div><!-- .col-md-12 close -->
			</div><!-- .row close -->
		</div><!-- .containe close -->
	</section><!-- #price close -->
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="js/sweetalert2.min.js"></script>
<script src="js/productos.js"></script>

<script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY ?>"></script>

<script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total_IVA; ?>
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
				let URL = 'clases/captura.php'
                actions.order.capture().then(function (detalles){
                    
					console.log(detalles);
					let url = 'clases/captura.php'
                    window.location.href="Pagina2.php"
					return fetch(url, {
						method: 'post',
						headers: {
							'content-type': 'application/json'
						},
						body: JSON.stringify({
							detalles: detalles
						})
					})
                });
            },

            onCancel: function(data){
                alert("Pago cancelado");
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>


<!--<script src="js/pedido.js"></script>--->



</body>
</html>