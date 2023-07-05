<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class PreguntaTFModel{
    private $IdBancoTrueFalse;
    private $Pregunta;
    private $Respuesta;
    private $RetroAlimentacion;
    private $Valor;
    private $IdBanco;

    public function getIdBancoTrueFalse(){
        return $this->IdBancoTrueFalse;
    }
    
    public function setPregunta($Pregunta){
        $this->Pregunta = $Pregunta;
    }
    
    public function setRespuesta($Respuesta){
        $this->Respuesta = $Respuesta;
    }

    public function setRetroAlimentacion($RetroAlimentacion){
        $this->RetroAlimentacion = $RetroAlimentacion;
    }

    public function setIdBanco($IdBanco){
        $this->IdBanco = $IdBanco;
    }

    public function CreatePreguntaTF() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        //echo "INSERT INTO `bancotruefalse`(`Pregunta`, `Respuesta`, `Valor`, `RetroAlimentacion`, `IdBanco`) VALUES ('$this->Pregunta','$this->Respuesta','$this->Valor','$this->RetroAlimentacion','$this->IdBanco')";
        $resSQL=$miconexion->consulta("INSERT INTO `bancotruefalse`(`Pregunta`, `Respuesta`, `RetroAlimentacion`, `IdBanco`) VALUES ('$this->Pregunta','$this->Respuesta','$this->RetroAlimentacion','$this->IdBanco')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    public function UpdatePreguntaTF($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        //echo "INSERT INTO `bancotruefalse`(`Pregunta`, `Respuesta`, `Valor`, `RetroAlimentacion`, `IdBanco`) VALUES ('$this->Pregunta','$this->Respuesta','$this->Valor','$this->RetroAlimentacion','$this->IdBanco')";
        $resSQL=$miconexion->consulta("UPDATE `bancotruefalse` SET `Pregunta`='$this->Pregunta',`Respuesta`='$this->Respuesta',`RetroAlimentacion`='$this->RetroAlimentacion' WHERE `IdBancoTrueFalse`= '$id'");
        //$this->Disconnect(); 
        return $resSQL;
    }
    
    public function ListPreguntaTF($idBanco){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT btf.IdBancoTrueFalse AS 'ID ', bp.Tema, btf.Pregunta FROM bancotruefalse btf, bancopreguntas bp WHERE btf.IdBanco = bp.IdBanco AND btf.IdBanco = '$idBanco'");
        $resSQL=$miconexion->VerListPreTF();
        //$this->Disconnect();
        return $resSQL;
    }

    public function deletePreguntaTF($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `bancotruefalse` WHERE `IdBancoTrueFalse` = '$id'");
        //$this->Disconnect();
        return $resSQL;
    }

}    
?>