<?php
require_once "../Controller/JuegoController.php";
    // Instanciar el controlador de usuarios
    $BancoCtrl = new JuegoController();
    // Se crea el usuario
    $res = $BancoCtrl->createJuego();
?>