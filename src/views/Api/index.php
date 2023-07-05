<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age:1800");

require_once "../../dll/config.php";
require_once "../../dll/class_mysql.php";
$miconexion = new clase_mysqli;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET["key"])){
        $resSQL=$miconexion->consulta("SELECT c.IdCuestionario FROM cuestionarios c WHERE c.CodigoCuestionario = '".$_GET["key"]."'");
        $list=$miconexion->consulta_lista();
        if($list){
            $resSQL=$miconexion->consulta("SELECT c.EstadoCuestionario, c.NumPreguntas FROM cuestionarios c WHERE c.EstadoCuestionario=1 AND c.CodigoCuestionario= '".$_GET["key"]."'");
            $list1=$miconexion->consulta_lista();
            if($list1[0]){
                $num= round((float)$list1[1]/3);
                $numTF = $num;
                $numOp = $num;
                $numEm = 0;
                if(($numTF+$numOp)<$list1[1]){
                    $numEm = $list1[1]-($numTF+$numOp);
                }
                $resSQL=$miconexion->consulta("SELECT cu.NombreCuestionario,cu.CodigoCuestionario,cu.NumPreguntas,cu.ValorPregunta, IF(cu.EstadoCuestionario, 'Activo', 'Inactivo') EstadoCuestionario, cu.IdBanco, cu.ValorCuestionario FROM cuestionarios cu WHERE cu.CodigoCuestionario = '".$_GET["key"]."'");
                $resSQL=$miconexion->consulta_lista();
                //Consulta para sacar el Banco;
                $resSQLBanco=$miconexion->consulta("SELECT `Tema`,`Asignatura`,`IdBanco` FROM `bancopreguntas` WHERE `IdBanco` = '".$resSQL[5]."'");
                $resSQLBanco=$miconexion->consulta_lista();
                /********************************** */
                //Consulta para sacar las Preguntas de Verdadero y Falso
                $resSQLPreTF=$miconexion->consulta("SELECT btf.IdBancoTrueFalse, btf.Pregunta, IF(btf.Respuesta, 'Verdadero', 'Falso') Respuesta,btf.RetroAlimentacion FROM bancotruefalse btf WHERE btf.IdBanco = '".$resSQL[5]."' ORDER BY RAND() LIMIT ".$numTF."");
                $resSQLPreTF=$miconexion->consulta_lista_Array();
                $Array_PreguntasTF= array();
                for ($i=0; $i < sizeof($resSQLPreTF) ; $i++){
                    //$Array_Preguntas= array();
                    $aux = (int)$resSQLPreTF[$i][0];
                    $aux1 = $resSQLPreTF[$i][1];
                    $aux2 = $resSQLPreTF[$i][2];
                    $aux3 = $resSQLPreTF[$i][3];
                    //$Array_Preguntas = array("IdBancoTrueFalse"=>$aux,"Pregunta"=>$aux1,"Respuesta"=>$aux2,"RetroAlimentacion"=>$aux3);
                    array_push($Array_PreguntasTF,array("IdBancoTrueFalse"=>$aux,"Pregunta"=>$aux1,"Respuesta"=>$aux2,"RetroAlimentacion"=>$aux3));
                    
                }
                /********************************************* */
                //Consulta para sacar las Preguntas de Opcion Multiple
                $resSQLPreOP=$miconexion->consulta("SELECT bop.IdBancoOpcion, bop.Pregunta, bop.Respuesta1, IF(bop.OpValida1, 'Correcto', 'Incorrecto') OpValida1, bop.Respuesta2, IF(bop.OpValida2, 'Correcto', 'Incorrecto') OpValida2, bop.Respuesta3, IF(bop.OpValida3, 'Correcto', 'Incorrecto') OpValida3, bop.Respuesta4, IF(bop.OpValida4, 'Correcto', 'Incorrecto') OpValida4, bop.RetroAlimentacion FROM bancoopcionmul bop WHERE bop.IdBanco = '".$resSQL[5]."' ORDER BY RAND() LIMIT ".$numOp."");
                //$ayuda=$miconexion->consulta_lista();
                $resSQLPreOP=$miconexion->consulta_lista_Array();
                $Array_PreguntasOP= array();
                /*if($ayuda[0]){
    
                }else{
                    echo "no existen datos";
                }*/
                for ($i=0; $i < sizeof($resSQLPreOP) ; $i++){
                    //$Array_Preguntas= array();
                    $aux = (int)$resSQLPreOP[$i][0];
                    $aux1 = $resSQLPreOP[$i][1];
                    $aux2 = $resSQLPreOP[$i][2];
                    $aux3 = $resSQLPreOP[$i][3];
                    $aux4 = $resSQLPreOP[$i][4];
                    $aux5 = $resSQLPreOP[$i][5];
                    $aux6 = $resSQLPreOP[$i][6];
                    $aux7 = $resSQLPreOP[$i][7];
                    $aux8 = $resSQLPreOP[$i][8];
                    $aux9 = $resSQLPreOP[$i][9];
                    $aux10 = $resSQLPreOP[$i][10];
                    //$Array_Preguntas = array("IdBancoTrueFalse"=>$aux,"Pregunta"=>$aux1,"Respuesta"=>$aux2,"RetroAlimentacion"=>$aux3);
                    array_push($Array_PreguntasOP,array("IdBancoOpcion"=>$aux,"Pregunta"=>$aux1,"Respuesta1"=>$aux2,"OpValida1"=>$aux3,"Respuesta2"=>$aux4,"OpValida2"=>$aux5,"Respuesta3"=>$aux6,"OpValida3"=>$aux7,"Respuesta4"=>$aux8,"OpValida4"=>$aux9,"RetroAlimentacion"=>$aux10));
                    
                }
                /************************************** */
                //Consulta para sacar las Preguntas de Emparejamiento
                $resSQLPreEm=$miconexion->consulta("SELECT be.IdBancoEmpar, be.Pregunta, be.Enunciado1, be.ResPrimerEnunciado, be.Enunciado2, be.ResSegundoEnunciado, be.Enunciado3, be.ResTercerEnunciado, be.RetroAlimentacion FROM bancoemparejamiento be WHERE be.IdBanco = '".$resSQL[5]."' ORDER BY RAND() LIMIT ".$numEm."");
                $resSQLPreEm=$miconexion->consulta_lista_Array();
                $Array_PreguntasEm= array();
                for ($i=0; $i < sizeof($resSQLPreEm) ; $i++){
                    //$Array_Preguntas= array();
                    $aux = (int)$resSQLPreEm[$i][0];
                    $aux1 = $resSQLPreEm[$i][1];
                    $aux2 = $resSQLPreEm[$i][2];
                    $aux3 = $resSQLPreEm[$i][3];
                    $aux4 = $resSQLPreEm[$i][4];
                    $aux5 = $resSQLPreEm[$i][5];
                    $aux6 = $resSQLPreEm[$i][6];
                    $aux7 = $resSQLPreEm[$i][7];
                    $aux8 = $resSQLPreEm[$i][8];
                    //$Array_Preguntas = array("IdBancoTrueFalse"=>$aux,"Pregunta"=>$aux1,"Respuesta"=>$aux2,"RetroAlimentacion"=>$aux3);
                    array_push($Array_PreguntasEm,array("IdBancoEmpar"=>$aux,"Pregunta"=>$aux1,"Enunciado1"=>$aux2,"ResPrimerEnunciado"=>$aux3,"Enunciado2"=>$aux4,"ResSegundoEnunciado"=>$aux5,"Enunciado3"=>$aux6,"ResTercerEnunciado"=>$aux7,"RetroAlimentacion"=>$aux8));
                    
                }
    
                $Array_Banco = array("Tema"=>$resSQLBanco[0],"Asignatura"=>$resSQLBanco[1],"Id"=>$resSQLBanco[2],"PreguntasTF"=>$Array_PreguntasTF,"PreguntasOpcion"=>$Array_PreguntasOP,"PreguntasEmparejamiento"=>$Array_PreguntasEm);
                
                $Array_Cuestionario = array("NombreCuestionario"=>$resSQL[0],"CodigoCuestionario"=>$resSQL[1],"NumPreguntas"=>(int)$resSQL[2],"ValorPregunta"=>(double)$resSQL[3],"ValorCuestionario"=>(int)$resSQL[6],"EstadoCuestionario"=>$resSQL[4],"Banco"=>$Array_Banco);
                echo json_encode(array('status' => true,"Cuestionario"=>$Array_Cuestionario));
    
    
            }else{
            $resultData = array('status' => false, 'message' => 'Información no disponible...');
            echo  json_encode($resultData);
            }
        }else{
            $resultData = array('status' => false, 'message' => 'No Existe Información..');
            echo  json_encode($resultData);
        }
    }else{
        $resultData = array('status' => false, 'message' => 'Ingrese una clave para obtener información...');
        echo  json_encode($resultData);
    }
}

