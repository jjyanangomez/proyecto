<?php
require_once "../Controller/usuarioController.php";
    // Instanciar el controlador de usuarios
    $userCtrl = new UserController();
    // Se crea el usuario
    $res = $userCtrl->createUser();

?>