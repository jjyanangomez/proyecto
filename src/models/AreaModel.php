<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class AreaModel{
    private $IdArea;
    private $Area;

    public function getIdArea(){
        return $this->IdArea;
    }
    
    public function setArea($Area){
        $this->Area = $Area;
    }
    
    public function ListArea(){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("select * from area");
        $resSQL=$miconexion->VerAreas();
        //$this->Disconnect();
        return $resSQL;
    }
    public function ListAreaTabla(){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT * FROM area ");
        $resSQL=$miconexion->VerListAreas();
        //$this->Disconnect();
        return $resSQL;
    }
    public function CreateArea() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        $resSQL=$miconexion->consulta("INSERT INTO `area`(`Area`) VALUES ('$this->Area')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    public function getArea($id){
        $miconexion= new clase_mysqli();
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("SELECT * FROM `area` WHERE `IdArea` = '".$id."'");
            $listaArea=$miconexion->consulta_lista();
        return $listaArea;     
    }
    
    public function deleteArea($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `area` WHERE `IdArea` = '$id'");
        //$this->Disconnect();
        return $resSQL;
    }
    public function UpdateArea($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("UPDATE `area` SET `Area`= '$this->Area' WHERE `IdArea` = $id;");
        return $resSQL;
    }
    
}

?>