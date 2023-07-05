<?php
    require_once "../models/BancoModel.php";
    require_once "../models/AreaModel.php";
    require_once "../models/CarreraModel.php";
    require_once "../models/CuestionarioModel.php";
    require_once "../models/JuegoModel.php";
    require_once "../models/PreguntaEmparModel.php";
    require_once "../models/PreguntaOpcionModel.php";
    require_once "../models/PreguntaTFModel.php";
    require_once "../models/ReportModel.php";
    require_once "../models/UserModel.php";

    class Pruebas extends PHPUnit\Framework\TestCase{
        protected function setUp(){
            $this->area = new AreaModel();
            $this->$Banco = new BancoModel();
            $this->$Carrera = new CarreraModel();
            $this->$Cuestionario = new CuestionarioModel();
            $this->$juego = new JuegoModel();
            $this->$PreEmpar = new PreguntaEmparModel();
            $this->$PreOpcion = new PreguntaOpcionModel();
            $this->$PreTF = new PreguntaTFModel();
            $this->$report = new ReportModel();
            $this->$user = new UserModel();
        }
        protected function tearDown(){
            unset($this->area);
            unset($this->$Banco);
            unset($this->$Carrera);
            unset($this->$Cuestionario);
            unset($this->$PreEmpar);
            unset($this->$PreOpcion);
            unset($this->$PreTF);
            unset($this->$report);
            unset($this->$user);
        }

        public function testListArea(){
            $this->assertEquals($this->area->ListArea(), 1);
        }
        public function testListCarrera(){
            $this->assertEquals($this->Carrera->ListCarrera(), 1);
        }
        

    }


?>