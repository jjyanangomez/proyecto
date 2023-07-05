<?php
	session_start();
	if($_SESSION['autentificado'] && $_SESSION['username'] && $_SESSION['roll']=="Administrador"){
		include("../dll/config.php"); 
		include("../dll/class_mysql.php");
		$miconexion = new clase_mysqli;
		$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
	}else{
		header('Location: ../../');
	}
?>