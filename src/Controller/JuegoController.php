<?php
require_once "../models/JuegoModel.php";

class JuegoController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

    public function createJuego(){

        $juego = new JuegoModel();
        if (isset($_POST['Nombre'])) {
            // Obentenemos datos desde el formulario
            $file_name = $_FILES['archivo']['name'];
            $new_name_file = null;
            $archivo = $_FILES['archivo']['tmp_name']; 
            $dir = 'img/';
            if (!file_exists("../".$dir)) {
                mkdir($dir, 0777, true);
            }
            $new_name_file = $dir."SistemaGamificEv".$file_name;
            echo $_SERVER['DOCUMENT_ROOT'];
            move_uploaded_file($archivo,"../". $new_name_file);

            $juego->setNombre($_POST["Nombre"]);
            $juego->setEnlace($_POST['Link']);
            $juego->setImagen($new_name_file);
            $AreaResponse = $juego->CreateJuego();

            if ($AreaResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/AdminJuegos.php'</script>";
	        } else {
	            echo "<h1>Error al crear el Juego.</h1>";
	        }
        }else{
            echo "error";
        }
    }
    public function ListJuegosTabla()
    {
        $juego = new JuegoModel();
        $userResponse = $juego->ListJuegos();
        
    }

    public function ListJuegosStudent(){
        $juego = new JuegoModel();
        $userResponse = $juego->ListJuegosStudent();
    }
    public function deleteJuego($id)
    {
        $juego = new JuegoModel();
        $PreEmparResponse = $juego->deleteJuego($id);
        if ($PreEmparResponse == 1) // exitoso
        {
            echo "<script>if(confirm('Nueva Enlace de juego creado')){
                window.location.href = '../views/AdminJuegos.php';
            }</script>";
        } else {
            echo "<h1>Error al Borrar borrar un Juego.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
    public function getJuego($id){
        $juego = new JuegoModel();
        $userResponse = $juego->getJuego($id);
        return $userResponse;
    }
    public function updateJuego($id){
        $juego = new JuegoModel();
        if (isset($_POST['Nombre'])) {
            $act = $juego->get($id);
            $urlArchivo=$act[0];
            //echo $urlArchivo;
            if(file_exists("../$urlArchivo")){
			
                if(unlink("../$urlArchivo")){
                    echo "archivo eliminado";
                }else{
                    echo "archivo no se pudo eliminar";
                }
            }else{
                echo "No encontro el archivo";
            }
            $file_name = $_FILES['archivo']['name'];
            $new_name_file = null;
            $archivo = $_FILES['archivo']['tmp_name']; 
            $dir = 'img/';
            if (!file_exists("../".$dir)) {
                mkdir($dir, 0777, true);
            }
            $new_name_file = $dir."SistemaGamificEv".$file_name;
            //echo $_SERVER['DOCUMENT_ROOT'];
            move_uploaded_file($archivo,"../". $new_name_file);

            $juego->setNombre($_POST["Nombre"]);
            $juego->setEnlace($_POST['Link']);
            $juego->setImagen($new_name_file);
            $AreaResponse = $juego->UpdateJuego($id);
            if ($AreaResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/AdminJuegos.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar el Juego.</h1>";
	        }

		}else{
            echo "Error al Cambiar el Juego";
        }

    }
    
    

}

?>