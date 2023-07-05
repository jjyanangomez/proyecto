<?php
require_once "../Controller/PreguntaTFController.php";
// Instanciar el controlador de usuarios
$PreTFCtrl = new PreguntaTFController();

if(isset($_GET["id_PreTrue"]) && isset($_GET["EliminarPreTrue"])){
    $id= $_GET["id_PreTrue"];

    $res = $PreTFCtrl->deletePreguntaTF($id);
}else if(isset($_GET["id_PreTrue"]) && isset($_GET["ActualizarPreTrue"])){
    $id= $_GET["id_PreTrue"];
    $res = $PreTFCtrl->updatePreguntaTF($id);
}else{
    header("Location: ../views/Preguntas.php");
}

?>