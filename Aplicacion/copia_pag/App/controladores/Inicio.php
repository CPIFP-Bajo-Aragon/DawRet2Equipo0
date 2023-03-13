<?php
    class Inicio extends Controlador{
        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="Inicio";

            $this->adminModelo = $this->modelo('AdminModelo');

        }

        public function index(){

            $this->datos["usuarioSesion"]->roles=$this->adminModelo->getRolesPersona($this->datos["usuarioSesion"]->idPersona);

                if (Sesion::sesionCreada($this->datos)){
    
                    switch ($this->datos['usuarioSesion']->roles) {
                        case 100:
                            redireccionar('/admin');
                            break;
                        case 200:
                            redireccionar('/admin');
                            break;
                        case 300:
                            redireccionar('/admin');
                            break;
                        case 400:
                            redireccionar('/admin');
                            break;
                        case 500:
                            redireccionar('/login');
                            break;
                    }
    
                } else {
                    redireccionar('/login');
                }

            
            // $this->datos["usuarioSesion"]->idRol=obtenerRol($this->datos["usuarioSesion"]->roles);

            $this->datos["rolesPermitidos"] = [100, 200, 300, 400];


            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol, $this->datos['rolesPermitidos'])) {
                print_r($this->datos['usuarioSesion']->idRol);
                echo "No tienes privilegios";
                exit();
            }
            $this-> vista("index", $this->datos);
        }
    } 
?>