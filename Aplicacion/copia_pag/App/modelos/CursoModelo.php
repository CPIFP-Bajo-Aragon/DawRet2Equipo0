<?php
    class CursoModelo{
        private $db;
 
        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCursos(){
            $this->db->query("SELECT curso.*,especialidad.*,persona.nombre nombre_profesor FROM curso
                                INNER JOIN especialidad ON curso.idEspecialidad = especialidad.idEspecialidad
                                INNER JOIN persona ON persona.idPersona = curso.idPersona");

            return $this->db->registros();                    
        }

        public function obtenerCurso($idCurso){
            $this->db->query("SELECT curso.*,especialidad.*,persona.nombre nombre_profesor FROM curso
                                INNER JOIN especialidad ON curso.idEspecialidad = especialidad.idEspecialidad
                                INNER JOIN persona ON persona.idPersona = curso.idPersona WHERE idCurso = :idCurso
                                ");
                                
            $this->db->bind(':idCurso', $idCurso);


            return $this->db->registros();                    
        }

        public function obtenerMovimientos(){
            $this->db->query("SELECT idMovimiento FROM movimiento");

            return $this->db->registros(); 
        }

        public function obtenerProfesores(){ 
            $this->db->query("SELECT nombre, idPersona, idTipo FROM persona
                                WHERE idTipo = 2");
            
            return $this->db->registros(); 
        }

        public function obtenerEspecialidades(){
            $this->db->query("SELECT * FROM especialidad");
            
            return $this->db->registros(); 
        }

        public function anadirCurso($curso){

            switch ($curso['especialidades']) {
                case '1':
                    $idEspecialidad = 1;
                    break;
                case '2':
                    $idEspecialidad = 2;
                    break;
                
            }


            $this->db->query("INSERT INTO curso(fechaInicio, fechaFin, nombreCurso, idEspecialidad, idPersona, importe, movimiento_idMovimiento)
                                    VALUES (:fechaInicio, :fechaFin, :nombreCurso, :especialidades, :profesorCurso, :importeCurso, :movimientoCurso)");

            

            $this->db->bind(':fechaInicio',$curso['fechaInicio']);
            $this->db->bind(':fechaFin',$curso['fechaFin']);
            $this->db->bind(':nombreCurso',$curso['nombreCurso']);
            $this->db->bind(':especialidades',$idEspecialidad);
            $this->db->bind(':profesorCurso',$curso['profesorCurso']);
            $this->db->bind(':importeCurso',$curso['importeCurso']);
            $this->db->bind(':movimientoCurso',$curso['movimientoCurso']);

            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editarCurso($cursoModificado, $idCurso){

            

            $this->db->query("UPDATE curso SET fechaInicio = :fechaInicio, fechaFin = :fechaFin, nombreCurso = :nombreCurso, idEspecialidad = :idEspecialidad, idPersona = :profesorCurso, importe = :importeCurso, movimiento_idMovimiento = :movimientoCurso
                                WHERE idCurso = :idCurso");

            $this->db->bind(':fechaInicio', $cursoModificado['fechaInicio']);
            $this->db->bind(':fechaFin', $cursoModificado['fechaFin']);
            $this->db->bind(':nombreCurso', $cursoModificado['nombreCurso']);
            $this->db->bind(':idEspecialidad', $cursoModificado['idEspecialidad']);
            $this->db->bind(':profesorCurso', $cursoModificado['profesorCurso']);
            $this->db->bind(':importeCurso', $cursoModificado['importeCurso']);
            $this->db->bind(':movimientoCurso', $cursoModificado['movimientoCurso']);

            $this->db->bind(':idCurso', $idCurso); 

            $this->db->execute();


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function borrarCurso($idCurso){
            $this->db->query("DELETE FROM curso WHERE idCurso=:idCurso");
            $this->db->bind(':idCurso',$idCurso);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

    }

?>  