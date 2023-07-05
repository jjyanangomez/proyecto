<?php
require_once "../models/CuestionarioModel.php";
class CuestionarioController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

    public function createCuestionario(){
        $Cuestionario = new CuestionarioModel();

        if (isset($_POST['NombreCuestionario']) && isset($_POST['NumPreguntas'])){
            $auxValor = 0;
            $num = (int)$_POST["NumPreguntas"];
            $valorCuesti = (int)$_POST['ValCuestionario'];
            if($num <= 0 || $valorCuesti <= 0){
                echo '<script>alert("El número de preguntas o valor del cuestionario no puede ser menor a 0");</script>';
                echo "<script>location.href='../views/CuestionarioNuevo.php'</script>";
            }else{
                $aux = $this->ValidarPreguntas((int)$_POST['ComboBoxBancos'],(int)$_POST['NumPreguntas']);
                if($aux){
                    $valor = $valorCuesti/$num;
                    if(isset($_REQUEST['EstadoCuestionario'])){
                        $auxValor=1;
                    }
                    $Cuestionario->setNombreCuestionario($_POST['NombreCuestionario']);
                    $Cuestionario->setCodigoCuestionario($_POST['Codigo']);
                    $Cuestionario->setNumPreguntas($_POST['NumPreguntas']);
                    $Cuestionario->setValorCuestionario($_POST['ValCuestionario']);
                    $Cuestionario->setEstadoCuestionario($auxValor);
                    $Cuestionario->setValorPregunta($valor);
                    $Cuestionario->setIdBanco($_POST['ComboBoxBancos']);

                    $BancoResponse = $Cuestionario->CreateCuestionario();

                    if ($BancoResponse == 1) // exitoso
                    {
                       echo "<script>location.href='../views/listCuestionarios.php'</script>";
                    } else {
                        echo '<script>alert("El Codigo de acceso al banco ya existe intente con otro...");</script>';
                        echo "<h1>Error al crear el Cuestionario.</h1>";
                        echo "<script>location.href='../views/CuestionarioNuevo.php'</script>";
                    }
                }else{
                    echo '<script>alert("El número de preguntas ingresado supera el número de preguntas del Banco");</script>';
                    echo "<h1>Error al crear el Cuestionario.</h1>";
                    echo "<script>location.href='../views/CuestionarioNuevo.php'</script>";
                }
            }
        }
    }
    public function ValidarPreguntas($idBanco, $numPre){
        $Cuestionario1 = new CuestionarioModel();
        $num= round((float)$numPre/3);
        $numTF = $num;
        $numOp = $num;
        $numEm = 0;
        if(($numTF+$numOp)<$numPre){
            $numEm = $numPre-($numTF+$numOp);
        }
        $bancoEmpareja = $Cuestionario1->getTotalPreguntas("SELECT COUNT(*) FROM `bancoemparejamiento` WHERE `IdBanco` = '".$idBanco."'");
        //echo "SELECT COUNT(*) FROM `bancoemparejamiento` WHERE `IdBanco` = '".$idBanco."'";
        $bancoOpcion = $Cuestionario1->getTotalPreguntas("SELECT COUNT(*) FROM `bancoopcionmul` WHERE `IdBanco` = '".$idBanco."'");
        $bancoTF = $Cuestionario1->getTotalPreguntas("SELECT COUNT(*) FROM `bancotruefalse` WHERE `IdBanco` = '".$idBanco."'");
        if($bancoTF[0]>=$numTF){
            if($bancoOpcion[0]>=$numOp){
                if($bancoEmpareja[0]>=$numEm){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            
            return false;
            
        }
    }

    public function ListCuestionarios($idUser)
    {
        $Cuestionario = new CuestionarioModel();
        $userResponse = $Cuestionario->ListCuestionarios($idUser);
        
    }
    public function ListCuestionariosReport($idUser)
    {
        $Cuestionario = new CuestionarioModel();
        $userResponse = $Cuestionario->ListCuestionariosReport($idUser);
        
    }
    public function deleteCuestionario($id)
    {
        $Cuestionario = new CuestionarioModel();
        $CuestionarioResponse = $Cuestionario->deleteCuestionario($id);
        if ($CuestionarioResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/listCuestionarios.php'</script>";
        } else {
            echo '<script>alert("Error al borrar Cuestionario");</script>';
            echo "<script>location.href='../views/listCuestionarios.php'</script>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
    public function getCuestionario($id){
        $Cuestionario = new CuestionarioModel();
        $userResponse = $Cuestionario->getCuestionario($id);
        return $userResponse;
    }
    public function updateCuestionario($id){
        $Cuestionario = new CuestionarioModel();
        if (isset($_POST['NombreCuestionario']) && isset($_POST['NumPreguntas'])) {
	        $auxValor = 0;
            $num = (int)$_POST["NumPreguntas"];
            $valorCuesti = (int)$_POST['ValCuestionario'];
            if($num <= 0 || $valorCuesti <= 0){
                echo '<script>alert("El número de preguntas o valor del cuestionario no puede ser menor a 0");</script>';
                echo "<script>location.href='../views/CuestionarioNuevo.php'</script>";
            }else{
                $valor = $valorCuesti/$num;
                if(isset($_REQUEST['EstadoCuestionario'])){
                    $auxValor=1;
                }
                $Cuestionario->setNombreCuestionario($_POST['NombreCuestionario']);
                $Cuestionario->setCodigoCuestionario($_POST['Codigo']);
                $Cuestionario->setNumPreguntas($_POST['NumPreguntas']);
                $Cuestionario->setValorCuestionario($_POST['ValCuestionario']);
                $Cuestionario->setEstadoCuestionario($auxValor);
                $Cuestionario->setValorPregunta($valor);
                $Cuestionario->setIdBanco($_POST['ComboBoxBancos']);
                $CuestionarioResponse = $Cuestionario->UpdateCuestionario($id);
                //echo  $userResponse . " response"; //BORRAR
                if ($CuestionarioResponse == 1) // exitoso
                {
                    echo "<script>location.href='../views/listCuestionarios.php'</script>";
                } else {
                    echo "<h1>Error al actualizar el Banco.</h1>";
                }
            }
            
		}

        return $CuestionarioResponse;
    }
    
    
}
?>