//Crear el Metodo Post
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST;
    if(isset($_POST['Nombre']) && $_POST['CodeCuestionario']){
        $sql= "INSERT INTO `reportes`(`Nombre`, `Correo`, `CodeCuestionario`, `Puntaje`, `ResulEvaluacion`, `ListaPreTFCorrectas`, `ListaPreTFIncorrectas`, `ListaPreOpcionCorrectas`, `ListaPreOpcionIncorrectas`, `ListaPreEmpaCorrectas`, `ListaPreEmpaIncorrectas`, `FechaInicio`, `FechaFinal`,`Juego`) 
            VALUES ('".$_POST['Nombre']."','".$_POST['Correo']."','".$_POST['CodeCuestionario']."','".$_POST['Puntaje']."','".$_POST['ResulEvaluacion']."','".$_POST['ListaPreTFCorrectas']."','".$_POST['ListaPreTFIncorrectas']."','".$_POST['ListaPreOpcionCorrectas']."','".$_POST['ListaPreOpcionIncorrectas']."','".$_POST['ListaPreEmpaCorrectas']."','".$_POST['ListaPreEmpaIncorrectas']."','".$_POST['FechaInicio']."','".$_POST['FechaFinal']."','".$_POST['Juego']."');";
        //echo $sql;
        //echo json_encode($input);
        $resSQL=$miconexion->consulta($sql);

        if($resSQL){
            header("HTTP/1.1 200 OK");
            //echo json_encode($input);
        }else{
            header("HTTP/1.1 400 Bad Request");
        }
    }else{
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        //echo $data->Nombre;
        $sql= "INSERT INTO `reportes`(`Nombre`, `Correo`, `CodeCuestionario`, `Puntaje`, `ResulEvaluacion`, `ListaPreTFCorrectas`, `ListaPreTFIncorrectas`, `ListaPreOpcionCorrectas`, `ListaPreOpcionIncorrectas`, `ListaPreEmpaCorrectas`, `ListaPreEmpaIncorrectas`, `FechaInicio`, `FechaFinal`,`Juego`) 
            VALUES ('$data->Nombre','$data->Correo','$data->CodeCuestionario','$data->Puntaje','$data->ResulEvaluacion','$data->ListaPreTFCorrectas','$data->ListaPreTFIncorrectas','$data->ListaPreOpcionCorrectas','$data->ListaPreOpcionIncorrectas','$data->ListaPreEmpaCorrectas','$data->ListaPreEmpaIncorrectas','$data->FechaInicio','$data->FechaFinal','$data->Juego');";
        echo $sql;
        $resSQL=$miconexion->consulta($sql);

        if($resSQL){
            header("HTTP/1.1 200 OK");
            //echo json_encode($input);
        }else{
            header("HTTP/1.1 400 Bad Request");
        }
    }
    

}
?>