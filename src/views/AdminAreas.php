<?php
	include("../Security/seguridadAdministrador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reportes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="../../assets/icons/book.ico" />
    <script src="../../js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="../../css/sweet-alert.css">
    <link rel="stylesheet" href="../../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../../css/timeline.css">
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
                    <li><a href="home.php"><i class="zmdi zmdi-home"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-inbox"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="AdminUsuarios.php"><i class="zmdi zmdi-accounts"></i>&nbsp;&nbsp; Usuarios</a></li>
                            <li><a href="AdminAreas.php"><i class="zmdi zmdi-font"></i>&nbsp;&nbsp; Facultades</a></li>
                            <li><a href="AdminCarreras.php"><i class="zmdi zmdi-graduation-cap"></i>&nbsp;&nbsp; Carrera</a></li>
                            <li><a href="AdminJuegos.php"><i class="zmdi zmdi-gamepad"></i>&nbsp;&nbsp; Juegos</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Administrador</span>
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
              <h1 class="all-tittles">Sistema GamificEv <small>Sistema de Administración</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <?php
                include("../Controller/AreaController.php");

                if(isset($_GET["id_Area"]) && isset($_GET["EditarArea"])){
                    $AreaControl = new AreaController();
                    $id = $_GET['id_Area'];
                    $listaArea=$AreaControl->getArea($id);
                    echo '<div class="container-flat-form">
                        <div class="title-flat-form title-flat-blue">Administrar Facultades</div>
                        <form autocomplete="off" method="post" action="../dll/metodosArea.php?id_Area='.$id.'&ActualizarArea">
                            <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <div class="group-material">
                                        <input type="text" value="'.$listaArea[1].'" class="material-control tooltips-general" placeholder="Escribe aquí la nueva área" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Ingrese la nueva Facultad" id="Area" name="Area">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre de la Facultad</label>
                                    </div>
                                    <p class="text-center">
                                        <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                        <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                    </p> 
                                </div>
                            </div>
                        </form>
                    </div>';
                }else{
                    echo '<div class="container-flat-form">
                        <div class="title-flat-form title-flat-blue">Administrar Facultades</div>
                        <form autocomplete="off" method="post" action="../dll/add_Area.php">
                            <div class="row">
                            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <div class="group-material">
                                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la nueva Facultad" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Ingrese la nueva Facultad" id="Area" name="Area">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Nombre de la Facultad</label>
                                    </div>
                                    <p class="text-center">
                                        <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                        <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                    </p> 
                                </div>
                            </div>
                        </form>
                    </div>';
                }
            ?>
            
        </div>
        <div class="container-fluid">
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Lista de Facultades</h2>
            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                <?php
                    $controlA = new AreaController();
                    $controlA->ListAreaTabla();
                ?>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
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
              
                window.location.href = "../dll/metodosArea.php?id_Area="+id+"&EliminarArea";
            }
        }
        ;  
</script>
</html>