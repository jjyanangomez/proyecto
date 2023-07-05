<?php
    $ID = $_POST["id"];
    require_once "../dll/config.php";
    require_once "../dll/class_mysql.php";

    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("SELECT re.Nombre, re.Correo, re.Puntaje ,re.ResulEvaluacion As Calificacion,cu.NumPreguntas AS 'Numero de preguntas del Cuestionario', re.ListaPreTFCorrectas AS 'Lista de preguntas correctas de Verdadero y Falso', re.ListaPreTFIncorrectas AS 'Lista de preguntas incorrectas de Verdadero y Falso', re.ListaPreOpcionCorrectas AS 'Lista de preguntas correctas de Opcion Multiple', re.ListaPreOpcionIncorrectas AS 'Lista de preguntas incorrectas de Opcion Multiple', re.ListaPreEmpaCorrectas AS 'Lista de preguntas correctas de Emparejamiento', re.ListaPreEmpaIncorrectas AS 'Lista de preguntas incorrectas de Emparejamiento',DATE_FORMAT(re.FechaInicio,'%Y/%m/%d') AS FechaInicio, TIME_FORMAT(re.FechaInicio,'%H:%i:%S') AS HoraInicio, DATE_FORMAT(re.FechaFinal,'%Y/%m/%d') AS FechaFinal, TIME_FORMAT(re.FechaFinal,'%H:%i:%S') AS HoraFinal, re.Juego FROM reportes re, cuestionarios cu WHERE cu.CodigoCuestionario = re.CodeCuestionario AND re.IdReporte = '$ID'");
    //$resSQL=$miconexion->consulta("SELECT re.IdReporte, re.Nombre, re.Correo, re.Puntaje ,re.ResulEvaluacion As Calificacion, DATE_FORMAT(re.FechaInicio,'%Y/%m/%d') AS FechaInicio, TIME_FORMAT(re.FechaInicio,'%H:%I:%S') AS HoraInicio, DATE_FORMAT(re.FechaFinal,'%Y/%m/%d') AS FechaFinal, TIME_FORMAT(re.FechaFinal,'%H:%I:%S') AS HoraFinal FROM reportes re WHERE re.IdReporte = '$ID'");
    $resSQL=$miconexion->consulta_lista();
    $datos = $miconexion->VerTitulos();
    //salto puede ser de $i=1; $i < sizeof($datos); $i+=2 o $i=0; $i < sizeof($datos); $i+=2
    echo '<div class="container-flat-form">
        <div class="title-flat-form title-flat-blue">Resultados del Estudiante: '.$resSQL[0].'</div>
            <div class="row">
                <div class="col-md-offset-1 col-md-4 col-sm-12">';
    for($i=0; $i < sizeof($datos)/2 ; $i++){
        if($i == 5 || $i == 6 || $i == 7){
            if($i == 5 || $i == 6){
                echo '<div class="group-material" > 
                <h4>'.$datos[$i].'</h4>';
                $separada = explode("-", $resSQL[$i]);
                echo '<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Seleccione el Banco de preguntas para generar el Cuestionario" id = "ComboBoxBancos" name = "ComboBoxBancos">
                <option value="" disabled="" selected="">Selecciona una opción</option>';
                for($j=0; $j < sizeof($separada) ; $j++){
                    if($separada[$j] != ""){
                        $resSQL1=$miconexion->consulta("SELECT btf.Pregunta FROM bancotruefalse btf WHERE IdBancoTrueFalse =  '$separada[$j]'");
                        $resSQL1=$miconexion->consulta_lista();
                        echo '<option value="'.$resSQL1[0].'">'.$resSQL1[0].'</option>'; 
                    }
                }
                echo '</select>
                 </div>';
            }else {
                echo '<div class="group-material" > 
                <h4>'.$datos[$i].'</h4>';
                $separada = explode("-", $resSQL[$i]);
                echo '<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Seleccione el Banco de preguntas para generar el Cuestionario" id = "ComboBoxBancos" name = "ComboBoxBancos">
                <option value="" disabled="" selected="">Selecciona una opción</option>';
                for($j=0; $j < sizeof($separada) ; $j++){
                    if($separada[$j] != ""){
                        $resSQL1=$miconexion->consulta("SELECT bo.Pregunta FROM bancoopcionmul bo WHERE bo.IdBancoOpcion =  '$separada[$j]'");
                        $resSQL1=$miconexion->consulta_lista();
                        echo '<option value="'.$resSQL1[0].'">'.$resSQL1[0].'</option>'; 
                    }
                }
                echo '</select>
                    </div>';
            }
        }else{
            echo '<div class="group-material" >
                <h4>'.$datos[$i].'</h4>
                <input type="text" class="material-control tooltips-general" name="tema" id="tema" value = "'.$resSQL[$i].'" placeholder="nulo" required="" maxlength="20"  data-toggle="tooltip" data-placement="top" title="Escriba el tema que trata el banco de preguntas" disabled>
            </div>';
        }
    }
        //$resSQL=$miconexion->VerReporteStudent();
    echo ' </div>
            <div class="col-md-offset-1 col-md-4 col-sm-12">';
    for($i=8; $i < sizeof($datos); $i++){
        if($i == 8 || $i == 9 || $i == 10){
            if($i == 8){
                echo '<div class="group-material" > 
                <h4>'.$datos[$i].'</h4>';
                $separada = explode("-", $resSQL[$i]);
                echo '<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Seleccione el Banco de preguntas para generar el Cuestionario" id = "ComboBoxBancos" name = "ComboBoxBancos">
                <option value="" disabled="" selected="">Selecciona una opción</option>';
                for($j=0; $j < sizeof($separada) ; $j++){
                    if($separada[$j] != ""){
                        $resSQL1=$miconexion->consulta("SELECT bo.Pregunta FROM bancoopcionmul bo WHERE bo.IdBancoOpcion = '$separada[$j]'");
                        $resSQL1=$miconexion->consulta_lista();
                        echo '<option value="'.$resSQL1[0].'">'.$resSQL1[0].'</option>'; 
                    }
                }
                echo '</select>
                 </div>';
            }else {
                echo '<div class="group-material" > 
                <h4>'.$datos[$i].'</h4>';
                $separada = explode("-", $resSQL[$i]);
                echo '<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Seleccione el Banco de preguntas para generar el Cuestionario" id = "ComboBoxBancos" name = "ComboBoxBancos">
                <option value="" disabled="" selected="">Selecciona una opción</option>';
                for($j=0; $j < sizeof($separada) ; $j++){
                    if($separada[$j] != ""){
                        $resSQL1=$miconexion->consulta("SELECT bemp.Pregunta FROM bancoemparejamiento bemp WHERE bemp.IdBancoEmpar = '$separada[$j]'");
                        $resSQL1=$miconexion->consulta_lista();
                        echo '<option value="'.$resSQL1[0].'">'.$resSQL1[0].'</option>'; 
                    }
                }
                echo '</select>
                    </div>';
            }
        }else{
            echo '<div class="group-material" >
                <h4>'.$datos[$i].'</h4>
                <input type="text" class="material-control tooltips-general" name="tema" id="tema" value = "'.$resSQL[$i].'" placeholder="nulo" required="" maxlength="20"  data-toggle="tooltip" data-placement="top" title="Escriba el tema que trata el banco de preguntas" disabled>
            </div>';
        }
    }
    /*echo '</div>';
    $resSQL2=$miconexion->consulta("SELECT re.ListaPreTFCorrectas AS VedaderoFalsoCorrectas, re.ListaPreTFIncorrectas AS VedaderoFalsoIncorrectas, re.ListaPreOpcionCorrectas AS OpcionCorrectas, re.ListaPreOpcionIncorrectas AS OpcionIncorrectas, re.ListaPreEmpaCorrectas AS EmparejamientoCorrectas, re.ListaPreEmpaIncorrectas AS EmparejamientoIncorrectas FROM reportes re WHERE re.IdReporte = '$ID'");
    $resSQL2=$miconexion->consulta_lista();
    $datos2 = $miconexion->VerTitulos();
    echo '<div class="col-xs-12 col-sm-8 col-sm-offset-2">';
        for($i=0; $i < sizeof($datos2); $i++){
            $separada = explode("-", $resSQL2[$i]);
            $array=[];
            for($j=0; $i < sizeof($separada); $j++){
                if($separada[$j]==""){
                    $j=sizeof($separada);
                }else{
                    $resSQL=$miconexion->consulta("SELECT `IdBancoTrueFalse`,`Pregunta` FROM `bancotruefalse` WHERE IdBancoTrueFalse = '$separada[$j]'");
                    $resSQL=$miconexion->consulta_lista();
                    array_push($array,$resSQL[1]);
                }
            }
            echo '<div class="group-material" >
                <h4>'.$datos[$i].'</h4>';
                echo '<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Lista de Preguntas" id = "ComboBoxCarrera" name = "ComboBoxCarrera">';
            for($j=0; $i < sizeof($array); $j++){
                echo '<option value="'.$array[$j].'">'.$array[$j].'</option>';
            }
            echo ' </select>
                </div>';
        }*/
    echo '</div>
            </div>
            </div>
        </div>';


?>