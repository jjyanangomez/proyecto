<?php
require_once "../models/User.php";
require_once "../dll/class_mysql.php";

class UserRepository{
    //Crear Usuario
    public static function CreateUser(User $usuario): int {
        // Instanciar la conexion a la base de datos
        $miconexion = new ClaseMysqli;
        $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    
        // Construir la consulta
        $resSQL = $miconexion->consulta("INSERT INTO `usuario`(`Nombre`, `Apellidos`, `Correo`, `Rol`, `Usuario`, `Contrasenia`) VALUES ('{$usuario->getNombre()}','{$usuario->getApellidos()}','{$usuario->getCorreo()}','{$usuario->getRol()}','{$usuario->getUsuario()}','{$usuario->getContrasenia()}')")
        //$resSQL = $miconexion->consulta("INSERT INTO usuarios (nombres, apellidos, correo, clave, tipoUsuario) VALUES('{$usuario->getNombres()}','{$usuario->getApellidos()}','{$usuario->getCorreo()}','{$usuario->getClave()}','{$usuario->getTipoUser()}')");
    
        // Retornar el numero de registros afectados
        return $resSQL;
      }
}



?>