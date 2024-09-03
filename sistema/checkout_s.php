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

$productos = isset($_SESSION['carrito']['servicio']) ? $_SESSION['carrito']['servicio']: null;

//print_r($_SESSION);
$lista_carrito = array();

if ($productos != null){
    foreach ($productos as $clave => $cantidad){
        $sql = $con->prepare("SELECT ID, Nombre, Precio, Descripcion, Sexo, Cantidad_Personas, $cantidad as cantidad FROM Servicios WHERE ID=? AND URLI=1");
        $sql->execute([$clave]);
        $lista_carrito[] =$sql->fetch(PDO::FETCH_ASSOC);

    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>carta</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/sweetalert2.min.css">
	

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/font-awesome.min.css">


	<script src="js/bootstrap.min.js"></script>

	</head>
<body>
<style>
    body
	{
		background-color: #71E7F0;
	}
</style>
<br>
	<main>
    <section id="price">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
							<div class="col-md-10 order-md-8 text-left">
								<a href="Pagina2.php" class="btn btn-outline-secondary">Ir al catalgo</span></a>
							</div>
							</div>
							<h1 class="heading wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
							<h1>Tu carrito:</h1>
					</div>	
				</div>
			</div>
		</div>
	</section>
				
    <main>
	<div class="container text-center">
			<div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><h2>Servicio</h2></th>
                            <th><h2>PRECIO</h2</th>
                            <th><h2>CANTIDAD<h2></th>
                            <th><h2>SUBTOTAL</h2></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        }else{
                            $total =0;
                            foreach($lista_carrito as $producto){
                                $_ID =$producto['ID'];
                                $descripcion =$producto['Nombre'];
                                $precio =$producto['Precio'];
                                $cantidad =$producto['cantidad'];
                                $subtotal =$cantidad * $precio;
                                $total +=$subtotal;
								$total_IVA = $total + (($total * 16)/100);
                        ?>

                        <tr>
                            <td><h3><?php echo $descripcion ?></h3></td>
                            <td><h3><?php echo MONEDA . number_format($precio,2,'.'); ?></h3></td>
                            <td><h3>
							<input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>"
                                    size="5" id="cantidad_<?php echo $_ID; ?>" 
                                    onchange="actualizaCantidad(this.value, <?php echo $_ID; ?>)">
							</h3></td>
                            <td><h3>
                                <div id="subtotal_<?php echo $_ID; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal,2,'.'); ?></div>
							</h3></td>
                            <td><button id="eliminar" class=" btn-info btn-lg " type="button" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-id="<?php echo $_ID; ?>">Eliminar</button></td>                             
						</tr>
                        <?php } ?>
                    </tbody>
					<tr>
                          <td colspan="4"></td>
                          <td colspan="2">
                            <p class="h3" id="total"><?php echo MONEDA . number_format($total_IVA,"2",'.',',');?></p>(incluye IVA)                                        
                          </td>
                    </tr>
                </table>
                <?php } ?>
            </div>
			<?php if($lista_carrito != null) { ?>
			<div class="row">
				<div class="col-md-5 offset-md-7 d-grid gap-2">
					<a href="pago_s.php" class="btn-primary btn-lg">Realizar pago</a>
				</div>
			</div>
			<?php } ?>
			<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title col-11 text-center" id="exampleModalLabel">¡Alerta!</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<h3>¿Desea eliminar el producto de la lista?</h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn-lg btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button id="btn-elimina" class="btn-lg btn-danger" onclick="elimina()">Eliminar</button>
					</div>
				</div>
			</div>
		</div>
		<br>                     
	</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="js/sweetalert2.min.js"></script>
<script src="js/productos.js"></script>

<script>
	let eliminaModal = document.getElementById('eliminaModal')
	eliminaModal.addEventListener('show.bs.modal', function(event) {
				// Button that triggered the modal
	let button = event.relatedTarget
				// Extract info from data-bs-* attributes
	let recipient = button.getAttribute('data-bs-id')
	let botonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
	botonElimina.value = recipient
	})	

	function actualizaCantidad(cantidad,codproducto){
    let url = 'clases_s/actualizarcarrito.php'
    let formData = new FormData()
	formData.append('action','agregar') 
    formData.append('ID',codproducto) 
    formData.append('cantidad',cantidad) 

    fetch(url,{
      method: 'POST',
      body: formData,
      mode:'cors'
    })
    .then(response => response.json())
    .then(data => {
      if(data.ok){
		  let divsubtotal =document.getElementById('subtotal_' + codproducto)
		  divsubtotal.innerHTML=data.sub

		  let total = 0.00
		  let list = document.getElementsByName('subtotal[]')
							
							for (var i = 0; i < list.length; ++i) {
								total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
							}
							
							total = new Intl.NumberFormat('en-US', {
								minimumFractionDigits: 2
							}).format(total)
							document.getElementById("total").innerHTML = '<?php echo MONEDA; ?>' + total
						}
					})
				}

				function elimina() {
				let botonElimina = document.getElementById('btn-elimina')
				let codproducto = botonElimina.value
				
				let url = 'clases_s/actualizarcarrito.php';
				let formData = new FormData();
				formData.append('action', 'eliminar');
				formData.append('ID', codproducto);
				
				fetch(url, {
                    method: 'POST',
					body: formData,
					mode: 'cors',
				}).then(response => response.json())
				.then(data => {
					if (data.ok) {
						location.reload();
					}
				})
				$('#myModal').modal('hide')
			}
          
</script>

<!--<script src="js/pedido.js"></script>--->
</body>
</html>