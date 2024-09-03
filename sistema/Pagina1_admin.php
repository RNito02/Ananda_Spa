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
    <link rel="stylesheet" href="css/EstiloCarrusel.css">
    <link rel="stylesheet" href="css/Testimonios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5a2dd7aaae.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    
    <title>Document</title>
    <style>
    .alert1 
      {
          background-color: rgba(0, 179, 170, 0.884);
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
    </style>
</head>
<body class="sb-nav-fixed">
  <div id='navbar'>
    <ul>
      
      
      <li><a href="Close.php">Cerrar sesion</a></li>		
      <li><a href="Pagina1_admin.php">ANANDA SPA</a></li>
      <li><a href="Pagina2.php">TODOS LOS SERVICIOS</a></li>
      <li><a href="Productos.php">NUESTROS PRODUCTOS</a></li>
      <li><a href="Pagina4_admin.php">TESTIMONIOS</a></li>
      <li><a href="Pagina6_admin.php">MAPA DEL SITIO</a></li>

      <li><a href="dashboard.php">Dasboard</a></li>
      
      
    </ul>
  </div> 
      <div id="carouselExampleDark" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div id="img" class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="1500" >
            <img src="img/Slider4.jpg" class=" d-block w-100" alt="Slider4">
          </div>
          <div class="carousel-item" data-bs-interval="1500">
            <img src="img/spa1.jpg" class=" d-block w-100" alt="Slider1">
          </div>
          <div class="carousel-item" data-bs-interval="1500">
            <img src="img/Slider2.jpg" class=" d-block w-100" alt="Slider2">
          </div>
          <div class="carousel-item" data-bs-interval="1500">
            <img src="img/Slider3.jpg" class=" d-block w-100" alt="Slider3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <h1 class="text-center alert alert1" role="alert">
        <font size="30" face="Comic Sams Ms">
          ANANDA 
        <i>
          SPA
        </i>
        </font>
      </h1>
      <div class="container text-center alert alert-primary alert2" role="alert">
        <b>
        </b>
      En Ananda <i>Spa</i>, se consigue relajación muscular por lo que, dolores de espalda, reumáticos y musculares desaparecen. También mejoran los problemas digestivos, del aparato urinario y la próstata. El Spa es recomendable en trastornos femeninos, enfermedades nerviosas y alteraciones de las vías respiratorias. Aparte de disfrutar de diversos servicios de calidad que sin duda alguna no te arrepentiras de obtener. Atencion de calidad asi como tambien en nuestra linea de productos a bajo costo.
      <img src="img/Logo2.jpg.jpeg">
      </div>
      <br>
      <div class="container" class="estilo-card">
        <div class="row">
            <div class="col">
                <div class="card mt-3" style="width: 18rem;">
                    <img src="img/k2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center"></h5>
                      <p class="card-text">SER LA EMPRESA LÍDER DE RELAJAMIENTO EMOCIONAL, CORPORAL Y ESPIRITUAL DE TODOS NUESTROS CLIENTES DENTRO DE MÉXICO.</p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card mt-3" style="width: 18rem;">
                    <img src="img/k1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center"></h5>
                      <p class="card-text">CREAMOS DESCANSO Y FELICIDAD A NUESTROS CLIENTES AL OTORGAR LA MAS ALTA CALIDAD DE SERVICIO Y TÉCNICAS.</p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card mt-3" style="width: 18rem;">
                    <img src="img/k3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title text-center"></h5>
                      <p class="card-text">TENER UNA CARTERA DE CLIENTES CON FIDELIDAD AL SERVICIO DE CALIDAD QUE SOLO ANANDA SPA OTORGA.</p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
      <br>
      <div class="container">
        <h1 class="text-center alert alert-dark alert1">
            CONOCE LOS DIFERENTES TIPOS DE SPA
        </h1>
      </div>
      <br>
      <div class="container video-center">
        <video width="1150" height="500" autoplay controls muted>
          <source src="video/Tipos_SPA.mp4" type="video/mp4">
        </video>
      </div>
  <br>
      <section class="Testimonios">
        <div class="Testimonios_header">
          <h1>COMENTARIOS DE NUESROS CLIENTES</h1>
       </div>
       <div class="Testimonios_contenedor">
        <div class="Testimonios_caja">
          <div class="caja-top">
            <div class="perfil">
              <div class="perfil-img">
                <img src="img/p1.jpg" alt="">
              </div>
              <div class="name-user">
              <strong>Amanda Rodriguez</strong>
              <span>@RodriAma</span>
              </div>
            </div>
            <div class="Reseñas">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="comentarios_clientes">
            <p>Fantastico servicio, La mejor experiencia que pude tener. Super recomendado.</p>
          </div>
        </div>
        <div class="Testimonios_caja">
          <div class="caja-top">
            <div class="perfil">
              <div class="perfil-img">
                <img src="img/p2.jpg" alt="">
              </div>
              <div class="name-user">
              <strong>Alberto Hernández</strong>
              <span>@HrzAlber</span>
              </div>
            </div>
            <div class="Reseñas">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="comentarios_clientes">
            <p>Definitivamente el mejor lugar para una grandiosa experiencia coorporal y con una atencion magnifica.</p>
          </div>
        </div>
        <div class="Testimonios_caja">
          <div class="caja-top">
            <div class="perfil">
              <div class="perfil-img">
                <img src="img/p3.jpg" alt="">
              </div>
              <div class="name-user">
              <strong>Karina Martinez</strong>
              <span>@KariMt</span>
              </div>
            </div>
            <div class="Reseñas">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="comentarios_clientes">
            <p>Sus faciales son lo maximo, dejo mi cutis super suave y terso, les recomiendo mucho ese servicio y de los masajes ni se diga, Excelentes!!!</p>
          </div>
        </div>
        <div class="Testimonios_caja">
          <div class="caja-top">
            <div class="perfil">
              <div class="perfil-img">
                <img src="img/p4.jpg" alt="">
              </div>
              <div class="name-user">
              <strong>Cristhian Mesa</strong>
              <span>@ChrisMesa</span>
              </div>
            </div>
            <div class="Reseñas">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="comentarios_clientes">
            <p>Tienen una gran variedad de productos y no solo para dama, si no tambien para caballero. Los invito a probar cada uno de sus servicios y productos, les aseguro que no se arrepentiran.</p>
          </div>
        </div>
        </div>
       </div>
      </section>
  <br>
    <!--::::Pie de Pagina::::::-->
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