<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class BancoModel{
    private $IdBanco;
    private $Tema;
    private $Asignatura;
    private $CodigoBanco;
    private $IdArea;
    private $IdCarrera;
    private $IdUsuario;

    public function getIdBanco(){
        return $this->IdBanco;
    }
    
    public function setTema($Tema){
        $this->Tema = $Tema;
    }

    public function setAsignatura($Asignatura){
        $this->Asignatura = $Asignatura;
    }
    
    public function setIdArea($IdArea){
        $this->IdArea = $IdArea;
    }
    public function setIdCarrera($IdCarrera){
        $this->IdCarrera = $IdCarrera;
    }
    public function setIdUsuario($IdUsuario){
        $this->IdUsuario = $IdUsuario;
    }

    public function CreateBanco() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        $resSQL=$miconexion->consulta("INSERT INTO `bancopreguntas`(`Tema`, `Asignatura`, `IdArea`, `IdCarrera`, `IdUsuario`) VALUES ('$this->Tema','$this->Asignatura','$this->IdArea','$this->IdCarrera','$this->IdUsuario')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    public function ListBanco($idUser){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT bp.IdBanco,a.Area,ca.Carrera, bp.Asignatura, bp.Tema FROM bancopreguntas bp, area a, carrera ca WHERE bp.IdArea=a.IdArea AND bp.IdCarrera=ca.IdCarrera AND bp.IdUsuario = '$idUser'");
        $resSQL=$miconexion->VerListBancos();
        //$this->Disconnect();
        return $resSQL;
    }
    

    public function deleteBanco($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `bancopreguntas` WHERE `IdBanco` = '$id'");
        //$this->Disconnect();
        return $resSQL;
    }

    public function getBanco($id){
        $miconexion= new clase_mysqli();
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("SELECT `Tema`,`Asignatura` FROM `bancopreguntas` WHERE `IdBanco` = '".$id."'");
            $listaBanco=$miconexion->consulta_lista();
        return $listaBanco;     
    }
    public function UpdateBanco($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("UPDATE `bancopreguntas` SET `Tema`= '$this->Tema',`Asignatura`= '$this->Asignatura',`IdArea`= '$this->IdArea',`IdCarrera`= '$this->IdCarrera' WHERE `IdBanco`= $id;");
        return $resSQL;
    }


    public function ListComboBoxBancos($idUser){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT bp.IdBanco, bp.Tema FROM bancopreguntas bp WHERE bp.IdUsuario = '$idUser'");
        $resSQL=$miconexion->VerBancoComboBox();
        //$this->Disconnect();
        return $resSQL;
    }


    public function VerTemaBanco($aux){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT b.Tema,b.Asignatura FROM bancopreguntas b WHERE IdBanco = '$aux'");
        $resSQL=$miconexion->PresentarTitulo();
        return $resSQL;
    }
}

?>