<?php
require_once "../Controller/CuestionarioController.php";
    // Instanciar el controlador de Cuestionario
    $PreTFCtrl = new CuestionarioController();
    // Se crea el Cuestionario
    $res = $PreTFCtrl->createCuestionario();
?>