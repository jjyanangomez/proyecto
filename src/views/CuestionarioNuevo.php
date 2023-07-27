<?php
	include("../Security/seguridadTeacher.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Crear Cuestionario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../../assets/icons/book.ico" />
    <script src="../../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../../css/sweet-alert.css">
    <link rel="stylesheet" href="../../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="../../js/modernizr.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../js/main.js"></script>
</head>
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles" style ="background-color:#0081a2;">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                Sistema GamificEv
            </div>
            <div class="full-reset" style="background-color:#2B3D51; padding: 10px 0; color:#fff;">
                <figure>
                    <img src="../../assets/img/BancoPreguntas.png" alt="GamificEv" class="img-responsive center-box" style="width:55%;">
                </figure>
            </div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="PerfilDocente.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Perfil</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-archive zmdi-hc-fw"></i>&nbsp;&nbsp; Banco de Preguntas <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="BancoPreguntas.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Banco de Preguntas</a></li>
                            <li><a href="listBanco.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Bancos</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i>&nbsp;&nbsp; Cuestionarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="CuestionarioNuevo.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Cuestionario</a></li>
                            <li><a href="listCuestionarios.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Cuestionarios</a></li>
                        </ul>
                    </li>
                    <li><a href="./report.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Docente</span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="../Security/exit.php?salir=true" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema GamificEv <br>
                <small>Administración de Cuestionarios</small>
                </h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation" class="active"><a href="#">Crear nuevo Cuestionario</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../../assets/img/Logo1.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar un nuevo Cuestionario para el sistema de evaluación, debes de llenar todos los campos del siguiente formulario para crearlo.
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo Cuestionario</li>
                      <li><a href="listCuestionarios.php">Lista de Cuestionarios</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <?php
                    include("../Controller/CuestionarioController.php");
                    include("../Controller/BancoController.php");
                    if(isset($_GET["id_Cuestionario"]) && isset($_GET["EditarCuestionario"])){
                        $CuestionarioControl = new CuestionarioController();
                        $id = $_GET['id_Cuestionario'];
			            $listaCues=$CuestionarioControl->getCuestionario($id);
                        $estado=false;
                        if($listaCues[3] == 1){
                            $estado=true;
                        }
                        echo '<div class="title-flat-form title-flat-orange" style="background-color:#0081a2;">Actualizar el Cuestionario</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <form method="post" id ="addQuestionOption" action ="../dll/metodosCuestionario.php?id_Cuestionario='.$id.'&ActualizarCuestionario">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                            <div class="group-material" >
                                                <span>Bancos de Preguntas</span>
                                                <select class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="Seleccione el Banco de preguntas para generar el Cuestionario" id = "ComboBoxBancos" name = "ComboBoxBancos">';
                                                    require_once "../dll/config.php";
                                                    require_once "../dll/class_mysql.php";
                                                    $miconexion = new clase_mysqli;
                                                    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
                                                    $resSQL=$miconexion->consulta("SELECT bp.IdBanco, bp.Tema FROM bancopreguntas bp WHERE bp.IdUsuario = '".$_SESSION['Usuario']."'");
                                                    $resSQL=$miconexion->VerBancoComboBoxV2($listaCues[5]);
                                                    $resSQL=$miconexion->consulta("SELECT bp.IdBanco, bp.Tema FROM bancopreguntas bp WHERE bp.IdUsuario = '".$_SESSION['Usuario']."'");
                                                    $resSQL=$miconexion->VerBancoUpdate();
                                            echo '</select>
                                            </div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" id ="NombreCuestionario" name = "NombreCuestionario" value = "'.$listaCues[0].'" placeholder="Nombre del Cuestionario" required="" maxlength="500" data-toggle="tooltip" data-placement="top" title="Ingrese el nombre del cuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Nombre</label>
                                            </div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" name="Codigo" id="Codigo" value = "'.$listaCues[1].'" placeholder="Codigo de acceso para el nuevo Cuestionario" required="" maxlength="50"  data-toggle="tooltip" data-placement="top" title="Escriba el codigo de seguridad">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Codigo de acceso</label>
                                            </div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" name="ValCuestionario" id="ValCuestionario" value = "'.$listaCues[4].'" placeholder="Valor del Cuestionario para la evaluación" required="" maxlength="50"  data-toggle="tooltip" data-placement="top" title="Escriba un número indicando el valor del cuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Valor del Cuestionario</label>
                                            </div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" id = "NumPreguntas"  name = "NumPreguntas"  value = "'.$listaCues[2].'" placeholder="Numero de Preguntas para el Cuestionario required="" maxlength="10" pattern="[0-9]{1,10}" data-toggle="tooltip" data-placement="top" title="Solo numeros para indicar el numero de pregunta del cuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Numero de Preguntas</label>
                                            </div>';
                                            if($estado){
                                                echo '<div>
                                                        <input class="form-check-input" type="checkbox" value="" id="EstadoCuestionario" name="EstadoCuestionario" checked>
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <label>Publicar Cuestionario</label>
                                                    </div>';
                                            }else{
                                                echo '<div>
                                                        <input class="form-check-input" type="checkbox" value="" id="EstadoCuestionario" name="EstadoCuestionario">
                                                        <span class="highlight"></span>
                                                        <span class="bar"></span>
                                                        <label>Publicar Cuestionario</label>
                                                    </div>';
                                            }
                                            
                                            echo '<p class="text-center">
                                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                                <button type="submit" class="btn btn-primary" value="GuardarPreguntaOpcion" name="GuardarPreguntaOpcion" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                            </p> 
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
                    }else{
                        echo '<div class="title-flat-form title-flat-orange" style="background-color:#0081a2;">Registrar una Nuevo Cuestionario</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <form method="post" id ="addQuestionOption" action ="../dll/add_Cuestionario.php">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                            <div class="group-material" >
                                                <span>Bancos de Preguntas</span>';
                                                    $controlA = new BancoController();
                                                    $controlA->ListComboBoxBancos($_SESSION['Usuario']);
                                            echo '</div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" id ="NombreCuestionario" name = "NombreCuestionario" placeholder="Nombre del Cuestionario" required="" maxlength="500" minlength="5" data-toggle="tooltip" data-placement="top" title="Ingrese el nombre del cuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Nombre</label>
                                            </div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" name="Codigo" id="Codigo" value = ""placeholder="Código de acceso para el nuevo Cuestionario" required="" maxlength="50" minlength="5" data-toggle="tooltip" data-placement="top" title="Escriba el codigo de seguridad">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Código de acceso</label>
                                            </div>
                                            
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" name="ValCuestionario" id="ValCuestionario" value = "" placeholder="Valor del Cuestionario para la evaluación" required="" maxlength="10" pattern="[0-9]{1,10}" minlength="1" data-toggle="tooltip" data-placement="top" title="Escriba un número indicando el valor del cuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Valor del Cuestionario</label>
                                            </div>
                                            <div class="group-material">
                                                <input type="text" class="material-control tooltips-general" id = "NumPreguntas"  name = "NumPreguntas" placeholder="Numero de Preguntas para el Cuestionario" required="" maxlength="10" pattern="[0-9]{1,10}" minlength="1" data-toggle="tooltip" data-placement="top" title="Solo numeros para indicar el numero de pregunta del cuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Numero de Preguntas</label>
                                            </div>
                                            <div>
                                                <input class="form-check-input" type="checkbox" value="" id="EstadoCuestionario" name="EstadoCuestionario">
                                                <span class="highlight"></span>
                                                <span class="bar"></span>
                                                <label>Publicar Cuestionario</label>
                                            </div>
                                            <p class="text-center">
                                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                                <button type="submit" class="btn btn-primary" value="GuardarPreguntaOpcion" name="GuardarPreguntaOpcion" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                            </p> 
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
                    }
                ?>
            </div>
        </div>

        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Desarrollador</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Juan Yanangomez <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <img src="../../assets/img/UTPL_2018-02.png" class="img-responsive center-box" style="width: 50%;">
                        
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">© 2022 GamificEv</div>
        </footer>
    </div>
</body>
</html>
<!--<script type="text/javascript">
    function CargarValor(){
        num = $("#NumPreguntas").val();
        var parametros =
        {
            "Transformar": "1",
            "num": num
        };
        $.ajax({
            data: parametros,
            datatype: "json",
            url: "../dll/Transformar.php",
            type: "post",
            beforeSend: function()
            {alert("enviando");},
            error: function()
            {alert("Error");},
            complete: function()
            {alert("Listo");},
            success: function(valor)
            {
                $("#ValorPregunta").val(valor);
                console.log(valor);
            }
        })
    }
</script>-->