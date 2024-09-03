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

$sql = $con->prepare("SELECT ID, Nombre, Precio, Descripcion, Sexo, Cantidad_Personas FROM Servicios WHERE URLI=1 ");
$sql->execute();
$resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" href="css/estilos (1).css">
<link rel="stylesheet" href="css/estilos2.css">
<link rel="stylesheet" href="css/EstiloNavbar.css">

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
</head>
<body>
	<div id='navbar'>
		<ul>
				<li><a href="Close.php">Cerrar sesion</a></li>		
				<li><a href="Pagina1.php">ANANDA SPA</a></li>
				<li><a href="Pagina2.php">TODOS LOS SERVICIOS</a></li>
				<li><a href="Productos.php">NUESTROS PRODUCTOS</a></li>
				<li><a href="Pagina4.php">TESTIMONIOS</a></li>
				<li><a href="Pagina6.php">MAPA DEL SITIO</a></li>
					

				<li>
				<a href="checkout_s.php" class="btn btn-primary">carrito <span id="num_cart" class="badge bg-secondary"><?php echo $num_cart; ?></span></a>
				</li>
		</ul>
	  </div> 
      <br>
<section id="slider" class="pt-5">
  <div class="container">
    <h1 class="text-center alert alert-danger alert2" role="alert">¡CONOCE TODOS NUESTROS SERVICIOS Y OBTEN EL TUYO!</h1>
	  <div class="slider">
				<div class="owl-carousel">
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/spa3.jpg" alt="" >
						</div>
						<h5 class="mb-0 text-center"><b>DEPILASION LASER</b></h5>
						<p class="text-center p-4">La depilación láser es un procedimiento médico que utiliza un rayo concentrado de luz (láser) para eliminar el vello no deseado. Durante la depilación láser, un láser emite una luz que es absorbida por el pigmento (melanina) del vello. La energía lumínica se convierte en calor, que daña los sacos en forma de tubo dentro de la piel (folículos pilosos) que producen vellos. Este daño inhibe o retrasa el crecimiento futuro del vello.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/c3.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>VACUMTERAPIA</b></h5>
						<p class="text-center p-4">La vacumterapia es un procedimiento no invasivo, mecánico mediante aparatología que permite succionar la piel y los tejidos que se encuentran debajo de la piel, de manera tal que realiza una situación de masaje de presión negativa, empujando los tejidos y la piel desde el interior al exterior.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/c4.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>CAVITACION</b></h5>
						<p class="text-center p-4">La cavitación es un tratamiento estético sin cirugía cuyo propósito es la eliminación de acumulaciones de grasa localizada, favoreciendo la reducción de volumen corporal a través de la utilización de ultrasonidos de baja frecuencia. Se trata de un proceso no invasivo con una muy alta eficacia, llevado a cabo mediante máquinas de cavitación muy sofisticadas y precisas a bajas frecuencias.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Spa2.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>BOTOX</b></h5>
						<p class="text-center p-4">La toxina botulínica, más conocida como botox, es en realidad la toxina que produce el botulismo. Sin embargo, se aprovecha su capacidad de producir parálisis muscular para utilizarla con fines médicos en el tratamiento de ciertas enfermedades neurológicas y en medicina estética para las arrugas de expresión, que es por lo que más se la conoce.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/c6.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>RINOMODELACION</b></h5>
						<p class="text-center p-4">La rinomodelación es un tratamiento que se realiza en consulta para corregir, armonizar y embellecer la forma de la nariz. Para ello, se utilizan sustancias reabsorbibles de relleno, como el ácido hialurónico, con el objetivo de moldear la nariz, hasta lograr el efecto deseado. </p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/spa4.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>MASAJES LINFÁTICOS</b></h5>
						<p class="text-center p-4">El drenaje linfático es un masaje que actúa sobre los vasos linfáticos con el fin de eliminar el líquido intersticial y linfático. El drenaje linfático consiste en un masaje suave y repetitivo, cuyo ritmo, más lento que el del masaje tradicional, y la adherencia a la piel sin la ayuda de productos favorecen la activación de la linfa y la eliminación de los líquidos estancados.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Lipolaser.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>LIPO-LASER</b></h5>
						<p class="text-center p-4">El lipoláser consiste en una liposucción mínimamente invasiva. Se trata de una técnica que lleva poco más de una década realizándose y que consigue grandes resultados a la hora de reducir o eliminar grasa logrando una recuperación muy rápida. Con esta técnica se consigue eliminar grasa, moldear el cuerpo y reducir la llamada celulitis o "piel de naranja" de manera totalmente no invasiva, a través de la aplicación de energía láser mediante ondas precisas.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/facial.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>LIMPIEZA FACIAL</b></h5>
						<p class="text-center p-4">Una limpieza consiste en limpiar la piel a fondo, hidratarla y fotoprotegerla. Ayuda a eliminar los rastros de suciedad, maquillaje, sebo, contaminación y células muertas de la piel.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Relleno.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>RELLENO DE LABIOS</b></h5>
						<p class="text-center p-4">La técnica consiste en inyectar ácido hialurónico en los labios para aumentar su grosor, para destacar el perfilado y para elevar las comisuras. Esto se puede hacer con una cánula o con varias inyecciones mediante agujas muy finas dependiendo del paciente.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Hilos.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>HILOS TENSORES</b></h5>
						<p class="text-center p-4">Los hilos tensores son unos hilos finos utilizados en Medicina Estética para rejuvenecer el rostro. Se pueden aplicar tanto para eliminar las arrugas y la flaccidez facial, como para levantar las cejas o, incluso, para redefinir el óvalo de la cara y el contorno de la mandíbula.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Despigmentacion.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>DESPIGMENTACION</b></h5>
						<p class="text-center p-4">Es un procedimiento medico-estético, para solucionar el problema de la hiper-pigmentación de la piel (coloración oscura de la cara que aparece lentamente). Común en personas de más de 30 años y en ancianos, y lo parecen más las mujeres que los hombres (1 de cada 20 es hombre).</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Radiofrecuencia.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>RADIOFRECUENCIA</b></h5>
						<p class="text-center p-4">La radiofrecuencia consiste en la aplicación de ondas electromagnéticas de alta frecuencia sobre la piel que provoca el calentamiento controlado de las diferentes capas de la dermis, lo que favorece: La formación de nuevo colágeno, El drenaje linfático, La circulación de la piel y el tejido subcutáneo, La migración de fibroblastos.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/Mesoterapia.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>MESOTERAPIA</b></h5>
						<p class="text-center p-4">La mesoterapia es un tratamiento de medicina que se utiliza generalmente para la eliminación de la celulitis, el rejuvenecimiento facial, bajar peso mediante la eliminación de bolsas de grasa localizada y el tratamiento de ciertos tipos de alopecia. Se basa en la aplicación de microinyecciones en la piel de distintos tipos de medicamentos (homeopáticos, vitaminas, minerales o aminoácidos), según los objetivos del tratamiento. Es una técnica indolora.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/maderoterapia.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>MADEROTERAPIA</b></h5>
						<p class="text-center p-4">Es una terapia natural que consiste en estimular el cuerpo mediante una técnica de masaje con utensilios de madera. Mediante movimientos y presión en puntos del cuerpo se busca una reacción de bienestar, reducir los niveles de estrés, y aliviar los dolores musculares y articulares.</p>
					</div>
					<div class="slider-card">
						<div class="d-flex justify-content-center align-items-center mb-4">
							<img src="img/masajes.jpg" alt="">
						</div>
						<h5 class="mb-0 text-center"><b>MASAJES RELAJANTES</b></h5>
						<p class="text-center p-4">El masaje relajante consiste en la realización de maniobras superficiales en las que la intensidad de la presión es suave y el ritmo lento y reiterativo, de manera que al recibir un contacto repetido y constante, se pierde la sensación de dolor y los músculos se relajan.</p>
					</div>
				</div>
			</div>
  </div>
