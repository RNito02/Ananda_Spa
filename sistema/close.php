<?php session_start();

require 'conexion.php';
require 'functions.php';

session_destroy();

header('Location: '.RUTA.'login.php');



 ?>