<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";
class CuestionarioModel{
    private $IdCuestionario;
    private $NombreCuestionario;
    private $CodigoCuestionario;
    private $NumPreguntas;
    private $ValorPregunta;
    private $ValorCuestionario;
    private $EstadoCuestionario;
    private $IdBanco;

    public function getIdCuestionario(){
        return $this->IdCuestionario;
    }
    
    public function setNombreCuestionario($NombreCuestionario){
        $this->NombreCuestionario = $NombreCuestionario;
    }

    public function setCodigoCuestionario($CodigoCuestionario){
        $this->CodigoCuestionario = $CodigoCuestionario;
    }

    public function setNumPreguntas($NumPreguntas){
        $this->NumPreguntas = $NumPreguntas;
    }

    public function setValorPregunta($ValorPregunta){
        $this->ValorPregunta = $ValorPregunta;
    }

    public function setValorCuestionario($ValorCuestionario){
        $this->ValorCuestionario = $ValorCuestionario;
    }

    public function setEstadoCuestionario($EstadoCuestionario){
        $this->EstadoCuestionario = $EstadoCuestionario;
    }

    public function setIdBanco($IdBanco){
        $this->IdBanco = $IdBanco;
    }

    public function CreateCuestionario() {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //$resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");
        $resSQLAux=$miconexion->consulta("SELECT * FROM `cuestionarios` WHERE `CodigoCuestionario` ='$this->CodigoCuestionario';");
        $list=$miconexion->consulta_lista();
        if ($list[0]) {
            return 0;
        }else{
            $resSQL=$miconexion->consulta("INSERT INTO `cuestionarios`(`NombreCuestionario`, `CodigoCuestionario`, `NumPreguntas`, `ValorPregunta`, `ValorCuestionario`, `EstadoCuestionario`, `IdBanco`) VALUES ('$this->NombreCuestionario','$this->CodigoCuestionario','$this->NumPreguntas','$this->ValorPregunta', '$this->ValorCuestionario', '$this->EstadoCuestionario','$this->IdBanco')");
            return 1;
        }
        //$this->Disconnect(); 
    }
    public function ListCuestionarios($idUser){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT cu.IdCuestionario AS ID, cu.NombreCuestionario AS Nombre, cu.CodigoCuestionario AS Codigo, cu.NumPreguntas AS Preguntas, cu.ValorCuestionario, cu.ValorPregunta , IF(cu.EstadoCuestionario, 'Activo', 'Inactivo') Estado, bp.Tema FROM cuestionarios cu, bancopreguntas bp WHERE cu.IdBanco = bp.IdBanco AND bp.IdUsuario = '$idUser'");
        $resSQL=$miconexion->VerListCuestionarios();
        //$this->Disconnect();
        return $resSQL;
    }
    /* Visualizar los cuestionarios en la sección de reportes */
    public function ListCuestionariosReport($idUser){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT cu.IdCuestionario AS 'Identificador', cu.NombreCuestionario, cu.CodigoCuestionario, IF(cu.EstadoCuestionario, 'Activo', 'Inactivo') Estado, bp.Tema As 'Tema Banco de Preguntas'  FROM cuestionarios cu, bancopreguntas bp, usuario us WHERE cu.IdBanco = bp.IdBanco AND bp.IdUsuario = us.IdUsuario AND us.IdUsuario = '$idUser'");
        $resSQL=$miconexion->VerListCuestionariosReporte();
        //$this->Disconnect();
        return $resSQL;
    }
    public function deleteCuestionario($id) {
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
        $resSQL=$miconexion->consulta("DELETE FROM `cuestionarios` WHERE `IdCuestionario`= '$id'");
        //$this->Disconnect();
        return $resSQL;
    }
    public function getCuestionario($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT `NombreCuestionario`,`CodigoCuestionario`,`NumPreguntas`,`EstadoCuestionario`,`ValorCuestionario`,`IdBanco` FROM `cuestionarios` WHERE `IdCuestionario`= '".$id."'");
        $listaBanco=$miconexion->consulta_lista();
        return $listaBanco;
    }

    public function get($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL1=$miconexion->consulta("SELECT COUNT(*) FROM `bancoemparejamiento` WHERE `IdBanco` = '".$id."'");
        $resSQL1=$miconexion->consulta_lista();
        $resSQL2=$miconexion->consulta("SELECT COUNT(*) FROM `bancoopcionmul` WHERE `IdBanco` = '".$id."'");
        $resSQL2=$miconexion->consulta_lista();
        $resSQL3=$miconexion->consulta("SELECT COUNT(*) FROM `bancotruefalse` WHERE `IdBanco` = '".$id."'");
        $resSQL3=$miconexion->consulta_lista();
        $suma = $resSQL1[0]+$resSQL2[0]+$resSQL3[0];
        return $suma;
    }
    public function getTotalPreguntas($sql){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL1=$miconexion->consulta($sql);
        $resSQL1=$miconexion->consulta_lista();
        return $resSQL1;
    }
    public function UpdateCuestionario($id){
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("UPDATE `cuestionarios` SET `NombreCuestionario`= '$this->NombreCuestionario',`CodigoCuestionario`= '$this->CodigoCuestionario',`NumPreguntas`= '$this->NumPreguntas',`ValorPregunta`= '$this->ValorPregunta',`EstadoCuestionario`= '$this->EstadoCuestionario',`IdBanco`= '$this->IdBanco',`ValorCuestionario`= '$this->ValorCuestionario'  WHERE `IdCuestionario`= $id;");
        return $resSQL;
    }
    
    
    
}

?>