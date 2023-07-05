<?php
    require_once "../Controller/PreguntaEmparController.php";
    // Instanciar el controlador de usuarios
    $PreTFCtrl = new PreguntaEmparController;
    // Se crea el usuario
    $res = $PreTFCtrl->createPreguntaEmpar();

?>