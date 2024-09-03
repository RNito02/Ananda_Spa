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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="Pagina1_admin.php">Ananda Spa</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="close.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="dashboard.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Menu
                            </a>
                            <div class="sb-sidenav-menu-heading">Interfaces</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Diseño
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Nevegacion Estatica</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Luz de Navegacion</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Avanzado
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Autentificaciones
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="registro_administrador.php">Registrar un nuevo usuario</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="Usuarios_registrados.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                        Usuarios Registrados
                            </a>
                            <a class="nav-link" href="tables.php">
                                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                        Productos
                            </a>
                            <a class="nav-link" href="Editar_Productos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Editar Productos
                            </a>
                            <a class="nav-link" href="Table_Servicios.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Servicios                                </a>
                            <a class="nav-link" href="Editar_Servicios.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Editar Servicios
                            </a>
                            <a class="nav-link" href="Backup.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Backup
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Editar Productos</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                En este apartado podras editar las referencias del producto en cuestion.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Editar Productos
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                            <div class="main-wrapper">
                                <h1>Editar Registros con Función PHP </h1>
                                <br><br>
                                <?php 
                                include("function_editar.php");
                                $ID = $_GET['ID'];
                                select_id('Productos','ID',$ID);
                                ?>
                                <form action="" method="post">
                                    <label for="" class="container__label">Nombre</label>:
                                    <input type="text" value="<?php echo $row->Nombre;?>" name="Nombre">
                                    <label for="" class="container__label">Precio</label>:
                                    <input type="text" value="<?php echo $row->Precio;?>" name="Precio">
                                    <br>
                                    <br>
                                    <label for="" class="container__label">Marca</label>:
                                    <input type="text" value="<?php echo $row->Marca;?>" name="Marca">
                                    <label for="" class="container__label">Color</label>:
                                    <input type="text" value="<?php echo $row->Color;?>" name="Color">
                                    <br>
                                    <br>
                                    <label for="" class="container__label">Talla</label>:
                                    <input type="text" value="<?php echo $row->Talla;?>" name="Talla">
                                    <label for="" class="container__label">Stock</label>:
                                    <input type="text" value="<?php echo $row->Stock;?>" name="Stock">
                                    <br>
                                    <br>
                                    <label for="" class="container__label">URLI</label>:
                                    <input type="text" value="<?php echo $row->URLI;?>" name="URLI">
                                    <input type="submit" name="submit">
                                </form>

                                <?php
                                    
                                    if(isset($_POST['submit'])){
                                        $field = array("Nombre"=>$_POST['Nombre'], "Precio"=>$_POST['Precio'], "Marca"=>$_POST['Marca'], "Color"=>$_POST['Color'], "Talla"=>$_POST['Talla'],"Stock"=>$_POST['Stock'],"URLI"=>$_POST['URLI']);
                                        $tbl = "Productos";
                                        edit($tbl,$field,'ID',$ID);
                                        echo "<script>alert ('Se ha agregado el producto');
                                        window.location='/sistema/Editar_Productos.php'</script>";
             
                                    }
                                    
                                ?>
                                </div>
                                </body>
                                    
                                    
                                
                            </table>
                                
                            </div>
                        </div>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;Ana Spa WEB 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        
    </body>
</html>