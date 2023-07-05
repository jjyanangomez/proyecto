<?php
    header('Content-Type: application/json; charset=utf-8');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once "../../dll/config.php";
    require_once "../../dll/class_mysql.php";
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    if(isset($_GET["key"])){
        $resSQL=$miconexion->consulta("SELECT cu.EstadoCuestionario FROM cuestionarios cu WHERE cu.CodigoCuestionario = '".$_GET["key"]."'");
        $list=$miconexion->consulta_lista();
        
        if ($list) {
            if($list[0]==1){
                $resultData = array('status' => true, 'message' => 'El cuestionario se encuentra habilitado...');
                echo  json_encode($resultData);
            }else{
                $resultData = array('status' => false, 'message' => 'El cuestionario no se encuentra habilitado...');
                echo  json_encode($resultData);
            }
        }else{
            $resultData = array('status' => false, 'message' => 'No Existe Información...');
            echo  json_encode($resultData);
        }

    }else{
        $resultData = array('status' => false, 'message' => 'No Existe Información...');
        echo  json_encode($resultData);
    }
?>