<?php session_start();

require 'conexion.php';
require 'functions.php';
  
// comprobar session
if (!isset($_SESSION['usuario'])) {
  header('Location: '.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'administrador') 
  // traer el nombre del usuario
  $user = iniciarSession('usuarios', $conexion);

  elseif ($admin['tipo_usuario'] == 'empleado') {
    // traer el nombre del usuario
    $user = iniciarSession('usuarios', $conexion);
  
} else {
  header('Location: '.RUTA.'index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos (1).css">
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/estilo-card.css">
    <link rel="stylesheet" href="css/EstiloNavbar.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <title>Document</title>
    <style>
        .alert1
            {
                background-color: rgba(0, 179, 170, 0.925);
                font-family: "Comic Sams Ms";
                color: rgb(236, 236, 236);
            }
            .alert2
            {
                font-family: "Comic Sams Ms";
            }
            body
            {
              background-image: url(img/Logo.jpg.jpeg);
                background-repeat: repeat;
                background-attachment: fixed;
            }
            .tabla
            {
                background-color: rgb(235, 235, 235);
                font-family: "Comic Sams Ms";
            }
            .tabla1
            {
                background-color: rgba(235, 235, 235, 0.521);
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
                    <li><a href="Pagina6_admin.php">MAPA DEL SITIO</a></li>
                    <li><a href="Dashboard.php">Dashboard</a></li>


    </ul>
  </div> 
      <br>
      <div class="container text-center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d946.6584501757108!2d-95.806245270827!3d18.36398359921878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c3b5dd701cd847%3A0x272600256c66e285!2sDe%20La%20Piedad%20115%2C%20Manlio%20Fabio%20Altamirano%2C%2095390%20Cosamaloapan%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1665047808507!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
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
    <a href="https://api.whatsapp.com/send?phone=522881029926&text=" class="btn-wsp" target="_blank">
      <i class="fa fa-whatsapp icono"></i>
  </a>
</body>
</html>