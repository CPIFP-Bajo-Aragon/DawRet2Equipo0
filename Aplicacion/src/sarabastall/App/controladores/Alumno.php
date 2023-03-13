<?php
    class Alumno extends Controlador{
        public function __construct(){ 
            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="Alumno";
            $this->datos['rolesPermitidos'] = [100];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inicio');
            }
            $this->alumnoModelo = $this->modelo('AlumnoModelo');
        } 

        public function index(){

            $this->datos['alumnos'] = $this->alumnoModelo->obteneralumnos();

            $this->vista('admin/alumnos/lista_alumno', $this->datos);
        }



        public function listaAlumno(){
           
            $this->datos['alumnos'] = $this->alumnoModelo->obteneralumnos();
          
            $this->datos['generos'] = $this->alumnoModelo->obtenerGeneros();
          
            $this->vista('admin/alumnos/lista_alumno', $this->datos);

        } 

        public function anadirAlumno(){
            $this->datos['rolesPermitidos'] = [100];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $alumno = $_POST;
                
               
                if ($this->alumnoModelo->anadirAlumno($alumno)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['generos'] = $this->alumnoModelo->obtenerGeneros();
                $this->datos['alumnos'] = $this->alumnoModelo->obtenerAlumnos();
                $this->vista('admin/alumnos/anadir_alumno', $this->datos); 
            }
        }

        public function borraralumno($idAlumno){
            $this->datos['rolesPermitidos'] = [100];

            if ($this->alumnoModelo->borraralumno($idAlumno)){
                redireccionar("/alumno/listaAlumno");

            }else{
                echo "se ha producido un error!!!";
            }
        }

        /* MARIO */
        public function fetchVerDatos($idPersona){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {         // Solo acceso GET
                $datos = $this->alumnoModelo->obtenerAlumno($idPersona);    // No necesitamos la informacion que nos aporta $this->datos
                $this->vistaApi($datos);
            }
        }
        
        public function fetchEditarDatos(){
            $datos = $_POST;
            echo($datos);
            exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Solo acceso POST
                
                
                if ($this->alumnoModelo->editarAlumno($datos)){ //Le paso los datos que me llegan por POST
                $this->vistaApi(true);
                } else {
                $this->vistaApi(false);
                }
            }
        }
        /* FIN MARIO */

        public function editarAlumno($idAlumno){
            $this->datos['rolesPermitidos'] = [100];
        
            if($_SERVER['REQUEST_METHOD']=='POST'){

                $alumnoModificado = $_POST;
                // $fileUsu = $_FILES['fileToUpload']['name'];


               
            if ($this->alumnoModelo->editarAlumno($alumnoModificado, $idAlumno)){
               
                redireccionar("/alumno/listaAlumno/");

            }else{
                echo "se ha producido un error!!!";
            }
        }
        else{
            $this->datos['generos'] = $this->alumnoModelo->obtenerGeneros();
            $this->datos['alumnos'] = $this->alumnoModelo->obtenerAlumno($idAlumno);
            $this->vista('admin/alumnos/editar_alumno', $this->datos); 
        }
        }
    }