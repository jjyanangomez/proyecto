<?php
require_once "../Controller/BancoController.php";
// Instanciar el controlador de usuarios
$BancoCtrl = new BancoController();
if(isset($_GET["id_Banco"]) && isset($_GET["EliminarBanco"])){
    $id= $_GET["id_Banco"];

    $res = $BancoCtrl ->deleteBanco($id);
}/*else{
    header("Location: ../views/listBanco.php");
}*/
if(isset($_GET["id_Banco"]) && isset($_GET["ActualizarBanco"])){
    $id = $_GET['id_Banco'];
    //echo "<script> alert('".$id."');</script>";;
    $BancoCtrl->updateBanco($id);
}

?>