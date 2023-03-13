<?php
    class Centro extends Controlador{
        public function __construct(){ 
            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="Centro";
            $this->datos['rolesPermitidos'] = [100];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }

            $this->centroModelo = $this->modelo('CentroModelo');
        } 

        public function index(){

            $this->datos['centros'] = $this->centroModelo->obtenerCentros();

            $this->vista('admin/centros/lista_centro', $this->datos);
        }



        public function listacentro(){
            $this->datos['centros'] = $this->centroModelo->obtenerCentros();
            $this->vista('admin/centros/lista_centro', $this->datos);

        } 

        public function anadircentro(){
            $this->datos['rolesPermitidos'] = [100];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $centro = $_POST;
              
                if ($this->centroModelo->anadircentro($centro)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['centros'] = $this->centroModelo->obtenerCentros();
                $this->datos['ciudades'] = $this->centroModelo->obtenerCiudad();

                $this->vista('admin/centros/anadir_centro', $this->datos); 
            }
        }

        public function borrarcentro($idCentro){
            $this->datos['rolesPermitidos'] = [100];

            if ($this->centroModelo->borrarcentro($idCentro)){
                redireccionar("/centro/listacentro");

            }else{
                echo "se ha producido un error!!!";
            }
        }

        public function editarcentro($idCentro){
            $this->datos['rolesPermitidos'] = [100];

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $centroModificado = $_POST;
               
            if ($this->centroModelo->editarcentro($centroModificado, $idCentro)){
                
                redireccionar("/centro/listacentro/");

            }else{
                echo "se ha producido un error!!!";
            }
        }
        else{
            $this->datos['centros'] = $this->centroModelo->obtenerCentro($idCentro);
            $this->datos['ciudades'] = $this->centroModelo->obtenerCiudad();

            $this->vista('admin/centros/editar_centro', $this->datos); 
        }
        }
    }