<?php

define("CLIENT_ID", "AVSoHPGv_7_SnxKO73gFeX1by1amCuzjewFHINuyLm0owOkIHl1tRmgI0FeNj1rksHoReuhF0VL2FY1_");
define("CURRENCY", "MXN");
define("KEY_TOKEN", "MCA.gsp-012*");
define("MONEDA", "$");

session_start();
$num_cart=0;
if(isset($_SESSION['carrito_p']['producto'])){
    $num_cart =count($_SESSION['carrito_p']['producto']);
}
?>