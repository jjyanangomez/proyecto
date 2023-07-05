<?php
require_once "../Controller/AreaController.php";
// Instanciar el controlador de usuarios
$BancoCtrl = new AreaController();
if(isset($_GET["id_Area"]) && isset($_GET["EliminarArea"])){
    $id= $_GET["id_Area"];

    $res = $BancoCtrl ->deleteArea($id);
}/*else{
    header("Location: ../views/listBanco.php");
}*/
if(isset($_GET["id_Area"]) && isset($_GET["ActualizarArea"])){
    $id = $_GET['id_Area'];
    //echo "<script> alert('".$id."');</script>";;
    $BancoCtrl->updateArea($id);
}

?>