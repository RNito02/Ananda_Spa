<?php
define("CLIENT_ID","AXjqcwqIZQv7bAbpq6YpZUQCWNd7ON33kSRC9G-Uul7bBsovt4Th2joetn6ys17GZ9kCAybXGDqkEGCI");
define("TOKEN_MP","TEST-2489117333263864-122219-07bffcf759b96cd39b8407dfb17250fd-305044808");
define("CURRENCY","MXN");
define("KEY_TOKEN","APR.wqc-354*");
define("MONEDA","$");

session_start();

$usuario = isset($_SESSION['s_usuario']) ? $_SESSION['s_usuario'] : '';

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?> 