<?php
	session_start();
   if(($_POST['Usuario']) && ($_POST['Contrasenia']))
   {
      $correo=$_POST['Usuario'];
      $clave=md5($_POST['Contrasenia']); 

      include ("config.php");
		  include ("class_mysql.php");
		$miconexion = new clase_mysqli;
		$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
		$miconexion->consulta("select * from usuario where Usuario='$correo' and Contrasenia='$clave'");
		$list=$miconexion->consulta_lista();
    //echo("hola> $list[4]");
		if ($list[0]) {
            $_SESSION['autentificado'] = TRUE;
            $_SESSION['username'] = $list[1]." ".$list[2];
	        $_SESSION['roll'] = $list[4];
			$_SESSION['Usuario'] = $list[0];
          
			if($list[4]=="Docente"){
        		//echo "Soy un Docente";
				echo "<script>location.href='../views/PerfilDocente.php'</script>";
				//echo "<script>location.href='../administrator/index.php'</script>";
			}else if($list[4]=="Estudiante"){
				echo "<script>location.href='../views/PerfilEstudiante.php'</script>";
        		//echo "Soy un Estudiante";
				//echo $_SESSION['roll'];
			}else{
				
        		echo "<script>location.href='../views/Home.php'</script>";
      }
          $_SESSION['local_path']=$local_path;
           
		}else{
			echo '<script>alert("Datos Incorrectos...");</script>';
	        echo "<script>location.href='../../src/views/Teacher/Login.html'</script>";
		}
   }
?>