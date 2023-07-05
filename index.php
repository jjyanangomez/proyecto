<?php
    //header('location: src/JuegosStudent.php');

?>

<html>
<head>
	<title>GamificEv</title>
    
    <meta charset="utf-8">
    <!--caracteres especiales-->
    <meta http equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="./assets/icons/book.ico" />

     <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- ss-->
    <link rel="stylesheet" type="text/css" href="./css/css.css" >

</head>
<body>
    <div class="modal-dialog text-center">
    	<h2>GAMIFICEV</h2>
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="./assets/img/user03.png" />
                </div>
                <form class="col-12" action="" method="POST">
                    <a class="btn btn-warning" href="./src/"><b>Estudiante</b></a>
                    <a class="btn btn-primary" href="./src/views/Teacher/Login.html"><b>Docente</b></a>
                </form>
               
            </div>
        </div>
        
    </div>
</body>
</html>