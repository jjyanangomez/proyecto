<?php
require_once "../Controller/BancoController.php";
    // Instanciar el controlador de usuarios
    $BancoCtrl = new BancoController();
    // Se crea el usuario
    $res = $BancoCtrl->createBanco();

?>