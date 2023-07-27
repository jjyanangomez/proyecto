<?php
	include("../Security/seguridadTeacher.php");
?>
<?php
	include("../Security/SeguridadVariables.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Preguntas</title>
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
    <link rel="stylesheet" href="../../css/scroll.css">
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
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Preguntas <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                        <li><a href="Preguntas.php"><i class="zmdi zmdi-view-list"></i>&nbsp;&nbsp; Lista de Preguntas</a></li>
                            <li><a href="PreguntasOpcion.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-checks" viewBox="0 0 16 16">
                                <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708l-2 2zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708l-2 2zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                </svg>&nbsp;&nbsp; Nueva Pregunta de Opción Multiple</a></li>
                            <li><a href="PreguntasTrueFalse.php"><i class="zmdi zmdi-thumb-up-down"></i>&nbsp;&nbsp; Nueva Pregunta de Verdadero y Falso</a></li>
                            <li><a href="PreguntasEmpar.php"><i class="zmdi zmdi-grain"></i>&nbsp;&nbsp; Nueva Pregunta de Emparejamiento</a></li>
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
                <?php
                    $aux = $_SESSION['IDBanco'];
                    include("../Controller/BancoController.php");
                    $controlC = new BancoController();
                    $controlC->VerTemaBancoPre($aux);
                ?>
                </h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation" class="active"><a href="Preguntas.php">Lista de Preguntas</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../../assets/img/Logo1.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección que te permite visualizar las Preguntas según el Banco de preguntas seleccionado, si desea puede actualizar la información o cambiarla según sea necesario.
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li class="active">Listado Preguntas</li>
                        <li><a href="PreguntasOpcion.php">Nuevo Pregunta</a></li>
                        <li><a href="CuestionarioNuevo.php">Nuevo Cuestionario</a></li>                      
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue">Lista de Preguntas</div>
                <table class="table table-hover text-center table-wrapper-scroll-y my-custom-scrollbar">
                    <thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
                        <tr class="div-table-row " style="">
                            <th class="div-table-cell">--</th>
                            <th class="div-table-cell">Identificador</th>
                            <th class="div-table-cell">--</th>
                            <th class="div-table-cell">Tipo de Pregunta</th>
                            <th class="div-table-cell" >Nombre del Banco</th>
				            <th class="div-table-cell" >Nombre de la Pregunta</th>
                            <th class="div-table-cell" >Actualizar Pregunta</th>
                            <th class="div-table-cell" >Eliminar Pregunta</th>
                            <th class="div-table-cell" >Ver Pregunta</th>
                        </tr>
                    </thead>
				    <tbody>
                    <?php
                        include("../Controller/PreguntaOpcionController.php");
                        $controlA = new PreguntaOpcionController();
                        $controlA->ListPreguntasOpcion($_SESSION['IDBanco']);
                        include("../Controller/PreguntaEmparController.php");
                        $controlB = new PreguntaEmparController();
                        $controlB->ListPreguntasEmpar($_SESSION['IDBanco']);
                        include("../Controller/PreguntaTFController.php");
                        $controlC = new PreguntaTFController();
                        $controlC->ListPreguntasTF($_SESSION['IDBanco']);
                    ?> 
                    </tbody>
			    </table>
            </div>
        </div>
        <div class="modal fade" id = "PreguntaTF">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center all-tittles">Preguntas de Verdadero y falso</h5>
                    </div>
                    <div class="modal-body" id="ConsultaTF">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "PreguntaOpcion">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center all-tittles">Preguntas de Opción Multiple</h5>
                    </div>
                    <div class="modal-body" id="ConsultaOpcion">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "PreguntaEmpa">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center all-tittles">Preguntas de Emparejamiento</h5>
                    </div>
                    <div class="modal-body" id="ConsultaEmpa">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>      
        </div>
        <!--- Modals para actualizar cada una de las preguntas --->
        <div class="modal fade" id = "PreguntaOpcionUpdate">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center all-tittles">Actualizar Pregunta de Opción Multiple</h5>
                    </div>
                    <div class="modal-body" id="ConsultaOpcionUpdate">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "PreguntaTFUpdate">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center all-tittles">Actualizar Pregunta de Verdadero y falso</h5>
                    </div>
                    <div class="modal-body" id="ConsultaTFUpdate">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "PreguntaEmpaUpdate">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center all-tittles">Actualizar Pregunta de Emparejamiento</h5>
                    </div>
                    <div class="modal-body" id="ConsultaEmpaUpdate">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
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
        function preguntarOpcion(id,texto){
            if(confirm("Esta seguro que desea Eliminar este Campo: ")){
              
                window.location.href = "../dll/metodosPreOpcion.php?id_PreOpcion="+id+"&EliminarPreOpcion";
            }
        }
        ;  
</script>
<script type="text/javascript">
        function preguntarTrue(id,texto){
            if(confirm("Esta seguro que desea Eliminar este Campo: ")){
              
                window.location.href = "../dll/metodosPreTrue.php?id_PreTrue="+id+"&EliminarPreTrue";
            }
        }
        ;  
</script>
<script type="text/javascript">
        function preguntarEmpar(id,texto){
            if(confirm("Esta seguro que desea Eliminar este Campo: ")){
              
                window.location.href = "../dll/metodosPreEmpar.php?id_PreEmpar="+id+"&EliminarPreEmpar";
            }
        }
        ;  
</script>

<script >
    function PresentarTF(id){
        var dataen = "idTF="+id;
            $.ajax({
            type:"post",
            url:"../dll/PreguntasViews.php",
            data:dataen,
            success:function(resp){
                $("#ConsultaTF").html(resp);
            }
            });
            return false;
    }
    ;  
</script>
<script >
    function PresentarOpcion(id){
        var dataen = "idOpcion="+id;
            $.ajax({
            type:"post",
            url:"../dll/PreguntasViews.php",
            data:dataen,
            success:function(resp){
                $("#ConsultaOpcion").html(resp);
            }
            });
            return false;
    }
    ;  
</script>
<script >
    function PresentarEmpa(id){
        var dataen = "idEmpa="+id;
            $.ajax({
            type:"post",
            url:"../dll/PreguntasViews.php",
            data:dataen,
            success:function(resp){
                $("#ConsultaEmpa").html(resp);
            }
            });
            return false;
    }
    ;  
</script>
<!-- Scripts para actualizar las preguntas -->
<script >
    function PresentarTFUpdate(id){
        var dataen = "idTFUPDATE="+id;
            $.ajax({
            type:"post",
            url:"../dll/PreguntasViews.php",
            data:dataen,
            success:function(resp){
                $("#ConsultaTFUpdate").html(resp);
            }
            });
            return false;
    }
    ;  
</script>
<script >
    function PresentarOpcionUpdate(id){
        var dataen = "idOpcionUPDATE="+id;
            $.ajax({
            type:"post",
            url:"../dll/PreguntasViews.php",
            data:dataen,
            success:function(resp){
                $("#ConsultaOpcionUpdate").html(resp);
            }
            });
            return false;
    }
    ;  
</script>
<script >
    function PresentarEmpaUpdate(id){
        var dataen = "idEmpaUPDATE="+id;
            $.ajax({
            type:"post",
            url:"../dll/PreguntasViews.php",
            data:dataen,
            success:function(resp){
                $("#ConsultaEmpaUpdate").html(resp);
            }
            });
            return false;
    }
    ;  
</script>
</html>