<?php
require_once "../models/ReportModel.php";
class ReportController{
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

    public function ListReportes($id, $codigo)
    {
        $report = new ReportModel();
        $userResponse = $report->ListReportes($id, $codigo);
        
    }
}

?>