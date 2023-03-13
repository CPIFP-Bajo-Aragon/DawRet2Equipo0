<?php
    class Ciudad extends Controlador{
        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="ciudad";
            $this->datos['rolesPermitidos'] = [100];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }
            $this->ciudadModelo = $this->modelo('CiudadModelo');
        }

        public function index(){
            
            $this->datos['rolesPermitidos'] = [100];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }

            $this->vista('admin/gestion', $this->datos);
        }

        public function verCiudad(){
            $this->datos['ciudades'] = $this->ciudadModelo->obtenerCiudades();
            $this->vista('admin/ciudades/ver_ciudad', $this->datos);
        }

        public function anadirCiudad(){
            $this->datos['rolesPermitidos'] = [100];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ciudad = $_POST;
            
                if ($this->ciudadModelo->anadirCiudad($ciudad)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['ciudades'] = $this->ciudadModelo->obtenerCiudades();
            $this->vista('admin/ciudades/anadir_ciudad', $this->datos);
        }
    }

        public function borrarCiudad($idCiudad){
            $this->datos['rolesPermitidos'] = [100];

            if ($this->ciudadModelo->borrarCiudad($idCiudad)){
                redireccionar("/ciudades/ver_ciudades");

            }else{
                echo "se ha producido un error!!!";
            }
        }
    }
