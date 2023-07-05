<?php
require_once "../Controller/CuestionarioController.php";
// Instanciar el controlador de Cuestionario
$PreTFCtrl = new CuestionarioController();
// Se crea el Cuestionario
if(isset($_GET["id_Cuestionario"]) && isset($_GET["EliminarCuestionario"])){
    $id= $_GET["id_Cuestionario"];

    $res = $PreTFCtrl->deleteCuestionario($id);
}/*else{
    header("Location: ../views/listCuestionarios.php");
}*/
if(isset($_GET["id_Cuestionario"]) && isset($_GET["ActualizarCuestionario"])){
    $id = $_GET['id_Cuestionario'];
    //echo "<script> alert('".$id."');</script>";;
    $PreTFCtrl->updateCuestionario($id);
}

?>