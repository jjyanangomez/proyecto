<?php
require_once "../Controller/PreguntaOpcionController.php";
// Instanciar el controlador de usuarios
$PreTFCtrl = new PreguntaOpcionController();

if(isset($_GET["id_PreOpcion"]) && isset($_GET["EliminarPreOpcion"])){
    $id= $_GET["id_PreOpcion"];
    $res = $PreTFCtrl->deletePreguntaOpcion($id);
}else if(isset($_GET["id_PreOpcion"]) && isset($_GET["ActualizarPreOpcion"])){
    $id= $_GET["id_PreOpcion"];
    $res = $PreTFCtrl->updatePreguntaOpcion($id);
}else{
    header("Location: ../views/Preguntas.php");
}

?>