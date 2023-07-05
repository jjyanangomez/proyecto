<?php
require_once "../models/PreguntaEmparModel.php";

class PreguntaEmparController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

    public function createPreguntaEmpar(){
        $PreEmpar = new PreguntaEmparModel();

        if (isset($_POST['PreguntaEmpar']) && isset($_POST['Enunciado1']) && isset($_GET["usuario"])){
            $PreEmpar->setPregunta($_POST['PreguntaEmpar']);
			$PreEmpar->setEnunciado1($_POST['Enunciado1']);
            $PreEmpar->setResPrimerEnunciado($_POST['ResEnunciado1']);
            $PreEmpar->setEnunciado2($_POST['Enunciado2']);
            $PreEmpar->setResSegundoEnunciado($_POST['ResEnunciado2']);
            $PreEmpar->setEnunciado3($_POST['Enunciado3']);
            $PreEmpar->setResTercerEnunciado($_POST['ResEnunciado3']);
            $PreEmpar->setRetroAlimentacion($_POST['RetroalimentacionEmpar']);
			$PreEmpar->setIdBanco($_GET["usuario"]);

            $PreTFResponse = $PreEmpar->CreatePreguntaEmpar();
            
            if ($PreTFResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/Preguntas.php'</script>";
	        } else {
	            echo "<h1>Error al crear las preguntas de emparejamiento.</h1>";
	        }
        }
    }
    public function updatePreguntaEmpar($id){
        $PreEmpar = new PreguntaEmparModel();

        if (isset($_POST['PreguntaEmpar']) && isset($_POST['Enunciado1']) && isset($_GET["ActualizarPreEmpar"])){
            $PreEmpar->setPregunta($_POST['PreguntaEmpar']);
			$PreEmpar->setEnunciado1($_POST['Enunciado1']);
            $PreEmpar->setResPrimerEnunciado($_POST['ResEnunciado1']);
            $PreEmpar->setEnunciado2($_POST['Enunciado2']);
            $PreEmpar->setResSegundoEnunciado($_POST['ResEnunciado2']);
            $PreEmpar->setEnunciado3($_POST['Enunciado3']);
            $PreEmpar->setResTercerEnunciado($_POST['ResEnunciado3']);
            $PreEmpar->setRetroAlimentacion($_POST['RetroalimentacionEmpar']);

            $PreTFResponse = $PreEmpar->UpdatePreguntaEmpar($id);
            
            if ($PreTFResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/Preguntas.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar las preguntas de emparejamiento.</h1>";
	        }
        }
    }
    
    public function ListPreguntasEmpar($idBanco)
    {
        $PreEmpar = new PreguntaEmparModel();
        $userResponse = $PreEmpar->ListPreguntaEmpar($idBanco);
        
    }
    public function deletePreguntaEmpar($id)
    {
        $PreEmpar = new PreguntaEmparModel();
        $PreEmparResponse = $PreEmpar->deletePreguntaEmpar($id);
        if ($PreEmparResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/Preguntas.php'</script>";
        } else {
            echo "<h1>Error al Borrar la pregunta de opción multiple.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
}

?>