<?php

$num_cart = 0;
if(isset($_SESSION['carrito_p']['producto'])){
    $num_cart = count($_SESSION['carrito_p']['producto']);
}

?>
<?php
require 'config/config.php';
require 'config/base.php';
$db = new Database();
$con =$db->conectar();

$sql = $con->prepare("SELECT ID, Nombre, Precio, Marca, Color, Talla, Stock FROM Productos WHERE URLI=1 ");
$sql->execute();
$resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Produdos - Ananda</title>
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
    <link href="CSS_compra/style.css" rel="stylesheet">

    
    
	<script>
		window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
	</script>
	<script src="JS_compra/jquery.nav.js"></script>
	<script src="JS_compra/jquery.sticky.js"></script>
	<script src="JS_compra/bootstrap.min.js"></script>
	<script src="JS_compra/plugins.js"></script>
	<script src="JS_compra/wow.min.js"></script>
	<script src="JS_compra/main.js"></script>

	<script src="https://kit.fontawesome.com/5a2dd7aaae.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="css/estilos (1).css">
    <link rel="stylesheet" href="css/estilos2.css">

    <link rel="stylesheet" href="css/EstiloNavbar.css">
 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5a2dd7aaae.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
	</head>
<style>
    body
	{
		background-color: #1baab4;
	}
	.tabla
            {
                background-color: rgb(235, 235, 235);
                font-family: "Comic Sams Ms";
            }
	.alert2
        {
            font-family: "Comic Sams Ms";
        }
    </style>
<body class="sb-nav-fixed">
  <div id='navbar'>
    <ul>
	<li><a href="Close.php">Cerrar sesion</a></li>		
      <li><a href="Pagina1.php">ANANDA SPA</a></li>
      <li><a href="Pagina2.php">TODOS LOS SERVICIOS</a></li>
      <li><a href="Productos.php">NUESTROS PRODUCTOS</a></li>
      <li><a href="Pagina4.php">TESTIMONIOS</a></li>
      <li><a href="Pagina6.php">MAPA DEL SITIO</a></li>

	  <a href="checkout.php" class="btn btn-primary">carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
      </li>
    </ul>
  </div>


  <section id="slider" class="pt-5">
    <div class="container">
      <h1 class="text-center alert alert-danger alert2" role="alert">¡CONOCE TODOS NUESTROS PRODUCTOS Y OBTEN EL TUYO!</h1>
    </div>
  </section>
								
    			
	<main>
	<div class="card-body">
        <table id="datatablesSimple">

		<div class="container text-center">
			<div class="row">
				<?php foreach($resultado as $row){ ?>
				<div class="col-sm-3 d-block w-100">
					<div class="card shadow-md">
						<?php
						$id=$row ['ID'];
						$imagen ="Img_productos/Productos/". $id."/1.png";
	
						if(!file_exists($imagen)){
							$imagen="images/no-photo.png";
						}
	
						?>
						<img src="<?php echo $imagen; ?>">
						<br>
						
						<div class="card-body">
							<h5 class="card-tittle"><?php echo $row['Nombre']; ?></h5>
							<h6 class="card-text mb-3 mt-3">$<?php echo $row['Precio']; ?></h6>
                            <h6 class="card-text mb-3 mt-3"><?php echo $row['Marca']; ?></h6>
                            <h6 class="card-text mb-3 mt-3"><?php echo $row['Color']; ?></h6>
                            <h6 class="card-text mb-3 mt-3"><?php echo $row['Talla']; ?></h6>
                            <h6 class="card-text mb-3 mt-3"><?php echo $row['Stock']; ?></h6>
							
							<div class=" ">
								<br>
								<div class="btn-group">
								<a href="detalle.php?ID=<?php echo $row['ID']; ?>&token=<?php echo 
                                    hash_hmac('sha1',$row['ID'],KEY_TOKEN); ?>" class="btn-lg btn-primary  mb-3" >Detalles</a>
								</div>
								
							
							</div>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		   </div>
		 </table>
	   </div>
	</main>


	
	
	<!--<div class="container">
							<a class="btn btn-default pull-right wow bounceIn" data-wow-duration="500ms" data-wow-delay="1200ms"
								href="index.php" role="button">Volver</a> -->
                            
							<!---<a class="btn btn-default pull-right wow bounceIn" data-wow-duration="500ms" data-wow-delay="1200ms"
								href="#" role="button">More Info
							</a>-->
                            </tr>
							</tbody>
						</div>
					</div>
				</div><!-- .col-md-12 close -->
			</div><!-- .row close -->
		</div><!-- .containe close -->
	</section><!-- #price close -->
</main>
<script src="JS_compra/sweetalert2.min.js"></script>
<script src="JS_compra/productos.js"></script>

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


<br>
<footer class="pie-pagina">
	  <div class="grupo-1">
		  <div class="box">
			  <figure>
				  <a href="Pagina1.HTML">
					  <img src="img/Ln.jpg" alt="Logo de SLee Dw">
				  </a>
			  </figure>
		  </div>
		  <div class="box">
			  <h2>SOBRE NOSOTROS</h2>
			  <p>En Ananda <i>Spa</i> podras disfrutar de grandes servicios con increibles resultados garantizados.</p>
			  <p>Tu mejor opción en cuidado y atencion para tu cuerpo. No te quedes con las ganas ven con nosotros y cambia tu vida por completo.</p>
		  </div>
		  <div class="box">
			  <h2>SIGUENOS</h2>
			  <div class="red-social">
				  <a href="https://www.facebook.com/veronica.vergaracorro" class="fa fa-facebook" target="_blank"></a>
				  <a href="#" class="fa fa-instagram"></a>
				  <a href="#" class="fa fa-twitter"></a>
				  <a href="#" class="fa fa-youtube"></a>
			  </div>
			  <br>
			  <h6 style="color: #e3f2fd;">TAMBIEN PUEDES VISITARNOS EN NUESTRA DIRECCION: <U>La piedad #125 entre Zaragoza y Lazaro Cardenas</U></h6>
		  </div>
		  <div class="box">
			<h2>HORARIOS:</h2>
			<p>De Lunes a Viernes de 10:00 AM a 9:00 PM</p>
			<p>Sabados 10:00 AM a 4:00 PM</p>
		  </div>
	  </div>
	  <div class="grupo-2">
		  <small>&copy; 2022 <b>Ananda <i>Spa</i></b> - Todos los Derechos Reservados.</small>
	  </div>
  </footer>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

</body>
</html>
