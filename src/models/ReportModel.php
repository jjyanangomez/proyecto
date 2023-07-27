<?php
require_once "../dll/config.php";
require_once "../dll/class_mysql.php";

class ReportModel{
    public function ListReportes($id, $codigo){
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT re.IdReporte AS 'Identificador', re.Nombre, re.Correo, re.ResulEvaluacion As 'Calificación', DATE_FORMAT(re.FechaInicio,'%Y/%m/%d') AS FechaInicio, TIMEDIFF(TIME_FORMAT(re.FechaFinal,'%H:%i:%S'),TIME_FORMAT(re.FechaInicio,'%H:%i:%S')) AS 'Duración', bp.Tema FROM reportes re, cuestionarios cu, bancopreguntas bp WHERE cu.IdBanco = bp.IdBanco AND cu.CodigoCuestionario= re.CodeCuestionario AND cu.IdCuestionario ='$id' AND cu.CodigoCuestionario = '$codigo'");
        $resSQL=$miconexion->VerListReportes();
        //$this->Disconnect();
        return $resSQL;
    }
}
?>