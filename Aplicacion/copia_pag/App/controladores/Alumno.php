<?php
    class Alumno extends Controlador{
        public function __construct(){ 
            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="Alumno";

            $this->alumnoModelo = $this->modelo('AlumnoModelo');
        }

        public function index(){

            $this->datos['alumnos'] = $this->alumnoModelo->obteneralumnos();

            $this->vista('admin/alumnos/lista_alumno', $this->datos);
        }



        public function listaAlumno(){
            $this->datos['alumnos'] = $this->alumnoModelo->obteneralumnos();
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

        public function editarAlumno($idAlumno){
            $this->datos['rolesPermitidos'] = [100];

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $alumnoModificado = $_POST;
                
            if ($this->alumnoModelo->editarAlumno($alumnoModificado, $idAlumno)){
                
                redireccionar("/admin/alumnos/editar_alumno");

            }else{
                echo "se ha producido un error!!!";
            }
        }
        else{
            
            $this->datos['alumnos'] = $this->alumnoModelo->obtenerAlumno($idAlumno);
            $this->vista('admin/alumnos/editar_alumno', $this->datos); 
        }
        }
    }