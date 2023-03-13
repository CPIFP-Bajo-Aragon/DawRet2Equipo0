<?php
    class MicrocreditoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMicrocreditos(){

            $this->db->query("SELECT prestamo.*, estado.*, estado.estado as nombre_estado, persona.idPersona, persona.nombre as nombre_persona
                                    FROM prestamo, estado, persona
                                    WHERE prestamo.idEstado = estado.idEstado 
                                        AND prestamo.idPersona = persona.idPersona");

            return $this->db->registros();                    

        
        }

        public function obtenerMicrocreditosActivos(){

            $this->db->query("SELECT *, estado.estado as nombre_estado FROM prestamo
                            NATURAL JOIN estado
                                        WHERE estado = 1 OR estado=2 ORDER BY fechaInicio DESC");

            return $this->db->registros();                    

        
        }

        public function obtenerEstados(){

            $this->db->query("SELECT * FROM estado");

            return $this->db->registros();                    

        
        }

        

        public function obtenerMicrocredito($idPrestamo){

            $this->db->query("SELECT prestamo.*, estado.*, persona.idPersona, persona.nombre as nombre_persona
                                    FROM prestamo, estado, persona
                                    WHERE prestamo.idEstado = estado.idEstado 
                                        AND prestamo.idPersona = persona.idPersona
                                        AND idPrestamo =  :idPrestamo");


            $this->db->bind(':idPrestamo', $idPrestamo);
        

            return $this->db->registros();                    
        }

		
        
    

        public function anadirMicrocredito($microcredito){

        
            $this->db->query("INSERT INTO prestamo(importe, titulo, fechaInicio, fechaFin, idPersona, idEstado)
                                    VALUES (:importe, :titulo,NOW(), :fechaFin, :idPersona, 1)");

            $this->db->bind(':importe',$microcredito['importe']);
            $this->db->bind(':titulo',$microcredito['titulo']);
            $this->db->bind(':fechaFin',$microcredito['fechaFin']);
            $this->db->bind(':idPersona',$microcredito['idPersona']);


            $idPrestamo=$this->db->executeLastId();
            $cantidad =  $microcredito['importe'];

            print_r($idPrestamo);

            $this->db->query("INSERT INTO movimiento(procedencia, accion, fecha, cantidad, idTipo, idPrestamo)
                VALUES('microcredito', 'Inicia', NOW(), :cantidad, 1, :idPrestamo)");

                $this->db->bind(':cantidad', $cantidad);

                $this->db->bind(':idPrestamo', $idPrestamo);


            
            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

		public function anadirMovimiento($movimiento){

            $this->db->query("UPDATE prestamo SET idEstado=2
                WHERE idPrestamo=:idPrestamo");

                $this->db->bind(':idPrestamo',$movimiento['idPrestamo']);

                $this->db->execute();
                

				$this->db->query("INSERT INTO movimiento(procedencia, accion, fecha, cantidad, idTipo, idPrestamo)
                    VALUES('microcredito', :accion, NOW(), :cantidad, 1, :idPrestamo)");

                $this->db->bind(':accion',$movimiento['accion']);
                $this->db->bind(':cantidad', $movimiento['cantidad']);
                $this->db->bind(':idPrestamo',$movimiento['idPrestamo']);

                

        
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function eliminarMicrocredito($idPrestamo){
            $this->db->query("DELETE FROM prestamo 
                                    WHERE idPrestamo=:idPrestamo");

            $this->db->bind(':idPrestamo',$idPrestamo);
            $this->db->execute();

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editarMicrocredito($microcreditoModificado, $idPrestamo){

            // echo "hola";

            $this->db->query("UPDATE prestamo 
                                    SET importe=:importe, titulo=:titulo, fechaFin=:fechaFin ,idPersona=:idPersona
                                    WHERE idPrestamo=:idPrestamo");

            $this->db->bind(':importe',$microcreditoModificado['importe']);
            $this->db->bind(':titulo',$microcreditoModificado['titulo']);
            $this->db->bind(':fechaFin',$microcreditoModificado['fechaFin']);
            $this->db->bind(':idPersona',$microcreditoModificado['idPersona']);
			// $this->db->bind(':idEstado',2);

            $this->db->bind(':idPrestamo', $idPrestamo);



            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function obtenerMovimientos($idPrestamo) {

                $this->db->query("SELECT * FROM movimiento
                                    WHERE idPrestamo =  :idPrestamo
                    
                                    ORDER BY fecha DESC");
    
                // $idPrestamo=$this->db->executeLastId();
    
                $this->db->bind(':idPrestamo', $idPrestamo);
    
                return $this->db->registros();
    
            }

        public function obtenerPersonas(){
            $this->db->query("SELECT persona.*, persona.nombre as nombre_persona FROM persona"); 

            return $this->db->registros();                    
        }

    

        public function obtenerTipoMovimiento(){
            $this->db->query("SELECT * FROM tipomovimiento");

            return $this->db->registros(); 
        }

        public function microcreditoCerrado($idPrestamo){
            $this->db->query("SELECT * FROM prestamo 
                                    WHERE idPrestamo=:idPrestamo
                                    and idEstado=3");
            
            $this->db->bind(':idPrestamo',$idPrestamo);                        
            return $this->db->rowCount();
        }

        public function cerrarMovimiento($movimiento){

            $this->db->query("UPDATE prestamo SET idEstado=3, fechaFin = NOW() 
                WHERE idPrestamo=:idPrestamo");

                $this->db->bind(':idPrestamo',$movimiento['idPrestamo']);

                

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }


    }



?>  