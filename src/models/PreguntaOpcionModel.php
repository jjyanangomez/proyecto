<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class PreguntaOpcionModel{
    private $IdBancoOpcion;
    private $Pregunta;
    private $Respuesta1;
    private $OpValida1;
    private $Respuesta2;
    private $OpValida2;
    private $Respuesta3;
    private $OpValida3;
    private $Respuesta4;
    private $OpValida4;
    private $RetroAlimentacion;
    private $IdBanco;

    public function getIdBancoOpcion(){
        return $this->IdBancoOpcion;
    }
    
    public function setPregunta($Pregunta){
        $this->Pregunta = $Pregunta;
    }
    
    public function setRespuesta1($Respuesta1){
        $this->Respuesta1 = $Respuesta1;
    }

    public function setOpValida1($OpValida1){
        $this->OpValida1 = $OpValida1;
    }

    public function setRespuesta2($Respuesta2){
        $this->Respuesta2 = $Respuesta2;
    }

    public function setOpValida2($OpValida2){
        $this->OpValida2 = $OpValida2;
    }

    public function setRespuesta3($Respuesta3){
        $this->Respuesta3 = $Respuesta3;
    }
    
    public function setOpValida3($OpValida3){
        $this->OpValida3 = $OpValida3;
    }

    public function setRespuesta4($Respuesta4){
        $this->Respuesta4 = $Respuesta4;
    }

    public function setOpValida4($OpValida4){
        $this->OpValida4 = $OpValida4;
    }

    public function setRetroAlimentacion($RetroAlimentacion){
        $this->RetroAlimentacion = $RetroAlimentacion;
    }

    public function setIdBanco($IdBanco){
        $this->IdBanco = $IdBanco;
    }

    public function CreatePreguntaOpcion() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        //echo "INSERT INTO `bancoopcionmul`(`Pregunta`, `Respuesta1`, `OpValida1`, `Respuesta2`, `OpValida2`, `Respuesta3`, `OpValida3`, `Respuesta4`, `OpValida4`, `RetroAlimentacion`, `IdBanco`) VALUES ('$this->Pregunta','$this->Respuesta1','$this->OpValida1','$this->Respuesta2','$this->OpValida2','$this->Respuesta3','$this->OpValida3','$this->Respuesta4','$this->OpValida4','$this->RetroAlimentacion','$this->IdBanco')";
        $resSQL=$miconexion->consulta("INSERT INTO `bancoopcionmul`(`Pregunta`, `Respuesta1`, `OpValida1`, `Respuesta2`, `OpValida2`, `Respuesta3`, `OpValida3`, `Respuesta4`, `OpValida4`, `RetroAlimentacion`, `IdBanco`) VALUES ('$this->Pregunta','$this->Respuesta1','$this->OpValida1','$this->Respuesta2','$this->OpValida2','$this->Respuesta3','$this->OpValida3','$this->Respuesta4','$this->OpValida4','$this->RetroAlimentacion','$this->IdBanco')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    public function UpdatePreguntaOpcion($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        //echo "UPDATE `bancoopcionmul` SET `Pregunta`='$this->Pregunta',`Respuesta1`='$this->Respuesta1',`OpValida1`='$this->OpValida1',`Respuesta2`='$this->Respuesta2',`OpValida2`='$this->OpValida2',`Respuesta3`='$this->Respuesta3',`OpValida3`='$this->OpValida3',`Respuesta4`='$this->Respuesta4',`OpValida4`='$this->OpValida4',`RetroAlimentacion`='$this->RetroAlimentacion' WHERE `IdBancoOpcion`='$id'";
        $resSQL=$miconexion->consulta("UPDATE `bancoopcionmul` SET `Pregunta`='$this->Pregunta',`Respuesta1`='$this->Respuesta1',`OpValida1`='$this->OpValida1',`Respuesta2`='$this->Respuesta2',`OpValida2`='$this->OpValida2',`Respuesta3`='$this->Respuesta3',`OpValida3`='$this->OpValida3',`Respuesta4`='$this->Respuesta4',`OpValida4`='$this->OpValida4',`RetroAlimentacion`='$this->RetroAlimentacion' WHERE `IdBancoOpcion`='$id'");
        //$this->Disconnect(); 
        return $resSQL;
    }
    
    public function ListPreguntaOpcion($idBanco){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT bom.IdBancoOpcion AS ID, bp.Tema, bom.Pregunta FROM bancoopcionmul bom, bancopreguntas bp WHERE bom.IdBanco = bp.IdBanco AND bp.IdBanco = '$idBanco'");
        $resSQL=$miconexion->VerListPreOpcion();
        //$this->Disconnect();
        return $resSQL;
    }

    public function deletePreguntaOpcion($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `bancoopcionmul` WHERE `IdBancoOpcion` = '$id'");
        //$this->Disconnect();
        return $resSQL;
    }
}

?>