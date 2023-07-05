<?php
require_once "../Controller/CarreraController.php";
// Instanciar el controlador de usuarios
$CarreraCtrl = new CarreraController();
// Se crea el usuario
$res = $CarreraCtrl->createCarrera();
?>