<?php
require_once "../models/CarreraModel.php";

class CarreraController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
    public function ListCarrera()
    {
        $Carrera = new CarreraModel();
        $userResponse = $Carrera->ListCarrera();
        
    }
	public function ListCarreraTabla(){
        $Carrera = new CarreraModel();
        $userResponse = $Carrera->ListCarreraTabla();
    }
	public function createCarrera(){

        $Carrera = new CarreraModel();
        if (isset($_POST['Carrera'])) {
            // Obentenemos datos desde el formulario
			$Carrera->setIdArea($_POST['ComboBoxAreas']);
            $Carrera->setCarrera($_POST['Carrera']);
            $CarreraResponse = $Carrera->CreateCarrera();

            if ($CarreraResponse == 1) // exitoso
	        {
                echo "<script>if(confirm('Nueva Carrera creada')){
                    window.location.href = '../views/AdminCarreras.php';
                }</script>";
	        } else {
	            echo "<h1>Error al crear la nueva Carrera.</h1>";
	        }
        }
    }
	public function getCarrera($id){
        $Carrera = new CarreraModel();
        $AreaResponse = $Carrera->getCarrera($id);
        return $AreaResponse;
    }
	public function deleteCarrera($id){
        $Carrera = new CarreraModel();
        $AreaResponse = $Carrera->deleteCarrera($id);
        if ($AreaResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/AdminCarreras.php'</script>";
        } else {
            echo "<h1>Error al Borrar la Carrera.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
	
	public function updateCarrera($id){
        $Carrera = new CarreraModel();
        if (isset($_POST['Carrera'])) {
	        $Carrera->setIdArea($_POST['ComboBoxAreas']);
            $Carrera->setCarrera($_POST['Carrera']);
            $CarreraResponse = $Carrera->UpdateCarrera($id);
	        //echo  $userResponse . " response"; //BORRAR
	        if ($CarreraResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/AdminCarreras.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar la Carrera.</h1>";
	        }
		}

        return $CarreraResponse;
    }
	
}

?>