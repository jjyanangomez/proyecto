<?php
    if(isset($_GET["correo"])&& isset($_GET["code"])){
        $correo = $_GET["correo"];
        $codigo = $_GET["code"];
        if($codigo != md5($correo)){
            echo "<script>location.href='../../views/Teacher/Login.html'</script>";
        }
    }else{
        echo "<script>location.href='../../views/Teacher/Login.html'</script>";
    }
?>
<html>
<head>
	<title>Recuperar contraseña</title>
    <meta charset="utf-8">
    <!--caracteres especiales-->
    <meta http equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../../../assets/icons/book.ico" />

     <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- ss-->
    <link rel="stylesheet" type="text/css" href="../../../css/css.css" >

</head>
<body>
    <div class="modal-dialog text-center">
    	<h2>GAMIFICEV-Renovación de Contraseña</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="../../../assets/img/Candado.png" />
                </div>
                <form class="col-12" action="../../dll/aceptarCorreo.php?Correo=<?php echo $correo;?>" method="POST">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" required="" placeholder="Contraseña Nueva" name="ContraNueva" id="ContraNueva" maxlength="50" minlength="1"/>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Validar</button>
                </form>
               
            </div>
        </div>
    </div>
    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("ContraNueva");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>
</body>
</html>