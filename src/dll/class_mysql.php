<?php

class clase_mysqli{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*identificacion de error y texto de error*/
	var $Errno = 0;
	var $Error = "";
	/*identificacion de conexion y consulta*/
	var $Conexion_ID=0;
	var $Consulta_ID=0;
	/*constructor de la clase*/
	function clase_mysqli($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	/*conexion al servidor de db*/
	function conectar($host, $user, $pass, $db){
		if($db != "")$this->BaseDatos=$db;
		if($host != "")$this->Servidor=$host;
		if($user != "")$this->Usuario=$user;
		if($pass != "")$this->Clave=$pass;
		/*conectar al servidor*/
		$this->Conexion_ID=new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if(!$this->Conexion_ID){
			$this->Error="Ha fallado la conexion";
			return 0;
		}
		return$this->Conexion_ID;
	}
	function consulta($sql=""){
		if($sql==""){
			$this->Error="NO hay ninguna sentencia sql";
			return 0;
		}
		/*Ejecutar la cunsulta*/
		//$this->Consulta_ID=$this->Conexion_ID->query($sql);
		$this->Consulta_ID=mysqli_query($this->Conexion_ID,$sql);

		if(!$this->Consulta_ID){
			print $this->Conexion_ID->error;
			//$this->Errno->error;
		}
		return $this->Consulta_ID;
	}

	/*retorna el numero de campos de la consulta*/
	function numcampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}
	/*retorna de campos de la consulta*/
	function numregistros(){
		return mysqli_num_rows($this->Consulta_ID);
	}
	function verconsulta(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultacrud($delete,$update){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>Borrar</td>";
		echo  "<td>Actualizar</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo  "<td><a href='$delete?id=$row[0]'>Borrar</a></td>";
			echo  "<td><a href='$update?id=$row[0]'>Actualizar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsultacrud1($see,$delete,$update){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=1; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>Detalle</td>";
		echo  "<td>Borrar</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=1; $i < $this->numcampos(); $i++) {
				//echo "<td>".utf8_encode($row[$i])."</td>";
				if($i==5){
					if($row[$i]==2){
						$state='Pagado';
						$color='#1F4690';
					}else{
						$state='Pendiente';
						$color='#E8AA42';

					}
					echo "<td><a href='$update?id=$row[0]&state=$row[$i]' style='display:flex;justify-content:center;align-items:center;border-radius:8px;width:8em;height:3em;color:#fff;background-color:$color;'>".$state."</a></td>";
				}else{
					echo "<td>".$row[$i]."</td>";
				}
			}
			echo  "<td><a style='height:3em;display:flex;justify-content:center;align-items:center' href='$see?id=$row[0]'><i class='fa-solid fa-info'></i></a></td>";
			echo  "<td ><a style='height:3em;display:flex;justify-content:center;align-items:center' href='$delete?id=$row[0]'><i class='fa-solid fa-trash-can'></i></a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function consulta_lista(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}
	/********************************* */
	function consulta_lista_Array(){
		$array=[];
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			array_push($array,$row);
		}
		return $array;
	}


	/******************************* */

