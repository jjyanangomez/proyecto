<?php

require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class UserModel{

    private $IdUsuario;
    private $Nombre;	
    private $Apellidos;	
    private $Correo;	
    private $Rol; 
    private $Usuario;
    private $Contrasenia;
    
    
    //set
    public function getIdUsuario(){
        return $this->IdUsuario;
    }
    
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

    public function setCorreo($Correo){
        $this->Correo = $Correo;
    }

    public function setRol($Rol){
        $this->Rol = $Rol;
    }

    public function setUsuario($Usuario){
        $this->Usuario = $Usuario;
    }

    public function setContrasenia($Contrasenia){
        $this->Contrasenia = $Contrasenia;
    }

    public function CreateUser() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        $resSQL=$miconexion->consulta("INSERT INTO `usuario`(`Nombre`, `Apellidos`, `Correo`, `Rol`, `Usuario`, `Contrasenia`) VALUES ('$this->Nombre','$this->Apellidos','$this->Correo','$this->Rol','$this->Usuario','$this->Contrasenia')");
        //$this->Disconnect(); 
        return $resSQL;
    }
    
    public function ValidarUser(){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("select * from usuario Where Usuario= '$this->Usuario' Or Correo='$this->Correo';");
        $list=$miconexion->consulta_lista();
        if ($list[0]) {
            return 1;
        }else{
            return 0;
        }
    }

    public function getUser($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT `Usuario`,`Nombre`,`Apellidos`,`Correo`,`Rol`,`Contrasenia` FROM `usuario` WHERE `IdUsuario` = '".$id."'");
        $listaBanco=$miconexion->consulta_lista();
        return $listaBanco;
    }
    public function UpdateUser($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("UPDATE `usuario` SET `Nombre`= '$this->Nombre',`Apellidos`= '$this->Apellidos',`Correo`= '$this->Correo',`Usuario`= '$this->Usuario' WHERE `IdUsuario`= '".$id."'");
        return $resSQL;
    }
    public function UpdateUserContra($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "UPDATE `usuario` SET `Contrasenia`= '$this->Contrasenia' WHERE `IdUsuario`= '".$id."'";
        $resSQL=$miconexion->consulta("UPDATE `usuario` SET `Contrasenia`= '$this->Contrasenia' WHERE `IdUsuario`= '".$id."'");
        return $resSQL;
    }
    public function UpdateUserAdmin($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "UPDATE `usuario` SET `Nombre`= '$this->Nombre',`Apellidos`= '$this->Apellidos',`Correo`= '$this->Correo',`Usuario`= '$this->Usuario',`Rol`='$this->Rol', `Contrasenia`= '$this->Contrasenia' WHERE `IdUsuario`= '".$id."'";
        $resSQL=$miconexion->consulta("UPDATE `usuario` SET `Nombre`= '$this->Nombre',`Apellidos`= '$this->Apellidos',`Correo`= '$this->Correo',`Usuario`= '$this->Usuario',`Rol`='$this->Rol' WHERE `IdUsuario`= '".$id."'");
        return $resSQL;
    }
    
    public function getUserAdmin($id){
        $miconexion= new clase_mysqli();
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("SELECT * FROM `usuario` WHERE `IdUsuario` = '".$id."'");
            $listaUser=$miconexion->consulta_lista();
        return $listaUser;     
    }

    public function ListUser(){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT * FROM `usuario` ORDER by Rol");
        $resSQL=$miconexion->VerListUser();
        //$this->Disconnect();
        return $resSQL;
    }

    public function deleteUser($id,$idAdmin) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL1=$miconexion->consulta("UPDATE `bancopreguntas` SET `IdUsuario`= '$idAdmin' WHERE `IdUsuario` = '$id'");
        $resSQL=$miconexion->consulta("DELETE FROM `usuario` WHERE `IdUsuario`= '$id'");
        //$this->Disconnect();
        return $resSQL;
    }
}

?>