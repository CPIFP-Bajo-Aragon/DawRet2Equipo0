<?php
    class Microcredito extends Controlador{
        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->datos["menuActivo"]="Microcredito";
            $this->microModelo = $this->modelo('MicrocreditoModelo');
        }

        public function index(){

            $this->datos['rolesPermitidos'] = [100, 200, 300, 400];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }


            $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocreditos();

            $this->vista('admin/microcreditos/ver_microcredito', $this->datos);
        }

        public function verMicrocredito(){
            $this->datos['rolesPermitidos'] = [100];
            $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocreditos();
            $this->vista('admin/microcreditos/lista_microcredito', $this->datos);

        } 

        public function anadirMicrocredito(){
            $this->datos['rolesPermitidos'] = [100];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $microcredito = $_POST;
            
                if ($this->microModelo->anadirMicrocredito($microcredito)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocreditos();
                $this->datos['tipoprestamo'] = $this->microModelo->obtenerTipoMicrocredito();
                $this->datos['movimientos']=$this->microModelo->obtenerTipoMovimiento();
                $this->datos['personas'] = $this->microModelo->obtenerPersonas();
                $this->vista('admin/microcreditos/anadir_microcredito', $this->datos);
            }
        }

        public function eliminarmicrocredito($idPrestamo){
            $this->datos['rolesPermitidos'] = [100];
            if ($this->microModelo->eliminarmicrocredito($idPrestamo)){
                redireccionar("/microcredito/verMicrocredito");

            }else{
                echo "se ha producido un error!!!";
            }
        }

        public function editarmicrocredito($idPrestamo){
            $this->datos['rolesPermitidos'] = [100];

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $microcreditoModificado = $_POST;
                
                if ($this->microModelo->editarMicrocredito($microcreditoModificado, $idPrestamo)){
                    
                    redireccionar("/admin/microcreditos/editar_microcredito");

                }else{
                    echo "se ha producido un error!!!";
                }
            } else {
                $this->datos['tipoprestamo'] = $this->microModelo->obtenerTipoMicrocredito();
                $this->datos['movimientos']=$this->microModelo->obtenerTipoMovimiento();
                $this->datos['personas'] = $this->microModelo->obtenerPersonas();
                $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocredito($idPrestamo);
                $this->vista('admin/microcreditos/editar_microcredito', $this->datos);
            }
        }


    }