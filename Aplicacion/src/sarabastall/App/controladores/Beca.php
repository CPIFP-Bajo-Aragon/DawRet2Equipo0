<?php
    class Beca extends Controlador{ 
        public function __construct(){ 

            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="Beca";


            $this->becaModelo = $this->modelo('BecaModelo');
        }

        public function index(){

            $this->datos['rolesPermitidos'] = [100, 200, 300, 400];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/beca');
            }


            $this->datos['becas'] = $this->becaModelo->obtenerBecas();

            $this->vista('admin/becas/ver_beca', $this->datos);
        }

        public function verBeca(){
            $this->datos['becas'] = $this->becaModelo->obtenerBecas();
            $this->datos['tipoBeca'] = $this->becaModelo->obtenerTipoBeca();

            $this->vista('admin/becas/lista_beca', $this->datos);

        } 

        public function anadirBeca(){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/beca');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $beca = $_POST;
            
                if ($this->becaModelo->anadirBeca($beca)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['tipoBeca'] = $this->becaModelo->obtenerTipoBeca();
                $this->datos['centro'] = $this->becaModelo->obtenerCentro();
                $this->datos['madrinas'] = $this->becaModelo->obtenerMadrinas();
                $this->datos['alumnos'] = $this->becaModelo->obtenerAlumnos();
                $this->vista('admin/becas/anadir_beca', $this->datos); 
            }
        }

        public function borrarbeca($idBeca){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/beca');
            }
            if ($this->becaModelo->borrarBeca($idBeca)){
                redireccionar("/beca/verBeca");

            }else{
                echo "se ha producido un error!!!";
            }
        }

        public function editarbeca($idBeca){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/beca');
            }

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $becaModificado = $_POST;
                
            if ($this->becaModelo->editarbeca($becaModificado, $idBeca)){ 
                
                redireccionar("/beca/verBeca");

            }else{
                echo "se ha producido un error!!!";
            }
        }
        else{
            $this->datos['tipoBeca'] = $this->becaModelo->obtenerTipoBeca();
            $this->datos['centro'] = $this->becaModelo->obtenerCentro();
            $this->datos['madrinas'] = $this->becaModelo->obtenerMadrinas();
            $this->datos['alumnos'] = $this->becaModelo->obtenerAlumnos();
            $this->datos['becas'] = $this->becaModelo->obtenerBeca($idBeca);
            $this->datos['movimientos']=$this->becaModelo->obtenerMovimientos($idBeca);

            $this->vista('admin/becas/editar_beca', $this->datos); 
        }
        }

        public function anadir_movimiento(){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/beca');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $movimiento = $_POST;



                print_r($movimiento);

            
                if ($this->becaModelo->anadirMovimiento($movimiento)){
                    redireccionar("/beca/editarbeca/".$movimiento["idBeca"]);
                } else {
                    echo "Se ha producido un Error!!!";
                }
            }else{
                
            }

        }
    }