<?php
    class Admin extends Controlador{ 
        public function __construct(){ 
            
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [100];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }

            $this->datos["menuActivo"]="Persona";

            $this->adminModelo = $this->modelo('AdminModelo');
        }

        public function index(){ 

            $this->datos['rolesPermitidos'] = [100];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }

            $this->datos['personas'] = $this->adminModelo->obtenerPersonas();

            $this->vista('admin/gestion', $this->datos);
        }

        public function verPersona(){
            $this->datos['personas'] = $this->adminModelo->obtenerPersonas();
            $this->datos['tipoPersona'] = $this->adminModelo->obtenerTipoPersonas();
            $this->vista('admin/personal/ver_personas', $this->datos);

        } 

        public function anadirPersona(){ 
            $this->datos['rolesPermitidos'] = [100];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                $persona = $_POST;
            
                if ($this->adminModelo->anadirPersona($persona)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['tipoPersona'] = $this->adminModelo->obtenerTipoPersonas();
                $this->datos['cursos'] = $this->adminModelo->obtenerCursos();
                $this->vista('admin/personal/anadir_persona', $this->datos);
            }
        }

        public function editarPersona($idUsu){
            $this->datos['rolesPermitidos'] = [100];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $persona = $_POST; 
                print_r($persona);
                if ($this->adminModelo->editarPersona($persona, $idUsu)){
                    redireccionar("/admin/verPersona");
                    
                }else{
                    echo "se ha producido un error!!!";
                }

            
            }else{
                $this->datos['personas'] = $this->adminModelo->obtenerPersona($idUsu);
                $this->datos['tipoPersona'] = $this->adminModelo->obtenerTipoPersonas();
                $this->vista('admin/personal/editar_personas', $this->datos);
            }
        }

        public function eliminarPersona($idUsu){

            $this->datos['rolesPermitidos'] = [100];
                
            if ($this->adminModelo->borrarPersona($idUsu)){
                redireccionar("/admin/verPersona");

            }else{
                echo "se ha producido un error!!!";
            }
        
    }
    }
?>