<?php
require_once "../Controller/usuarioController.php";
// Instanciar el controlador de usuarios
$UserCtrl = new UserController();
if(isset($_GET["id_User"])){
    $id= $_GET["id_User"];
    $res = $UserCtrl->updateUser($id);
}elseif(isset($_GET["id_UserContra"])&&isset($_GET["Contra"])&&isset($_GET["AdminContra"])){
    $id= $_GET["id_UserContra"];
    $ContraNueva = md5($_POST["ContraNueva"]);
    $res = $UserCtrl->updateUserContraAdmin($id,$ContraNueva);
    /*echo "<script>if(confirm('Las contraseña Actuales de su cuenta esta escrita incorrectamente ')){
        window.location.href = '../views/AdminUsuarios.php';
    }</script>";*/
}elseif(isset($_GET["id_UserContra"])&&isset($_GET["Contra"])){
    $id= $_GET["id_UserContra"];
    $contra = $_GET["Contra"];
    $ContraAntigua = md5($_POST["ContraActual"]);
    $ContraNueva = md5($_POST["ContraNueva"]);
    echo "".$ContraNueva;
    if($contra == $ContraAntigua){
        $res = $UserCtrl->updateUserContra($id,$ContraNueva);
    }else{
        echo "<script>if(confirm('Las contraseña Actuales de su cuenta esta escrita incorrectamente ')){
            window.location.href = '../views/PerfilDocente.php';
        }</script>";
    }   
}elseif(isset($_GET["id_User_de"])&&isset($_GET["id"])&&isset($_GET["EliminarUser"])){
    $id = $_GET["id"];
    if($id == "1"){
        echo "<script>if(confirm('No puede eliminar el usuario administrador Principal')){
            window.location.href = '../views/AdminUsuarios.php';
        }</script>";
    }else{
        $id= $_GET["id_User_de"];
        $idAdmin= $_GET["id"];
        $res = $UserCtrl ->deleteUser($id,$idAdmin);
    }
}elseif(isset($_GET["id_User_Ac"])&&isset($_GET["ActualizarUser"])){
    $id = $_GET['id_User_Ac'];
    //echo "<script> alert('".$id."');</script>";;
    $UserCtrl->updateUserAdmin($id);
}
else{
    header("Location: ../views/PerfilDocente.php");
}

?>