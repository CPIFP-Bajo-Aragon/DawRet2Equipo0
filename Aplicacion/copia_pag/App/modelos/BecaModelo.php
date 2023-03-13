<?php
    class BecaModelo{
        private $db;
 
        public function __construct(){
            $this->db = new Base;
        }


        public function obtenerBecas(){
            $this->db->query("SELECT beca.*, tipobeca.*, tipobeca.nombre as nombre_beca, persona.*, tipopersona.*, persona.nombre as nombre_madrina, alumno.idAlumno, alumno.nombre as nombre_alumno  
                                    FROM beca, tipobeca, persona, alumno, tipopersona
                                    WHERE tipobeca.idTipo=beca.idTipo  
                                        AND beca.idPersona =  persona.idPersona 
                                        AND beca.idAlumno = alumno.idAlumno 
                                        AND persona.idTipo = tipopersona.idTipo;");
            // INNER JOIN tipobeca ON tipobeca.idTipo = beca.idTipo
            // INNER JOIN persona ON beca.idPersona =  persona.idPersona 
            // INNER JOIN alumno ON beca.idAlumno =  alumno.idAlumno");

            return $this->db->registros();                    
        }

        public function obtenerBeca($id_beca){
            
            $this->db->query("SELECT beca.*, tipobeca.*, tipobeca.nombre as nombre_beca, persona.*, tipopersona.*, persona.nombre as nombre_madrina, alumno.idAlumno, alumno.nombre as nombre_alumno  
                                    FROM beca, tipobeca, persona, alumno, tipopersona
                                    WHERE tipobeca.idTipo=beca.idTipo 
                                        AND beca.idPersona =  persona.idPersona 
                                        AND beca.idAlumno = alumno.idAlumno 
                                        AND persona.idTipo = tipopersona.idTipo
                                        AND idBeca = :idBeca;");

            $this->db->bind(':idBeca', $id_beca); 
        

            return $this->db->registros();                    
        }

        public function obtenerTipoBeca(){
            $this->db->query("SELECT * FROM tipobeca");

            return $this->db->registros();
        }

        public function anadirBeca($datos){

            $this->db->query("INSERT INTO beca(importe, Obs, fechaInicio, fechaFin, idTipo, idCentro, idPersona, fechaAbonoMadrina, idAlumno, fechaAlumno, notaMedia)
                                    VALUES (:importe, :Obs, :fechaInicio, :fechaFin, :idTipo, :idCentro, :idPersona, :fechaAbonoMadrina, :idAlumno, :fechaAlumno, :notaMedia)");
            print_r($datos);
            $this->db->bind(':importe',$datos['importe']);
            $this->db->bind(':Obs',$datos['Obs']);
            $this->db->bind(':fechaInicio',$datos['fechaInicio']);
            $this->db->bind(':fechaFin',$datos['fechaFin']);
            $this->db->bind(':idTipo',$datos['idTipo']);
            $this->db->bind(':idCentro',$datos['idCentro']);
            $this->db->bind(':idPersona',$datos['idPersona']);
            $this->db->bind(':fechaAbonoMadrina',$datos['fechaAbonoMadrina']);
            $this->db->bind(':idAlumno',$datos['idAlumno']);
            $this->db->bind(':fechaAlumno',$datos['fechaAlumno']);
            $this->db->bind(':notaMedia',$datos['notaMedia']); 
            
            
            
            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function obtenerCentro(){
            $this->db->query("SELECT * FROM centro");

            return $this->db->registros();
        }

        public function obtenerMadrinas(){
            $this->db->query("SELECT nombre, idTipo, idPersona FROM persona
                WHERE idTipo = 4");

            return $this->db->registros();
        }

        public function obtenerAlumnos(){
            $this->db->query("SELECT nombre, idAlumno FROM alumno" );

            return $this->db->registros();
        }

        public function borrarBeca($id_beca){
            $this->db->query("DELETE FROM beca WHERE idBeca=:idBeca");
            $this->db->bind(':idBeca',$id_beca);
            $this->db->execute();

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editarBeca($becaModificado, $idBeca){

            print_r($becaModificado);
            $this->db->query("UPDATE beca 
                                SET importe=:importe, Obs=:Obs, fechaInicio=:fechaInicio, fechaFin=:fechaFin, idTipo=:idTipo, idCentro=:idCentro, idPersona=:idPersona, fechaAbonoMadrina=:fechaAbonoMadrina,
                                    idAlumno=:idAlumno, fechaAlumno=:fechaAlumno, notaMedia=:notaMedia 
                                WHERE idBeca=:idBeca");
            
            $this->db->bind(':importe',$becaModificado['importe']);
            $this->db->bind(':Obs',$becaModificado['Obs']);
            $this->db->bind(':fechaInicio',$becaModificado['fechaInicio']);
            $this->db->bind(':fechaFin',$becaModificado['fechaFin']);
            $this->db->bind(':idTipo',$becaModificado['idTipo']);
            $this->db->bind(':idCentro',$becaModificado['idCentro']); 
            $this->db->bind(':idPersona',$becaModificado['idPersona']);
            $this->db->bind(':fechaAbonoMadrina',$becaModificado['fechaAbonoMadrina']);
            $this->db->bind(':idAlumno',$becaModificado['idAlumno']);
            $this->db->bind(':fechaAlumno',$becaModificado['fechaAlumno']);
            $this->db->bind(':notaMedia',$becaModificado['notaMedia']); 

            $this->db->bind(':idBeca', $idBeca);



            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

    

    }



?>  