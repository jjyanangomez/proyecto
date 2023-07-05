<?php
header('Content-Type: application/json; application/x-www-form-urlencoded; multipart/form-data; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Max-Age:1800");

require_once "../../dll/config.php";
require_once "../../dll/class_mysql.php";
$miconexion = new clase_mysqli;
$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
//Crear el Metodo Post
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $input = $_POST;
    if(isset($_POST['Nombre']) && $_POST['CodeCuestionario']){
        $sql= "INSERT INTO `reportes`(`Nombre`, `Correo`, `CodeCuestionario`, `Puntaje`, `ResulEvaluacion`, `ListaPreTFCorrectas`, `ListaPreTFIncorrectas`, `ListaPreOpcionCorrectas`, `ListaPreOpcionIncorrectas`, `ListaPreEmpaCorrectas`, `ListaPreEmpaIncorrectas`, `FechaInicio`, `FechaFinal`,`Juego`) 
            VALUES ('".$_POST['Nombre']."','".$_POST['Correo']."','".$_POST['CodeCuestionario']."','".$_POST['Puntaje']."','".$_POST['ResulEvaluacion']."','".$_POST['ListaPreTFCorrectas']."','".$_POST['ListaPreTFIncorrectas']."','".$_POST['ListaPreOpcionCorrectas']."','".$_POST['ListaPreOpcionIncorrectas']."','".$_POST['ListaPreEmpaCorrectas']."','".$_POST['ListaPreEmpaIncorrectas']."','".$_POST['FechaInicio']."','".$_POST['FechaFinal']."','".$_POST['Juego']."');";
        echo $sql;
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