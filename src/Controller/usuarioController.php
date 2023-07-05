<?php
require_once "../models/UserModel.php";

class UserController {
    var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
    public function createUser(){

        $user = new UserModel();

        if (isset($_POST['Nombre']) && isset($_POST['Apellido'])) {

            // Obentenemos datos desde el formulario
            $user->setNombre($_POST['Nombre']);
            $user->setApellidos($_POST['Apellido']);
            $user->setCorreo($_POST['Correo']);
            $user->setUsuario($_POST['Usuario']);
            // Encriptamos la contraseña
            $user->setContrasenia(md5($_POST['Contra']));
            $user->setRol($_POST['ComboBoxUsers']);

            $userVal = $user->ValidarUser();
            if($userVal == 1){
                echo "<script>
                if(confirm('Esta usuario o correo ya existe escriba uno distinto:')){
                    window.location.href = '../views/Teacher/registro.html';
                }else{
                    window.location.href = '../views/Teacher/registro.html';
                }</script>";
            }else{
                $userResponse = $user->CreateUser();
                if ($userResponse == 1) // exitoso
                {
                    if(isset($_GET["Nuevo"])){
                        echo "<script>if(confirm('Usuario creado correctamente')){
                            window.location.href = '../views/AdminUsuarios.php';
                        }</script>";
                    }else{
                        echo "<script>location.href='../views/Teacher/Login.html'</script>";
                    }
                } else {
                    echo "<h1>Error al crear usuario.</h1>";
                }
            }            
            // Creamos un nuevo usuario
            //echo("hola");
            //$user = new User(Nombre: $nombres, Apellidos: $apellidos, Correo: $correo, Rol: $tipoUser, Usuario: $usuario, Contrasenia: $clave);
            // Llamamos al repositorio de usuarios para crear el usuario
            //$res = UserRepository::CreateUser($user);
        
            // Si la respuesta es 1, entonces se creo el usuario correctamente
            //return $res == 1;
        }


    }

    public function verificar(){
        $user = new UserModel();
    }

    public function updateUser($id){
        $user = new UserModel();
        if (isset($_POST['Nombre']) && isset($_POST['Correo'])) {
            $user->setNombre($_POST['Nombre']);
            $user->setApellidos($_POST['Apellido']);
            $user->setUsuario($_POST['Usuario']);
            $user->setCorreo($_POST['Correo']);
        	$UserResponse = $user->UpdateUser($id);
	        //echo  $userResponse . " response"; //BORRAR
	        if ($UserResponse == 1) // exitoso
	        {
                echo "<script>location.href='../views/PerfilDocente.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar el Usuario.</h1>";
	        }
		}

        return $UserResponse;
    }

    public function updateUserContra($id,$ContraNueva){
        $user = new UserModel();
        if (isset($_POST['ContraActual']) && isset($_POST['ContraNueva'])) {
            $user->setContrasenia($ContraNueva);
            $UserResponse = $user->UpdateUserContra($id);
	        if ($UserResponse == 1) // exitoso
	        {
                echo "<script>location.href='../views/PerfilDocente.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar la contraseña.</h1>";
	        }
		}

        return $UserResponse;
    }
    public function updateUserContraAdmin($id,$ContraNueva){
        $user = new UserModel();
        if (isset($_POST['ContraNueva'])) {
            $user->setContrasenia($ContraNueva);
            $UserResponse = $user->UpdateUserContra($id);
	        if ($UserResponse == 1) // exitoso
	        {
                echo "<script>if(confirm('Actualización correcta de contraseña')){
                    window.location.href = '../views/AdminUsuarios.php';
                }</script>";
	        } else {
	            echo "<h1>Error al actualizar la contraseña.</h1>";
	        }
		}

        return $UserResponse;
    }

    public function updateUserAdmin($id){
        $user = new UserModel();
        if (isset($_POST['Nombre']) && isset($_POST['Correo'])) {
            $user->setNombre($_POST['Nombre']);
            $user->setApellidos($_POST['Apellido']);
            $user->setUsuario($_POST['Usuario']);
            $user->setCorreo($_POST['Correo']);
            $user->setRol($_POST['ComboBoxUsers']);
        	$UserResponse = $user->UpdateUserAdmin($id);
	        //echo  $userResponse . " response"; //BORRAR
	        if ($UserResponse == 1) // exitoso
	        {
                echo "<script>location.href='../views/AdminUsuarios.php'</script>";
	        } else {
	            echo "<h1>Error al actualizar el Usuario.</h1>";
	        }
		}

        return $UserResponse;
    }
    public function getUser($id){
        $user = new UserModel();
        $userResponse = $user->getUser($id);
        return $userResponse;
    }
    public function getUserAdmin($id){
        $user = new UserModel();
        $userResponse = $user->getUserAdmin($id);
        return $userResponse;
    }
    
    public function ListUser()
    {
        $user = new UserModel();
        $userResponse = $user->ListUser();
        
    }
    public function deleteUser($id,$idAdmin)
    {
        $user = new UserModel();
        $userResponse = $user->deleteUser($id,$idAdmin);
        if ($userResponse == 1) // exitoso
        {
            echo "<script>location.href='../views/AdminUsuarios.php'</script>";
        } else {
            echo "<h1>Error al Borrar el Banco.</h1>";
        }
        //echo "<script>console.log('$userResponse');</script>";
    }
    
}

?>