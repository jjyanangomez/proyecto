<?php
require_once "../Controller/AreaController.php";
// Instanciar el controlador de usuarios
$AreaCtrl = new AreaController();
// Se crea el usuario
$res = $AreaCtrl->createArea();
?>