<?php
    if(isset($_POST["idTF"])){
        $ID = $_POST["idTF"];
        require_once "../dll/config.php";
        require_once "../dll/class_mysql.php";
        
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT btf.Pregunta, IF(btf.Respuesta, 'Verdadero', 'Falso') Respuesta, btf.RetroAlimentacion, bp.Tema FROM bancotruefalse btf, bancopreguntas bp WHERE btf.IdBanco = bp.IdBanco AND btf.IdBancoTrueFalse = '$ID'");
        $resSQL=$miconexion->consulta_lista();
        $datos = $miconexion->VerTitulos();
        echo '<div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Pregunta Verdadero/Falso: : '.$resSQL[0].'</div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">';
        for($i=0; $i < sizeof($datos) ; $i++){
            echo '<div class="group-material" >
                    <h4>'.$datos[$i].'</h4>
                    <input type="text" class="material-control tooltips-general" name="tema" id="tema" value = "'.$resSQL[$i].'" placeholder="nulo" required="" maxlength="20"  data-toggle="tooltip" data-placement="top"  disabled>
                </div>';
        }
        echo '</div>
            </div>
            </div>
        </div>';
        
    }
    else if(isset($_POST["idOpcion"])){
        $ID = $_POST["idOpcion"];
        require_once "../dll/config.php";
        require_once "../dll/class_mysql.php";
        
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT bom.Pregunta, bom.Respuesta1, IF(bom.OpValida1,'Correcta','Incorrecta')OpcionValida1, bom.Respuesta2, IF(bom.OpValida2,'Correcta','Incorrecta')OpcionValida2, bom.Respuesta3, IF(bom.OpValida3,'Correcta','Incorrecta')OpcionValida3, bom.Respuesta4, IF(bom.OpValida4,'Correcta','Incorrecta')OpcionValida4, bom.RetroAlimentacion, bp.Tema FROM bancoopcionmul bom, bancopreguntas bp WHERE bom.IdBanco = bp.IdBanco AND bom.IdBancoOpcion = '$ID'");
        $resSQL=$miconexion->consulta_lista();
        $datos = $miconexion->VerTitulos();
        echo '<div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Pregunta Opción Múltiple: '.$resSQL[0].'</div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">';
        for($i=0; $i < sizeof($datos) ; $i++){
            echo '<div class="group-material" >
                    <h4>'.$datos[$i].'</h4>
                    <input type="text" class="material-control tooltips-general" name="tema" id="tema" value = "'.$resSQL[$i].'" placeholder="nulo" required="" maxlength="20"  data-toggle="tooltip" data-placement="top"  disabled>
                </div>';
        }
        echo '</div>
            </div>
            </div>
        </div>';
            
    }
    else if(isset($_POST["idEmpa"])){
        $ID = $_POST["idEmpa"];
        require_once "../dll/config.php";
        require_once "../dll/class_mysql.php";
        
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT be.Pregunta, be.Enunciado1, be.ResPrimerEnunciado As 'Respuesta del primer Enunciado',be.Enunciado2, be.ResSegundoEnunciado AS 'Respuesta del segundo Enunciado', be.Enunciado3, be.ResTercerEnunciado AS 'Respuesta del tercer Enunciado',be.RetroAlimentacion, bp.Tema FROM bancoemparejamiento be, bancopreguntas bp WHERE be.IdBanco = bp.IdBanco AND be.IdBancoEmpar = '$ID'");
        $resSQL=$miconexion->consulta_lista();
        $datos = $miconexion->VerTitulos();
        echo '<div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Pregunta Emparejamiento: '.$resSQL[0].'</div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">';
        for($i=0; $i < sizeof($datos) ; $i++){
            echo '<div class="group-material" >
                    <h4>'.$datos[$i].'</h4>
                    <input type="text" class="material-control tooltips-general" name="tema" id="tema" value = "'.$resSQL[$i].'" placeholder="nulo" required="" maxlength="20"  data-toggle="tooltip" data-placement="top" disabled>
                </div>';
        }
        echo '</div>
            </div>
            </div>
        </div>';
            
    }

    //Cargar la información
    if(isset($_POST["idTFUPDATE"])){
        $ID = $_POST["idTFUPDATE"];
        require_once "../dll/config.php";
        require_once "../dll/class_mysql.php";
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT btf.IdBancoTrueFalse, btf.Pregunta, IF(btf.Respuesta, 'Verdadero', 'Falso') Respuesta, btf.RetroAlimentacion, bp.Tema FROM bancotruefalse btf, bancopreguntas bp WHERE btf.IdBanco = bp.IdBanco AND btf.IdBancoTrueFalse = '$ID'");
        $resSQL=$miconexion->consulta_lista();
        echo'<div class="container-flat-form">
        <div class="title-flat-form title-flat-green">Actualizar una nueva Preguntas de verdadero y falso</div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <form method="post" id ="UpdateQuestionTF" action ="../dll/metodosPreTrue.php?id_PreTrue='.$resSQL[0].'&ActualizarPreTrue">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "PreguntaTF" name = "PreguntaTF" placeholder="Pregunta" value="'.$resSQL[1].'" required="" maxlength="500" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?¿,!=()/*-+ ]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba la pregunta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Pregunta</label>
                            </div>
                            <div class="group-material" >
                                <span>Respuesta</span>
                                <select class="material-control tooltips-general" id = "RespuestaTF" name = "RespuestaTF"  required="" data-toggle="tooltip" data-placement="top" title="Seleccione la la respuesta que tendra la pregunta" >
                                    <option value="'.$resSQL[2].'" selected="">'.$resSQL[2].'</option>
                                    <option value="Verdadero">Verdadero</option>
                                    <option value="Falso">Falso</option>
                                </select>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "RetroalimentacionTF" name = "RetroalimentacionTF" placeholder="Retroalimentación" value="'.$resSQL[3].'" value required="" maxlength="500" data-toggle="tooltip" data-placement="top" title="Escriba la Retroalimentación de la pregunta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Retroalimentación</label>
                            </div>
                            <p class="text-center">
                                <button type="submit" class="btn btn-primary" value="GuardarPreguntaTF" name="GuardarPreguntaTF" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Actualizar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>';
    }else if(isset($_POST["idOpcionUPDATE"])){
        $ID = $_POST["idOpcionUPDATE"];
        require_once "../dll/config.php";
        require_once "../dll/class_mysql.php";
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT bom.Pregunta, bom.Respuesta1, bom.OpValida1, bom.Respuesta2, bom.OpValida2, bom.Respuesta3, bom.OpValida3, bom.Respuesta4, bom.OpValida4, bom.RetroAlimentacion, bp.Tema FROM bancoopcionmul bom, bancopreguntas bp WHERE bom.IdBanco = bp.IdBanco AND bom.IdBancoOpcion = '$ID'");
        $resSQL=$miconexion->consulta_lista();
        echo '<div class="container-flat-form">
        <div class="title-flat-form title-flat-green" >Actualizar una nueva Preguntas de Opción Multiple</div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <form method="post" id ="addQuestionOption" action ="../dll/metodosPreOpcion.php?id_PreOpcion='.$ID.'&ActualizarPreOpcion">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id ="PreguntaOpcion" name = "PreguntaOpcion" placeholder="Pregunta" value="'.$resSQL[0].'" required="" maxlength="500" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?,.:¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba la pregunta ">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Pregunta</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id ="Respuesta1" name = "Respuesta1" placeholder="Respuesta 1" required="" maxlength="200" value="'.$resSQL[1].'" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?,.:¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba una respuesta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Primera Opción</label>';
                                if($resSQL[2]){
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion1" name="Opcion1" checked><spam> Respuesta Válida</spam>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion1" name="Opcion1"><spam> Respuesta Válida</spam>';
                                }
                                                    
                            echo '</div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id ="Respuesta2" name = "Respuesta2" placeholder="Respuesta 2" required="" maxlength="200" value="'.$resSQL[3].'" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?,.:¿!=()/*-+ 123456789]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba una respuesta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Segunda Opción</label>';
                                if($resSQL[4]){
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion2" name="Opcion2" checked><spam> Respuesta Válida</spam>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion2" name="Opcion2"><spam> Respuesta Válida</spam>';
                                }
                            echo '</div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id ="Respuesta3" name = "Respuesta3" placeholder="Respuesta 3" required="" maxlength="200" value="'.$resSQL[5].'" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?,.:¿!=()/*-+ 123456789]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba una respuesta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Tercera Opción</label>';
                                if($resSQL[6]){
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion3" name="Opcion3" checked><spam> Respuesta Válida</spam>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion3" name="Opcion3"><spam> Respuesta Válida</spam>';
                                }
                            echo '</div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id ="Respuesta4" name = "Respuesta4"placeholder="Respuesta 4" required="" maxlength="100" value="'.$resSQL[7].'" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?,.:¿!=()/*-+ 123456789]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba una respuesta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Cuarta Opción</label>';
                                if($resSQL[8]){
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion4" name="Opcion4" checked><spam> Respuesta Válida</spam>';
                                }else{
                                    echo '<input class="form-check-input" type="checkbox" value="" id="Opcion4" name="Opcion4"><spam> Respuesta Válida</spam>';
                                }
                            echo '</div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id ="RetroalimentacionOpcion" name = "RetroalimentacionOpcion" placeholder="Retroalimentación" value="'.$resSQL[9].'" required="" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escriba la Retroalimentación de la pregunta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Retroalimentación</label>
                            </div>
                            <p class="text-center">
                                <button type="submit" class="btn btn-primary" value="GuardarPreguntaOpcion" name="GuardarPreguntaOpcion" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Actualizar</button>
                            </p> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>';
        
    }else if(isset($_POST["idEmpaUPDATE"])){
        $ID = $_POST["idEmpaUPDATE"];
        require_once "../dll/config.php";
        require_once "../dll/class_mysql.php";
        $miconexion = new clase_mysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
        $resSQL=$miconexion->consulta("SELECT be.Pregunta, be.Enunciado1, be.ResPrimerEnunciado, be.Enunciado2, be.ResSegundoEnunciado, be.Enunciado3, be.ResTercerEnunciado,be.RetroAlimentacion, bp.Tema FROM bancoemparejamiento be, bancopreguntas bp WHERE be.IdBanco = bp.IdBanco AND be.IdBancoEmpar = '$ID'");
        $resSQL=$miconexion->consulta_lista();
        echo '<div class="container-flat-form">
        <div class="title-flat-form title-flat-orange" style="background-color:#0081a2;">Registrar una nueva Preguntas de Emparejamiento</div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <form autocomplete="off" method="post" id ="addQuestionTF" action ="../dll/metodosPreEmpar.php?id_PreEmpar='.$ID.'&ActualizarPreEmpar">
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "PreguntaEmpar" name = "PreguntaEmpar" placeholder="Pregunta" required="" value="'.$resSQL[0].'" data-toggle="tooltip" data-placement="top" title="Escriba la pregunta ">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Pregunta</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "Enunciado1" name = "Enunciado1" placeholder="Opcion #1(Deben de contar con menos de 20 caracteres)" required="" value="'.$resSQL[1].'" maxlength="20" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?:,.¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba el primer Enunciado">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Primer Enunciado </label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "ResEnunciado1" name = "ResEnunciado1" placeholder="Respuesta Correcta del primer enunciado" required="" value="'.$resSQL[2].'" maxlength="200" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?:,.¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba la respuesta del primer enunciado">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Respuesta del primer enunciado</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "Enunciado2" name = "Enunciado2" placeholder="Opcion #2(Deben de contar con menos de 20 caracteres)" required="" value="'.$resSQL[3].'" maxlength="20" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?:,.¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba el segundo Enunciado">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Segundo Enunciado </label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "ResEnunciado2" name = "ResEnunciado2" placeholder="Respuesta Correcta del primer enunciado" required="" maxlength="200" value="'.$resSQL[4].'" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?:,.¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba la respuesta del segundo enunciado">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Respuesta del segundo enunciado</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "Enunciado3" name = "Enunciado3" placeholder="Opcion #3(Deben de contar con menos de 20 caracteres)" required="" value="'.$resSQL[5].'" maxlength="20" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?:,.¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Debe de contar con letras y signos menos de numeros">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Tercer Enunciado </label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "ResEnunciado3" name = "ResEnunciado3" placeholder="Respuesta Correcta del tercer enunciado" required="" value="'.$resSQL[6].'" maxlength="200" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ¡?:,.¿!=()/*-+ 1234567890]{1,1000}" data-toggle="tooltip" data-placement="top" title="Escriba la respuesta del tercer enunciado">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Respuesta del tercer enunciado</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id = "RetroalimentacionEmpar" name = "RetroalimentacionEmpar" placeholder="Retroalimentación" required="" value="'.$resSQL[7].'" maxlength="500" data-toggle="tooltip" data-placement="top" title="Escriba la Retroalimentación de la pregunta">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Retroalimentación</label>
                            </div>
                            <p class="text-center">
                                <button type="submit" class="btn btn-primary" value="GuardarPreguntaEmpar" name="GuardarPreguntaEmpar" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Actualizar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>';
    }
?>