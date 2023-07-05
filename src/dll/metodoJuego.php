<?php
 require_once "../Controller/JuegoController.php";
 // Instanciar el controlador de usuarios
 $BancoCtrl = new JuegoController();
 if(isset($_GET["id_Juego"]) && isset($_GET["EliminarJuego"])){
     $id= $_GET["id_Juego"];
 
     $res = $BancoCtrl ->deleteJuego($id);
 }/*else{
     header("Location: ../views/listBanco.php");
 }*/
 if(isset($_GET["id_Juego"]) && isset($_GET["ActualizarJuego"])){
     $id = $_GET['id_Juego'];
     //echo "<script> alert('".$id."');</script>";;
     $BancoCtrl->updateJuego($id);
 }
?>