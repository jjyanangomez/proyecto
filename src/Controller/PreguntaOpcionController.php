<?php
require_once "../models/PreguntaOpcionModel.php";

class PreguntaOpcionController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

    public function createPreguntaOpcion(){
        $PreOpcion = new PreguntaOpcionModel();

        if (isset($_POST['PreguntaOpcion']) && isset($_POST['Respuesta1']) && isset($_GET["usuario"])){
			$auxValor=0;
			$auxValor2=0;
			$auxValor3=0;
			$auxValor4=0;
            $PreOpcion->setPregunta($_POST['PreguntaOpcion']);
			$PreOpcion->setRespuesta1($_POST['Respuesta1']);
			if(isset($_REQUEST['Opcion1'])){
				$auxValor=1;
			}
			$PreOpcion->setOpValida1($auxValor);
			$PreOpcion->setRespuesta2($_POST['Respuesta2']);
			if(isset($_REQUEST['Opcion2'])){
				$auxValor2=1;
			}
			$PreOpcion->setOpValida2($auxValor2);
			$PreOpcion->setRespuesta3($_POST['Respuesta3']);
			if(isset($_REQUEST['Opcion3'])){
				$auxValor3=1;
			}
			$PreOpcion->setOpValida3($auxValor3);
			$PreOpcion->setRespuesta4($_POST['Respuesta4']);
			if(isset($_REQUEST['Opcion4'])){
				$auxValor4=1;
			}
			$PreOpcion->setOpValida4($auxValor4);
			$PreOpcion->setRetroAlimentacion($_POST['RetroalimentacionOpcion']);
			$PreOpcion->setIdBanco($_GET["usuario"]);
            $PreTFResponse = $PreOpcion->CreatePreguntaOpcion();

			if ($PreTFResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/listBanco.php'</script>";
	        } else {
	            echo "<h1>Error al crear la pregunta de opción múltiple.</h1>";
	        }

		}
    }
	public function updatePreguntaOpcion($id){
        $PreOpcion = new PreguntaOpcionModel();

        if (isset($_POST['PreguntaOpcion']) && isset($_POST['Respuesta1']) && isset($_GET["ActualizarPreOpcion"])){
			$auxValor=0;
			$auxValor2=0;
			$auxValor3=0;
			$auxValor4=0;
            $PreOpcion->setPregunta($_POST['PreguntaOpcion']);
			$PreOpcion->setRespuesta1($_POST['Respuesta1']);
			if(isset($_REQUEST['Opcion1'])){
				$auxValor=1;
			}
			$PreOpcion->setOpValida1($auxValor);
			$PreOpcion->setRespuesta2($_POST['Respuesta2']);
			if(isset($_REQUEST['Opcion2'])){
				$auxValor2=1;
			}
			$PreOpcion->setOpValida2($auxValor2);
			$PreOpcion->setRespuesta3($_POST['Respuesta3']);
			if(isset($_REQUEST['Opcion3'])){
				$auxValor3=1;
			}
			$PreOpcion->setOpValida3($auxValor3);
			$PreOpcion->setRespuesta4($_POST['Respuesta4']);
			if(isset($_REQUEST['Opcion4'])){
				$auxValor4=1;
			}
			$PreOpcion->setOpValida4($auxValor4);
			$PreOpcion->setRetroAlimentacion($_POST['RetroalimentacionOpcion']);
            $PreTFResponse = $PreOpcion->UpdatePreguntaOpcion($id);

			if ($PreTFResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/Preguntas.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar la pregunta de opción múltiple.</h1>";
	        }

		}
    }
	public function ListPreguntasOpcion($idBanco)
    {
        $PreOpcion = new PreguntaOpcionModel();
        $userResponse = $PreOpcion->ListPreguntaOpcion($idBanco);
        
    }
	public function deletePreguntaOpcion($id)
    {
        $PreOpcion = new PreguntaOpcionModel();
        $PreOpcionResponse = $PreOpcion->deletePreguntaOpcion($id);
        if ($PreOpcionResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/Preguntas.php'</script>";
        } else {
            echo "<h1>Error al Borrar la pregunta de opción multiple.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
}

?>