</section>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/script.js"></script>
	<br>
	<div class="container">
		<h1 class="text-center alert alert-danger alert2">
			LISTA DE PRECIOS EN NUESTROS SERVICIOS
		</h1>
	  </div>
		<table class="container table table-bordered table-hover tabla">
			<thead>
				<tr>
					<th>TIPO DE SERVICIO</th>
					<th>DURACION</th>
					<th>PERSONAS</th>
					<th>COSTO</th>
				</tr>
			<tbody>
		</tbody>
		<tbody>
		  <tr>
			  <td>RINOMODELACION</td>
			  <td>DEPENDE LA CANTIDAD A TRATAR</td>
			  <td>1</td>
			  <td>DEPENDE LA CANTIDAD A TRATAR</td>
		  </tr>
	  </tbody>
	  
	  <tbody>
		<tr>
			<td>DESPIGMENTACION</td>
			<td>DEPENDE LA CANTIDAD A TRATAR</td>
			<td>1</td>
			<td>DEPENDE LA CANTIDAD A TRATAR</td>
		</tr>
	  </tbody>
	  <tbody>
		<tr>
			<td>RADIOFRECUENCIA</td>
			<td>DEPENDE LA CANTIDAD A TRATAR</td>
			<td>1</td>
			<td>DEPENDE LA CANTIDAD A TRATAR</td>
		</tr>
	  </tbody>
	  <tbody>
		<tr>
			<td>MASAJES RELAJANTES</td>
			<td>DEPENDE LA CANTIDAD A TRATAR</td>
			<td>1</td>
			<td>DEPENDE LA CANTIDAD A TRATAR</td>
		</tr>
	  </tbody>
		</table>
	  </div>

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
						$imagen ="Img_servicios/Servicios/". $id."/1.jpg";
	
						if(!file_exists($imagen)){
							$imagen="images/no-photo.png";
						}
	
						?>
						<img src="<?php echo $imagen; ?>" width="1115px" height="550">
						<br>
						<br>
						
						<div class="card-body">
							<h3 class="card-tittle"><?php echo $row['Nombre']; ?></h3>
							<h4 class="card-text mb-3 mt-3">$<?php echo $row['Precio'];?></h4>
                            <h4 class="card-text mb-3 mt-3">Para: <?php echo $row['Sexo']; ?></h4>
                            <h4 class="card-text mb-3 mt-3">Combo de: <?php echo $row['Cantidad_Personas']; ?></h4>
							<BR>
							
							<div class=" ">
								<br>
								<div class="btn-group">
								<a href="detalle_s.php?ID=<?php echo $row['ID']; ?>&token=<?php echo 
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
  <a href="https://api.whatsapp.com/send?phone=522881029926&text=" class="btn-wsp" target="_blank">
	<i class="fa fa-whatsapp icono"></i>
</a>
</body>
</html>