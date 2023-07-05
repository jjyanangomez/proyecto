<?php
    require_once "../dll/config.php";
    require_once "../dll/class_mysql.php";
    class JuegoModel{
        private $IdJuego;
        private $Nombre;
        private $Enlace;
        private $Imagen;

        public function getIdJuego(){
            return $this->IdJuego;
        }
        
        public function setNombre($Nombre){
            $this->Nombre = $Nombre;
        }

        public function setEnlace($Enlace){
            $this->Enlace = $Enlace;
        }

        public function setImagen($Imagen){
            $this->Imagen = $Imagen;
        }

        public function CreateJuego() {
            $miconexion = new clase_mysqli;
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("INSERT INTO `juegos`( `Nombre`, `Enlace`, `Imagen`) VALUES ('$this->Nombre','$this->Enlace','$this->Imagen')");
            return $resSQL;
            //$this->Disconnect(); 
        }

        public function ListJuegos(){
            $miconexion = new clase_mysqli;
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("SELECT * FROM `juegos` WHERE 1");
            $resSQL=$miconexion->VerListTablaJuegos();
            //$this->Disconnect();
            return $resSQL;
        }

        
        public function ListJuegosStudent(){
            $miconexion = new clase_mysqli;
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("SELECT * FROM `juegos` WHERE 1");
            $resSQL=$miconexion->VerListJuegosStudent();
            //$this->Disconnect();
            return $resSQL;
        }
        public function deleteJuego($id) {
            $miconexion = new clase_mysqli;
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $aux = $miconexion->consulta("SELECT `Imagen` FROM `juegos` WHERE `IdJuego` = '$id'");
            $aux = $miconexion->consulta_lista();
            $urlArchivo=$aux[0];
            if(file_exists("../$urlArchivo")){
			
                if(unlink("../$urlArchivo")){
                    echo "archivo eliminado";
                }else{
                    echo "archivo no se pudo eliminar";
                }
            }else{
                echo "No encontro el archivo";
            }
            //echo "DELETE FROM `cuestionarios` WHERE = '$id'";
            $resSQL=$miconexion->consulta("DELETE FROM `juegos` WHERE `IdJuego` = '$id'");
            //$this->Disconnect();
            return $resSQL;
        }

        public function getJuego($id){
            $miconexion= new clase_mysqli();
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("SELECT * FROM `juegos` WHERE `IdJuego`= '".$id."'");
            $listaBanco=$miconexion->consulta_lista();
            return $listaBanco;
        }
        public function get($id){
            $miconexion= new clase_mysqli();
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $aux = $miconexion->consulta("SELECT `Imagen` FROM `juegos` WHERE `IdJuego` = '$id'");
            $aux = $miconexion->consulta_lista();
            return $aux;
        }

        public function UpdateJuego($id){
            $miconexion= new clase_mysqli();
            $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
            $resSQL=$miconexion->consulta("UPDATE `juegos` SET `Nombre`='$this->Nombre',`Enlace`= '$this->Enlace',`Imagen`= '$this->Imagen' WHERE `IdJuego`= $id;");
            return $resSQL;
        }
    }

?>