<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";
class PreguntaEmparModel{
    private $IdPreguntaEmpar;
    private $Pregunta;
    private $Enunciado1;
    private $ResPrimerEnunciado;
    private $Enunciado2;
    private $ResSegundoEnunciado;
    private $Enunciado3;
    private $ResTercerEnunciado;
    private $RetroAlimentacion;
    private $IdBanco;

    public function getIdPreguntaEmpar(){
        return $this->IdPreguntaEmpar;
    }
    
    public function setPregunta($Pregunta){
        $this->Pregunta = $Pregunta;
    }
    
    public function setEnunciado1($Enunciado1){
        $this->Enunciado1 = $Enunciado1;
    }

    public function setResPrimerEnunciado($ResPrimerEnunciado){
        $this->ResPrimerEnunciado = $ResPrimerEnunciado;
    }

    public function setEnunciado2($Enunciado2){
        $this->Enunciado2 = $Enunciado2;
    }

    public function setResSegundoEnunciado($ResSegundoEnunciado){
        $this->ResSegundoEnunciado = $ResSegundoEnunciado;
    }

    public function setEnunciado3($Enunciado3){
        $this->Enunciado3 = $Enunciado3;
    }

    public function setResTercerEnunciado($ResTercerEnunciado){
        $this->ResTercerEnunciado = $ResTercerEnunciado;
    }

    public function setRetroAlimentacion($RetroAlimentacion){
        $this->RetroAlimentacion = $RetroAlimentacion;
    }

    public function setIdBanco($IdBanco){
        $this->IdBanco = $IdBanco;
    }

    public function CreatePreguntaEmpar() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        //echo "INSERT INTO `bancoemparejamiento`(`Pregunta`, `Enunciado1`, `ResPrimerEnunciado`, `Enunciado2`, `ResSegundoEnunciado`, `Enunciado3`, `ResTercerEnunciado`, `RetroAlimentacion`, `Valor`, `IdBanco`) VALUES ('$this->Pregunta','$this->Enunciado1','$this->ResPrimerEnunciado','$this->Enunciado2','$this->ResSegundoEnunciado','$this->Enunciado3','$this->ResTercerEnunciado','$this->RetroAlimentacion','$this->Valor','$this->IdBanco')";
        $resSQL=$miconexion->consulta("INSERT INTO `bancoemparejamiento`(`Pregunta`, `Enunciado1`, `ResPrimerEnunciado`, `Enunciado2`, `ResSegundoEnunciado`, `Enunciado3`, `ResTercerEnunciado`, `RetroAlimentacion`, `IdBanco`) VALUES ('$this->Pregunta','$this->Enunciado1','$this->ResPrimerEnunciado','$this->Enunciado2','$this->ResSegundoEnunciado','$this->Enunciado3','$this->ResTercerEnunciado','$this->RetroAlimentacion','$this->IdBanco')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    public function UpdatePreguntaEmpar($id){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        //echo "INSERT INTO `bancoemparejamiento`(`Pregunta`, `Enunciado1`, `ResPrimerEnunciado`, `Enunciado2`, `ResSegundoEnunciado`, `Enunciado3`, `ResTercerEnunciado`, `RetroAlimentacion`, `Valor`, `IdBanco`) VALUES ('$this->Pregunta','$this->Enunciado1','$this->ResPrimerEnunciado','$this->Enunciado2','$this->ResSegundoEnunciado','$this->Enunciado3','$this->ResTercerEnunciado','$this->RetroAlimentacion','$this->Valor','$this->IdBanco')";
        $resSQL=$miconexion->consulta("UPDATE `bancoemparejamiento` SET `Pregunta`='$this->Pregunta',`Enunciado1`='$this->Enunciado1',`ResPrimerEnunciado`='$this->ResPrimerEnunciado',`Enunciado2`='$this->Enunciado2',`ResSegundoEnunciado`='$this->ResSegundoEnunciado',`Enunciado3`='$this->Enunciado3',`ResTercerEnunciado`='$this->ResTercerEnunciado',`RetroAlimentacion`='$this->RetroAlimentacion' WHERE `IdBancoEmpar`= '$id'");
        //$this->Disconnect(); 
        return $resSQL;
    }
    
    public function ListPreguntaEmpar($idBanco){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT be.IdBancoEmpar AS ID, bp.Tema, be.Pregunta FROM bancoemparejamiento be, bancopreguntas bp WHERE be.IdBanco = bp.IdBanco AND be.IdBanco = '$idBanco'");
        $resSQL=$miconexion->VerListPreEmpar();
        //$this->Disconnect();
        return $resSQL;
    }
    public function deletePreguntaEmpar($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `bancoemparejamiento` WHERE `IdBancoEmpar` = '$id'");
        //$this->Disconnect();
        return $resSQL;
    }


}

?>