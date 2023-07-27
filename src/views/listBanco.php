<?php
	include("../Security/seguridadTeacher.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de Banco de Preguntas</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../../assets/icons/book.ico" />
    <script src="../../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../../css/sweet-alert.css">
    <link rel="stylesheet" href="../../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/scroll.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../js/jquery-1.11.2.min.js"><\/script>')</script>
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
                            <li><a href="#"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Bancos</a></li>
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
              <h1 class="all-tittles">GamificEv <small>Admistración de Preguntas</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"><a href="BancoPreguntas.php">Banco de Preguntas</a></li>
                <li role="presentation" class="active"><a href="#">Lista de Banco de Preguntas</a></li>
                <li role="presentation"><a href="report.php">Reportes</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../../assets/img/book.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                Bienvenido a la sección donde se presentan los bancos de preguntas creados para el sistema, aquí podrá actualizar y eliminar según sea necesario.
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li><a href="BancoPreguntas.php">Nuevo Banco de Preguntas</a></li>
                        <li class="active">Listado de Bancos de Preguntas</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Lista de Banco de Preguntas</h2>
            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                <?php
                    include("../Controller/BancoController.php");
                    $controlA = new BancoController();
                    $controlA->ListBancos($_SESSION['Usuario']);
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
<script type="text/javascript">
        function preguntar(id){
            if(confirm("Esta seguro que desea Eliminar este Campo: ")){
              
                window.location.href = "../dll/metodosBanco.php?id_Banco="+id+"&EliminarBanco";
            }
        }
        ;  
</script>
</html>