<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class CarreraModel{
    private $IdCarrera;
    private $Carrera;
    private $IdArea;

    public function getIdCarrera(){
        return $this->IdCarrera;
    }
    
    public function setCarrera($Carrera){
        $this->Carrera = $Carrera;
    }
    public function setIdArea($IdArea){
        $this->IdArea = $IdArea;
    }
    
    public function ListCarrera(){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("select * from carrera");
        $resSQL=$miconexion->VerCarreras();
        //$this->Disconnect();
        return $resSQL;
    }
    public function ListCarreraTabla(){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT ca.IdCarrera,ca.Carrera, ar.Area As Facultad FROM carrera ca, area ar WHERE ca.IdArea = ar.IdArea");
        $resSQL=$miconexion->VerListCarreras();
        //$this->Disconnect();
        return $resSQL;
    }
    public function CreateCarrera() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        $resSQL=$miconexion->consulta("INSERT INTO `carrera`(`Carrera`, `IdArea`) VALUES ('$this->Carrera','$this->IdArea')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    public function getCarrera($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT ca.IdCarrera,ca.Carrera,ar.IdArea, ar.Area As Facultad FROM carrera ca, area ar WHERE ca.IdArea = ar.IdArea AND ca.IdCarrera = '".$id."'");
        $listaArea=$miconexion->consulta_lista();
        return $listaArea;     
    }
    
    public function deleteCarrera($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `carrera` WHERE `IdCarrera` = '$id'");
        //$this->Disconnect();
        return $resSQL;
    }
    public function UpdateCarrera($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "UPDATE `carrera` SET `Carrera`='$this->Carrera',`IdArea`='$this->IdArea' WHERE `IdCarrera` =  $id;";
        $resSQL=$miconexion->consulta("UPDATE `carrera` SET `Carrera`='$this->Carrera',`IdArea`='$this->IdArea' WHERE `IdCarrera` =  $id;");
        return $resSQL;
    }
    

}


?>