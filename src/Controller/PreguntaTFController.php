<?php
require_once "../models/PreguntaTFModel.php";

class PreguntaTFController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
    public function createPreguntaTF(){

        $PreTF = new PreguntaTFModel();

        if (isset($_POST['PreguntaTF']) && isset($_GET["usuario"])) {
            $auxValor=0;
            // Obentenemos datos desde el formulario
            $PreTF->setPregunta($_POST['PreguntaTF']);
            if( $_POST['RespuestaTF'] == "Verdadero"){
                $auxValor = 1;
            }else{
                $auxValor=0;
            }
            $PreTF->setRespuesta($auxValor);
            $PreTF->setRetroAlimentacion($_POST['RetroalimentacionTF']);
            $PreTF->setIdBanco($_GET["usuario"]);
            $PreTFResponse = $PreTF->CreatePreguntaTF();

            if ($PreTFResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/Preguntas.php'</script>";
	        } else {
	            echo "<h1>Error al crear el Banco.</h1>";
	        }
        }
    }
    public function updatePreguntaTF($id){
        $PreTF = new PreguntaTFModel();
        if (isset($_POST['PreguntaTF']) && isset($_GET["ActualizarPreTrue"])) {
            $auxValor=0;
            // Obentenemos datos desde el formulario
            $PreTF->setPregunta($_POST['PreguntaTF']);
            if( $_POST['RespuestaTF'] == "Verdadero"){
                $auxValor = 1;
            }else{
                $auxValor=0;
            }
            $PreTF->setRespuesta($auxValor);
            $PreTF->setRetroAlimentacion($_POST['RetroalimentacionTF']);
            $PreTFResponse = $PreTF->UpdatePreguntaTF($id);

            if ($PreTFResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/Preguntas.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar la pregunta de verdadero y falso.</h1>";
	        }
        }
    }
    public function ListPreguntasTF($idBanco)
    {
        $PreTF = new PreguntaTFModel();
        $userResponse = $PreTF->ListPreguntaTF($idBanco);
        
    }

    public function deletePreguntaTF($id)
    {
        $PreTF = new PreguntaTFModel();
        $PreTFResponse = $PreTF->deletePreguntaTF($id);
        if ($PreTFResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/Preguntas.php'</script>";
        } else {
            echo "<h1>Error al Borrar la pregunta de opción multiple.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
}
?>