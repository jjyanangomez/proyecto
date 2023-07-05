<?php
require_once "../models/BancoModel.php";

class BancoController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

    public function createBanco(){

        $Banco = new BancoModel();

        if (isset($_POST['asignatura']) && isset($_POST['tema'])) {

            // Obentenemos datos desde el formulario
            $Banco->setAsignatura($_POST['asignatura']);
            $Banco->setTema($_POST['tema']);
            $Banco->setIdArea($_POST['ComboBoxAreas']);
            $Banco->setIdCarrera($_POST['ComboBoxCarrera']);
            $Banco->setIdUsuario($_GET['usuario']);

            $BancoResponse = $Banco->CreateBanco();

            if ($BancoResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/listBanco.php'</script>";
	        } else {
	            echo "<h1>Error al crear el Banco.</h1>";
	        }
        }
    }
    public function ListBancos($idUser)
    {
        $Banco = new BancoModel();
        $userResponse = $Banco->ListBanco($idUser);
        
    }

    public function deleteBanco($id)
    {
        $Banco = new BancoModel();
        $BancoResponse = $Banco->deleteBanco($id);
        if ($BancoResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/listBanco.php'</script>";
        } else {
            echo '<script>alert("Para Borrar un Banco asegúrese que no se encuentre ningún Cuestionario vinculado (Borrelos)");</script>';
            echo "<script>location.href='../views/listBanco.php'</script>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }

    public function getBanco($id){
        $Banco = new BancoModel();
        $userResponse = $Banco->getBanco($id);
        return $userResponse;
    }
    

    public function ListComboBoxBancos($idUser)
    {
        $Banco = new BancoModel();
        $userResponse = $Banco->ListComboBoxBancos($idUser);
        
    }
    public function updateBanco($id){
        $Banco = new BancoModel();
        if (isset($_POST['asignatura']) && isset($_POST['tema'])) {
	        $Banco->setAsignatura($_POST['asignatura']);
            $Banco->setTema($_POST['tema']);
            $Banco->setIdArea($_POST['ComboBoxAreas']);
            $Banco->setIdCarrera($_POST['ComboBoxCarrera']);
        	$BancoResponse = $Banco->UpdateBanco($id);
	        //echo  $userResponse . " response"; //BORRAR
	        if ($BancoResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/listBanco.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar el Banco.</h1>";
	        }
		}

        return $BancoResponse;
    }


    public function VerTemaBancoPre($IdBancoP){
		$Banco = new BancoModel();
        $userResponse = $Banco->VerTemaBanco($IdBancoP);
	}
}


?>