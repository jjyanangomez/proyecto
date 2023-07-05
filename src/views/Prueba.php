<?php
    header('Content-Type: application/json; charset=utf-8');
    //include("../Security/seguridadTeacher.php");
    require_once "../dll/config.php";
    require_once "../dll/class_mysql.php";
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("SELECT cu.NombreCuestionario,cu.CodigoCuestionario,cu.NumPreguntas,cu.ValorPregunta, cu.EstadoCuestionario, cu.IdBanco FROM cuestionarios cu WHERE cu.CodigoCuestionario = 'primerBim'");
    $resSQL=$miconexion->consulta_lista_Array();
    $valo1= $resSQL[0][0];
    $valo2= $resSQL[0][1];
    $valo3= $resSQL[0][2];
    $valo4= $resSQL[0][3];
    $valo5= $resSQL[0][4];
    $valo6= $resSQL[0][5];
    $resSQL=$miconexion->consulta("SELECT `Tema`,`Asignatura`,`IdBanco` FROM `bancopreguntas` WHERE `IdBanco` = 7");
    $resSQL=$miconexion->consulta_lista_Array();
    $tema = $resSQL[0][0];
    $Asignatura = $resSQL[0][1];
    $IdBanco = $resSQL[0][2];
    $resSQL=$miconexion->consulta("SELECT `IdBancoTrueFalse`,`Pregunta`,`Respuesta`,`RetroAlimentacion` FROM `bancotruefalse` WHERE `IdBanco` = 7");
    $resSQL=$miconexion->consulta_lista_Array();
    $Array_PreguntasTF= array();
    
    for ($i=0; $i < sizeof($resSQL) ; $i++){
        $Array_Preguntas= array();
        $aux = $resSQL[$i][0];
        $aux1 = $resSQL[$i][1];
        $aux2 = $resSQL[$i][2];
        $aux3 = $resSQL[$i][3];
        //echo "".$resSQL[$i][2]."<br>";
        $Array_Preguntas = array("IdBancoTrueFalse"=>$aux,"Pregunta"=>$aux1,"Respuesta"=>$aux2,"RetroAlimentacion"=>$aux3);
        //$Array_PreguntasTF = array($Array_Preguntas);
        array_push($Array_PreguntasTF,array("IdBancoTrueFalse"=>$aux,"Pregunta"=>$aux1,"Respuesta"=>$aux2,"RetroAlimentacion"=>$aux3));
        //print_r($Array_PreguntasTF);
        //array_push($Array_PreguntasTF,$Array_Preguntas);
        unset($Array_Preguntas);
        
    }
    //print_r(array("PreguntasTF"=>$Array_PreguntasTF));
    $d= array("PreguntasTF"=>$Array_PreguntasTF);
    //echo "".$Array_PreguntasTF[0]["RetroAlimentacion"];
    //print_r($d);
    //echo json_encode($d);
    
    $Array_Banco = array("Tema"=>$tema,"Asignatura"=>$Asignatura,"Id"=>$IdBanco,"PreguntasTF"=>$Array_PreguntasTF);
    $banco = $Array_Banco;
    $s = array("Banco"=>array($Array_Banco,$banco));
    //print_r($s);
    
    $Array_Cuestionario = array("NombreCuestionario"=>$valo1,"CodigoCuestionario"=>$valo2,"NumPreguntas"=>$valo3,"ValorPregunta"=>$valo4,"EstadoCuestionario"=>$valo5,"Banco"=>$Array_Banco);
    
    //$Array_Cuestionario["EstadoCuestionario"] = $resSQL[0]
    /*$array_1['saludo']= "hola";
    $array_1['array'] = [$resSQL,$resSQL,$resSQL];
    $array_3['opcion1'] = $resSQL;
    $array_3['opcion3'] = $resSQL;
    $array_3['opcion2'] = $resSQL;
    $array_1['array1'] = $array_3;
    echo ''.$resSQL[0];
    //echo $resSQL["Tema"];*/
    echo json_encode(array("Cuestionario"=>$Array_Cuestionario));
    //echo ''.$resSQL[1];
    /*foreach ($resSQL as $valor){
        echo ''.$valor[1].'<br>';
        
    }
    echo 'es el tama;o'.sizeof($resSQL);*/
    //$resSQL=$miconexion->consulta_json();
?>