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
            $this->datos['cursosPersona'] = $this->adminModelo->obtenerCursosPersona();
            $this->datos['cursos'] = $this->adminModelo->obtenerCursos();
            $this->datos['personas'] = $this->adminModelo->obtenerPersonas();
            $this->datos['tipoPersona'] = $this->adminModelo->obtenerTipoPersonas();
            $this->vista('admin/personal/ver_personas', $this->datos);
        }

        /* MARIO */
        public function fetchVerDatos($idPersona){

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {         // Solo acceso GET
                $datos = $this->adminModelo->obtenerPersona($idPersona);    // No necesitamos la informacion que nos aporta $this->datos
                $this->vistaApi($datos);
            }
        }

        public function fetchEditarDatos(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Solo acceso POST
                $datos = $_POST;
                if ($this->adminModelo->editarPersona($datos)){ //Le paso los datos que me llegan por POST
                    $this->vistaApi(true);
                } else {
                    $this->vistaApi(false);
                }
            }
        }
        /* FIN MARIO */

       



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