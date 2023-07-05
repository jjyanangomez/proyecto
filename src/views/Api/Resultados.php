<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once "../../dll/config.php";
require_once "../../dll/class_mysql.php";
$miconexion = new clase_mysqli;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET["key"])){
        //$resSQL=$miconexion->consulta("SELECT re.IdReporte, re.Nombre, re.Correo , re.ResulEvaluacion, re.Puntaje AS 'Puntaje', TIMEDIFF(TIME_FORMAT(re.FechaFinal,'%H:%i:%S'),TIME_FORMAT(re.FechaInicio,'%H:%i:%S')) AS 'Duracion' FROM reportes re WHERE re.CodeCuestionario ='".$_GET["key"]."' ORDER BY re.ResulEvaluacion DESC, re.puntaje DESC;");
        $resSQL=$miconexion->consulta("SELECT re.IdReporte, re.Nombre, re.Correo , re.ResulEvaluacion, re.Puntaje AS 'Puntaje', TIMEDIFF(TIME_FORMAT(re.FechaFinal,'%H:%i:%S'),TIME_FORMAT(re.FechaInicio,'%H:%i:%S')) AS 'Duracion' FROM reportes re WHERE re.CodeCuestionario ='".$_GET["key"]."' ORDER BY Duracion, re.ResulEvaluacion DESC");
        $list=$miconexion->consulta_lista_Array();
        //$list1=$miconexion->consulta_lista();
        $Array_Reportes= array();
        if($list){
            if($list[0][0]){
                for($i=0; $i < sizeof($list) ; $i++){
                    $horaActual = date($list[$i][4]);
                    //echo $horaActual;
                    array_push($Array_Reportes,array("IdReporte"=>$list[$i][0],"Nombre"=>$list[$i][1],"Correo"=>$list[$i][2],"ResultadoEva"=>$list[$i][3],"Puntaje"=>(string)$list[$i][4],"Duracion"=>(string)$list[$i][5]));
                }
                echo json_encode(array('status' => true,"Resultados"=>$Array_Reportes));
            }else{
                $resultData = array('status' => false, 'message' => 'Problema al presentar Información...');
                echo  json_encode($resultData);
            }
        }else{
            $resultData = array('status' => false, 'message' => 'No Existe Información...');
                echo  json_encode($resultData);
        }
    }else{
        $resultData = array('status' => false, 'message' => 'No existe la Clave...');
        echo  json_encode($resultData);
    }
}

?>