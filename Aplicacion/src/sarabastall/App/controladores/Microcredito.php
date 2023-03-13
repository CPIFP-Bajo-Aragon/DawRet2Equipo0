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
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/microcredito');
            }
            $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocreditos();
            $this->datos['estados'] = $this->microModelo->obtenerEstados();


            $this->vista('admin/microcreditos/lista_microcredito', $this->datos);
        } 

        public function anadirMicrocredito(){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/microcredito');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $microcredito = $_POST;

            
                if ($this->microModelo->anadirMicrocredito($microcredito)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!"; 
                }
            }else{
                $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocreditos();
                $this->datos['movimientos']=$this->microModelo->obtenerTipoMovimiento();
                $this->datos['personas'] = $this->microModelo->obtenerPersonas();

                $this->vista('admin/microcreditos/anadir_microcredito', $this->datos); 
            }
        }

        public function eliminarmicrocredito($idPrestamo){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/microcredito');
            }
            if ($this->microModelo->eliminarmicrocredito($idPrestamo)){
                redireccionar("/microcredito/verMicrocredito");

            }else{
                echo "se ha producido un error!!!";
            }
        }

        public function editarmicrocredito($idPrestamo){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/microcredito');
            }        

                if($_SERVER['REQUEST_METHOD']=='POST'){
                 
                    $microcreditoModificado = $_POST;

                    if ($this->microModelo->editarMicrocredito($microcreditoModificado, $idPrestamo)){
                        
                        redireccionar("/microcredito/verMicrocredito/$idPrestamo");

                    }else{
                        echo "se ha producido un error!!!";
                    }
                } else {

                    $this->datos['personas'] = $this->microModelo->obtenerPersonas();
                    $this->datos['microcreditos'] = $this->microModelo->obtenerMicrocredito($idPrestamo);
                    $this->datos['movimientos']=$this->microModelo->obtenerMovimientos($idPrestamo);


                    $this->vista('admin/microcreditos/editar_microcredito', $this->datos);  
                }
            
        }

        public function anadir_movimiento(){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/microcredito');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $movimiento = $_POST;

                print_r($movimiento);
            
                if ($this->microModelo->anadirMovimiento($movimiento)){
                    redireccionar("/microcredito/editarmicrocredito/".$movimiento["idPrestamo"]);
                } else {
                    echo "Se ha producido un Error!!!";
                }
            }else{
                
            }

        }
        
        public function cerrarmicrocredito(){
            $this->datos['rolesPermitidos'] = [100];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/microcredito');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $movimiento = $_POST;

                // print_r($movimiento);

                // if($this->microModelo->microcreditoCerrado($movimiento["idPrestamo"])){
                //     exit();
                // } 

                if ($this->microModelo->cerrarMovimiento($movimiento)){
                    redireccionar("/microcredito/editarmicrocredito/".$movimiento["idPrestamo"]);
                } else {
                    echo "Se ha producido un Error!!!";
                }
            }else{
                
            }

        }

        

        // public function add_accion(){           
            
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $accion = $_POST;
        //         $accion['idPresatmo'] = $this->movimiento["usuarioSesion"]->idPresatmo;
                
        //         if($this->asesoriaModelo->asesoriaCerrada($accion["idPrestamo"])){
        //             exit();
        //         }
    
        //         // print_r($accion);
        //         if ($this->asesoriaModelo->addAccion($accion)){
        //             redireccionar("/asesorias/ver_asesoria/".$accion["idPrestamo"]);
        //         } else {
        //             echo "Se ha producido un Error!!!";
        //         }
        //     } else {
    
        //     }
        // }

        

        // public function get_accion($idMovimiento){

        //     if ($_SERVER['REQUEST_METHOD'] == 'GET') {         // Solo acceso GET
        //         $movimiento = $this->microModelo->getAccion($idMovimiento);    // No necesitamos la informacion que nos aporta $this->movimiento
        //         $this->vistaApi($movimiento);
        //     }
        // }

        // public function set_accion(){

        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {         // Solo acceso POST
        //         $accion = $_POST;
        //         if ($this->microModelo->setAccion($accion)){
        //             $this->vistaApi(true);
        //         } else {
        //             $this->vistaApi(false);
        //         }
        //     }
        // }


    }