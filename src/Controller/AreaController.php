<?php
require_once "../models/AreaModel.php";

class AreaController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
    public function ListArea()
    {
        $Area = new AreaModel();
        $userResponse = $Area->ListArea();
        
    }
	public function ListAreaTabla(){
        $Area = new AreaModel();
        $userResponse = $Area->ListAreaTabla();
    }
	public function createArea(){

        $Area = new AreaModel();
        if (isset($_POST['Area'])) {
            // Obentenemos datos desde el formulario
            $Area->setArea($_POST['Area']);
            $AreaResponse = $Area->CreateArea();

            if ($AreaResponse == 1) // exitoso
	        {
                echo "<script>if(confirm('Nueva Facultad creada')){
                    window.location.href = '../views/AdminAreas.php';
                }</script>";
	        } else {
	            echo "<h1>Error al crear el Banco.</h1>";
	        }
        }
    }
	public function getArea($id){
        $Area = new AreaModel();
        $AreaResponse = $Area->getArea($id);
        return $AreaResponse;
    }
	public function deleteArea($id){
        $Area = new AreaModel();
        $AreaResponse = $Area->deleteArea($id);
        if ($AreaResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/AdminAreas.php'</script>";
        } else {
            echo "<h1>Error al Borrar el Banco.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
	
	public function updateArea($id){
        $Area = new AreaModel();
        if (isset($_POST['Area'])) {
	        $Area->setArea($_POST['Area']);
        	$AreaResponse = $Area->UpdateArea($id);
	        //echo  $userResponse . " response"; //BORRAR
	        if ($AreaResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/AdminAreas.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar la facultad.</h1>";
	        }
		}

        return $AreaResponse;
    }

}

?>