<?php
require_once "../Controller/PreguntaEmparController.php";
// Instanciar el controlador de usuarios
$PreTFCtrl = new PreguntaEmparController();

if(isset($_GET["id_PreEmpar"]) && isset($_GET["EliminarPreEmpar"])){
    $id= $_GET["id_PreEmpar"];

    $res = $PreTFCtrl->deletePreguntaEmpar($id);
}else if(isset($_GET["id_PreEmpar"]) && isset($_GET["ActualizarPreEmpar"])){
    $id= $_GET["id_PreEmpar"];

    $res = $PreTFCtrl->updatePreguntaEmpar($id);
}else{
    header("Location: ../views/Preguntas.php");
}

?>