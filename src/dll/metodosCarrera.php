<?php
require_once "../Controller/CarreraController.php";
// Instanciar el controlador de usuarios
$BancoCtrl = new CarreraController();
if(isset($_GET["id_Carrera"]) && isset($_GET["EliminarCarrera"])){
    $id= $_GET["id_Carrera"];

    $res = $BancoCtrl ->deleteCarrera($id);
}/*else{
    header("Location: ../views/listBanco.php");
}*/
if(isset($_GET["id_Carrera_ca"]) && isset($_GET["ActualizarCarrera"])){
    $id = $_GET['id_Carrera_ca'];
    //echo "<script> alert('".$id."');</script>";;
    $BancoCtrl->updateCarrera($id);
}

?>