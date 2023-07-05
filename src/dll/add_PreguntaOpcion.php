<?php
require_once "../Controller/PreguntaOpcionController.php";
// Instanciar el controlador de usuarios
$PreTFCtrl = new PreguntaOpcionController;
// Se crea el usuario
$res = $PreTFCtrl->createPreguntaOpcion();
?>