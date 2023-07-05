<?php
require_once "../Controller/PreguntaTFController.php";
    // Instanciar el controlador de usuarios
    $PreTFCtrl = new PreguntaTFController();
    // Se crea el usuario
    $res = $PreTFCtrl->createPreguntaTF();
?>