	function consulta_json(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			$data[]=$row;
		}
		echo json_encode(array("sensores"=>$data));
	}
	function consulta_busqueda_json(){
		if($this->numcampos() > 0){
			while ($row = mysqli_fetch_array($this->Consulta_ID)) {
				$data[]=$row;
			}
		    $resultData = array('status' => true, 'postData' => $data);
	    }else{
	    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
	    }

	    echo  json_encode($resultData);
	}

	//listar Preguntas de opcion multiple
	function VerListPreOpcion(){
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo '<tr>
						<td><i class="zmdi zmdi-view-list"></i></td>
						<td>'.$row[0].'</td>
						<td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ui-checks" viewBox="0 0 16 16">
						<path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2H2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708l-2 2zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708l-2 2zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
					  </svg></td>
						<td style="font-size:90%;"><b>Opción Multiple</b></td>
                        <td style="font-size:90%;">'.$row[1].'</td>
						<td style="font-size:90%;">'.$row[2].'</td>';
				$id = $row[0];
			echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#PreguntaOpcionUpdate" href="#" onclick="PresentarOpcionUpdate('.$row[0].')" ><i class="zmdi zmdi-refresh"></i></button></td>';
			echo '<td><a class="btn btn-danger" href="#" onclick="preguntarOpcion('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo '<td><button class="btn btn-success" data-toggle="modal" data-target="#PreguntaOpcion" href="#" onclick="PresentarOpcion('.$row[0].')" ><i class="zmdi zmdi-eye"></i></button></td>';
			echo "</tr>";
		}
	}

	//lista de preguntas de emparejamiento
	function Contabilizar(){
		$contador = 0;
		while ($row=mysqli_fetch_array($this->Consulta_ID)){
			$contador=$contador+1;
		}
		return $contador;
	}
	function VerListPreEmpar(){
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo '<tr>
						<td><i class="zmdi zmdi-view-list"></i></td>
						<td>'.$row[0].'</td>
						<td><i class="zmdi zmdi-grain"></i></td>
						<td style="font-size:90%;"><b>Emparejamiento</b></td>
                        <td style="font-size:90%;">'.$row[1].'</td>
						<td style="font-size:90%;">'.$row[2].'</td>';
				$id = $row[0];
			echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#PreguntaEmpaUpdate" href="#" onclick="PresentarEmpaUpdate('.$row[0].')" ><i class="zmdi zmdi-refresh"></i></button></td>';
			echo '<td><a class="btn btn-danger" href="#" onclick="preguntarEmpar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#PreguntaEmpa" href="#" onclick="PresentarEmpa('.$row[0].')" ><i class="zmdi zmdi-eye"></i></button></td>';
			echo "</tr>";
		}
	}

	//Lista de preguntas de verdaderp y falso
	function VerListPreTF(){
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo '<tr>
						<td><i class="zmdi zmdi-view-list"></i></td>
						<td>'.$row[0].'</td>
						<td><i class="zmdi zmdi-thumb-up-down"></i></td>
						<td style="font-size:90%;"><b>verdadero o falso</b></td>
                        <td style="font-size:90%;">'.$row[1].'</td>
						<td style="font-size:90%;">'.$row[2].'</td>';
				$id = $row[0];
			echo '<td><button class="btn btn-primary" data-toggle="modal" data-target="#PreguntaTFUpdate" href="#" onclick="PresentarTFUpdate('.$row[0].')" ><i class="zmdi zmdi-refresh"></i></button></td>';
			echo '<td><a class="btn btn-danger" href="#" onclick="preguntarTrue('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo '<td><button class="btn btn-info" data-toggle="modal" data-target="#PreguntaTF" href="#" onclick="PresentarTF('.$row[0].')" ><i class="zmdi zmdi-eye"></i></button></td>';
			echo "</tr>";
		}
	}
	
	//lista de Bancos

	function VerListBancos(){
		echo '<table class="div-table">
				<thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
				<tr class="div-table-row " style="">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="div-table-cell">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="div-table-cell" >Añadir Preguntas</th>
				<th class="div-table-cell" >Actualizar</th>
				<th class="div-table-cell" >Eliminar</th>
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td class="div-table-cell" >'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td class="div-table-cell" ><a class="btn btn-primary" href="../dll/Variables.php?IdBanco='.$id.'"><i class="zmdi zmdi-brush"></i></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-success" href="./BancoPreguntas.php?id_banco='.$id.'&EditarBanco"><i class="zmdi zmdi-refresh"></i></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-danger" href="#" onclick="preguntar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}

	// Presentar Lista de Usuarios
	function VerListUser(){
		echo '<table class="div-table">
				<thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
				<tr class="div-table-row " style="">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="div-table-cell">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="div-table-cell" >Cambiar</th>
				<th class="div-table-cell" >Actualizar</th>
				<th class="div-table-cell" >Eliminar</th>
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td class="div-table-cell" >'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td class="div-table-cell" ><a class="btn btn-warning" href="./AdminUsuarios.php?id_User_Ac='.$id.'&Contraa='.$row[6].'&Correo='.$row[3].'"><i class="zmdi zmdi-key"></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-success" href="./AdminUsuarios.php?id_User_Ac='.$id.'&EditarUser"><i class="zmdi zmdi-refresh"></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-danger" href="#" onclick="preguntar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}
	//Areas y Carreras vista

	function VerAreas(){
		echo '<select class="material-control tooltips-general" data-toggle="tooltip" required="" data-placement="top" title="Seleccione la carrera a la que pertence" id = "ComboBoxAreas" name = "ComboBoxAreas">
		<option value="" disabled="" selected="">Selecciona una opción</option>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)){
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		echo '</select>';
	}

	//Ver areas en tabla
	function VerListAreas(){
		echo '<table class="div-table">
				<thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
				<tr class="div-table-row " style="">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="div-table-cell">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="div-table-cell" >Actualizar</th>
				<th class="div-table-cell" >Eliminar</th>
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td class="div-table-cell" >'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td class="div-table-cell" ><a class="btn btn-success" href="./AdminAreas.php?id_Area='.$id.'&EditarArea"><i class="zmdi zmdi-refresh"></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-danger" href="#" onclick="preguntar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}
	
	function VerCarreras(){
		echo '<select class="material-control tooltips-general" data-toggle="tooltip"  required="" data-placement="top" title="Seleccione la carrera a la que pertence" id = "ComboBoxCarrera" name = "ComboBoxCarrera">
		<option value="" required="" disabled="" selected="">Selecciona una opción</option>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)){
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		echo '</select>';
	}
	//Ver Carreras en tabla
	function VerListCarreras(){
		echo '<table class="div-table">
				<thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
				<tr class="div-table-row " style="">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="div-table-cell">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="div-table-cell" >Actualizar</th>
				<th class="div-table-cell" >Eliminar</th>
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td class="div-table-cell" >'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td class="div-table-cell" ><a class="btn btn-success" href="./AdminCarreras.php?id_Carrera='.$id.'&EditarCarrera"><i class="zmdi zmdi-refresh"></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-danger" href="#" onclick="preguntar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}
	
	//Ver Titulo
	function PresentarTitulo(){
		echo "<small>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)){
			echo "Administración de preguntas para el Banco ".$row[0]." de la Asignatura ".$row[1]."</small>";
		}
	}

	//Presentar todos los bancos de preguntas
	function VerBancoComboBox(){
		echo '<select class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="Seleccione el Banco de preguntas para generar el Cuestionario" id = "ComboBoxBancos" name = "ComboBoxBancos">
		<option value="" disabled="" selected="">Selecciona una opción</option>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)){
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		echo '</select>';
	}
	//Presentar Combobox con prioridad
	function VerBancoUpdate(){
		while ($aux = mysqli_fetch_array($this->Consulta_ID)){
			echo '<option value="'.$aux[0].'">'.$aux[1].'</option>';
		}
	}
	function VerBancoComboBoxV2($idBanco){
		while ($row = mysqli_fetch_array($this->Consulta_ID)){
			
			if($row[0]==$idBanco){
				echo '<option value="'.$row[0].'">'.$row[1].'</option>';
			}
		}
	}



	// Presentar listado de Cuestionarios
	function VerListCuestionarios(){
		echo '<table class="div-table">
				<thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
				<tr class="div-table-row " style="">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="div-table-cell">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="div-table-cell" >Actualizar</th>
				<th class="div-table-cell" >Eliminar</th>
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td class="div-table-cell" >'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td class="div-table-cell" ><a class="btn btn-success" href="./CuestionarioNuevo.php?id_Cuestionario='.$id.'&EditarCuestionario" ><i class="zmdi zmdi-refresh"></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-danger" href="#" onclick="preguntar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}

	function VerListCuestionariosReporte(){
		echo '<table class="table table-hover text-center">
			<thead>
				<tr class="success">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="text-center">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="text-center">Revisar</th>	
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td>'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td><a class="btn btn-success" href="./ReportStudents.php?id_Cuestionario='.$id.'&Codigo='.$row[2].'" ><i class="zmdi zmdi-eye"></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}

	//Presentar los reportes de los estudiantes jajajaj
	function VerListReportes(){
		echo '<table class="table table-hover text-center">
			<thead>
				<tr class="success">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="text-center">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="text-center">Ver Detalles</th>	
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td>'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td><button class="btn btn-info" data-toggle="modal" data-target="#ResultadoEstudiante" href="#" onclick="Presentar('.$row[0].')" ><i class="zmdi zmdi-eye"></i></button></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}

	function VerReporteStudent(){
		echo '<table class="table table-hover text-center">
			<thead>
				<tr class="success">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="text-center">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td>'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}
	function VerTitulos(){
		$array=[];
		for ($i=0; $i < $this->numcampos() ; $i++) {
			array_push($array,mysqli_fetch_field_direct($this->Consulta_ID, $i)->name);
		}
		return $array;
	}

	//Tabla de juegos
	function VerListTablaJuegos(){
		echo '<table class="div-table">
				<thead class="thead-dark" style="background-color:#DFF0D8; font-weight:bold;">
				<tr class="div-table-row " style="">';
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  '<th class="div-table-cell">'.mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</th>";
		}
		echo '<th class="div-table-cell" >Actualizar</th>
				<th class="div-table-cell" >Eliminar</th>
				</tr>
				</thead>
				<tbody>';
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			$id = 0;
			for ($i=0; $i < $this->numcampos()-2; $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo '<td class="div-table-cell" >'.$row[$i]."</td>";
				$id = $row[0];
			}
			echo '<td class="div-table-cell" ><a href="'.$row[$this->numcampos()-2].'" target="_blank">'.$row[$this->numcampos()-2].'</a></td>';
			echo '<td class="div-table-cell" ><img src="../'.$row[$this->numcampos()-1].'" style="height:  100px; width: 150px;"></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-success" href="./AdminJuegos.php?id_Juego='.$id.'&EditarJuego"><i class="zmdi zmdi-refresh"></a></td>';
			echo '<td class="div-table-cell" ><a class="btn btn-danger" href="#" onclick="preguntar('.$row[0].')"><i class="zmdi zmdi-delete"></i></a></td>';
			echo "</tr>";
		}
		echo "</tbody>
			</table>";
	}
	function VerListJuegosStudent(){
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo '<div class=" col-md-4 col-sm-12">
				<div class="card" style="width: 18rem;background-color:#3FF9DC40;">
				<div class="card-body">';
			echo '<h3 class="card-title"><b>'.$row[1].'</b></h3>
							<div class="courses-image">
								<img src="./'.$row[3].'" class="img-responsive mx-auto d-block" alt="" style="height:  200px; width: 360px;">
							</div>
							<br>
							<a href="'.$row[2].'" class="btn btn-success">Jugar</a>
						</div><br>
					</div><br>
				</div>';
		}
	}
}
?>