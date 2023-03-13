<?php
    class Curso extends Controlador{
        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos["menuActivo"]="Curso";

            $this->cursoModelo = $this->modelo('CursoModelo');
        }

        public function index(){
            
            $this->datos['rolesPermitidos'] = [100, 200, 300, 400];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }


            $this->datos['cursos'] = $this->cursoModelo->obtenerCursos();
            $this->datos['profesores'] = $this->cursoModelo->obtenerProfesores();
            $this->datos['especialidades'] = $this->cursoModelo->obtenerEspecialidades();

            $this->vista('admin/cursos/ver_cursos', $this->datos);
        }

        public function verCurso(){
            $this->datos['rolesPermitidos'] = [100, 200, 300];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }
            $sesion = $this->datos['usuarioSesion']->idPersona;
            $this->datos['cursoPersona'] = $this->cursoModelo->obtenerCursoPersona($sesion);
            $this->datos['cursos'] = $this->cursoModelo->obtenerCursos();
            $this->datos['especialidades'] = $this->cursoModelo->obtenerEspecialidades();

            $this->vista('admin/cursos/lista_cursos', $this->datos);

        } 

        public function anadirCurso(){
            $this->datos['rolesPermitidos'] = [100, 200];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $curso = $_POST;
            
                if ($this->cursoModelo->anadirCurso($curso)){
                    redireccionar("/admin/gestion");
    
                }else{
                    echo "se ha producido un error!!!";
                }
            }else{
                $this->datos['cursos'] = $this->cursoModelo->obtenerCursos();
                $this->datos['profesores'] = $this->cursoModelo->obtenerProfesores();
                $this->datos['especialidades'] = $this->cursoModelo->obtenerEspecialidades();
                $this->datos['movimientos'] = $this->cursoModelo->obtenerMovimientos();
                $this->vista('admin/cursos/anadir_cursos', $this->datos);
            }
        }

        public function editarCurso($idCurso){
            $this->datos['rolesPermitidos'] = [100, 200];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }
            if (tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $cursoModificado = $_POST;
                    
                if ($this->cursoModelo->editarCurso($cursoModificado, $idCurso)){
                    redireccionar("/curso/verCurso");

                }else{
                    echo "Error";
                }
            }else{
                
                $this->datos['cursos'] = $this->cursoModelo->obtenerCurso($idCurso);
                $this->datos['profesores'] = $this->cursoModelo->obtenerProfesores();
                $this->datos['especialidades'] = $this->cursoModelo->obtenerEspecialidades();
                $this->datos['movimientos'] = $this->cursoModelo->obtenerMovimientos();
                $this->vista('admin/cursos/editar_cursos', $this->datos);
            }
            }
        }

        public function eliminarCurso($idCurso){
            $this->datos['rolesPermitidos'] = [100, 200];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }

            if ($this->cursoModelo->borrarCurso($idCurso)){
                redireccionar("/admin/cursos/lista_cursos");

            }else{
                echo "se ha producido un error!!!";
            }
        }

        public function verMaterial($idCurso){
            $this->datos['rolesPermitidos'] = [100, 200, 300];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $materialNombre = $_POST;
                $materialArchivo = $_FILES;

                if ($this->cursoModelo->anadirMateriales($materialNombre, $materialArchivo, $idCurso)) {
                    redireccionar('/curso/verCurso');
                }else{
                    echo 'Se ha producido un error';
                }
            }else{
                $this->datos['curso'] = $this->cursoModelo->obtenerCurso($idCurso);
                $this->datos['materiales'] = $this->cursoModelo->obtenerMateriales();
                $this->datos['materialesCurso'] = $this->cursoModelo->obtenerMaterialesCurso($idCurso);
                $this->vista('admin/cursos/materiales', $this->datos);
            }
        }

        public function borrarMaterial($idMaterial){
            $this->datos['rolesPermitidos'] = [100, 200];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }

            if ($this->cursoModelo->borrarMaterial($idMaterial)){
                redireccionar("/admin/cursos/materiales");
    
            }else{
                echo "se ha producido un error!!!";
                
            }
        }
        public function fetchVerDatos($idPersona){

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {         // Solo acceso GET
                $datos = $this->cursoModelo->obtenerTrabajador($idPersona);    // No necesitamos la informacion que nos aporta $this->datos
                $this->vistaApi($datos);
            }
        }

        public function fetchEditarDatos(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Solo acceso POST
                $datos = $_POST;
                if ($this->cursoModelo->editarPersona($datos)){ //Le paso los datos que me llegan por POST
                    $this->vistaApi(true);
                } else {
                    $this->vistaApi(false);
                }
            }
        }

        public function verTrabajadores($idCurso){
            $this->datos['rolesPermitidos'] = [100, 200];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }
                $this->datos['curso'] = $this->cursoModelo->obtenerCurso($idCurso);
                $this->datos['trabajadores'] = $this->cursoModelo->obtenerTrabajadoresCurso($idCurso);
                $this->vista('admin/cursos/trabajadores', $this->datos);
        }

        public function eliminarTrabajador($idTrabajador){
            $this->datos['rolesPermitidos'] = [100, 200];
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/curso');
            }
            if ($this->cursoModelo->borrarTrabajador($idTrabajador)){
                redireccionar("/admin/curso/verTrabajadores");
    
            }else{
                echo "se ha producido un error!!!";
                
            }
        }

        public function generarDiploma($idTrabajador, $idCurso){
            $this->datos['rolesPermitidos'] = [100, 200];
            $this->datos['diplomaCurso'] = $this->cursoModelo->obtenerCurso($idCurso);
            $this->datos['diplomaPersona'] = $this->cursoModelo->obtenerTrabajador($idTrabajador);
            $this->vista('admin/cursos/diplomas', $this->datos);
        }

    } 
?>