<?php
    include ("config.php");
    include ("class_mysql.php");
    if(isset($_POST["ContraNueva"]) && isset($_GET["Correo"])){
        $contra = md5($_POST["ContraNueva"]);
        $Correo = $_GET["Correo"];
        $miconexion= new clase_mysqli();
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("UPDATE `usuario` SET `Contrasenia` = '$contra' WHERE  `usuario`.`Correo`= '$Correo';");
        if($resSQL == 1){
            echo '<script>alert("Contraseña cambiada");</script>';
	        echo "<script>location.href='../../src/views/Teacher/Login.html'</script>";
        }else{
            echo '<script>alert("No se pudo completar el cambio de contraseña");</script>';
	        echo "<script>location.href='../../src/views/Teacher/Login.html'</script>";
        }
    }



?>