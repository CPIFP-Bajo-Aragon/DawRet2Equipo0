<?php
    class MicrocreditoModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMicrocreditos(){

            $this->db->query("SELECT prestamo.*, movimiento.*, tipomovimiento.*, tipomovimiento.nombre as nombre_movimiento, tipoprestamo.*, tipoprestamo.nombre as nombre_prestamo, persona.*, persona.nombre as nombre_persona
                                    FROM prestamo, tipoprestamo, persona, movimiento, tipomovimiento
                                    WHERE prestamo.idTipo = tipoprestamo.idTipo 
                                        AND prestamo.idPersona = persona.idPersona
                                        AND movimiento.idMovimiento = prestamo.idMovimiento
                                        AND movimiento.idMovimiento =  tipomovimiento.idMovimiento");

            return $this->db->registros();                    

        
        }

        public function obtenerMicrocredito($idPrestamo){

            $this->db->query("SELECT prestamo.*, tipoprestamo.*
                                    FROM prestamo, tipoprestamo
                                    WHERE prestamo.idTipo = tipoprestamo.idTipo
                                        and idPrestamo = :idPrestamo");


            $this->db->bind(':idPrestamo', $idPrestamo);
        

            return $this->db->registros();                    
        }
        
        public function obtenerTipoMicrocredito(){
            $this->db->query("SELECT * FROM tipoprestamo");

            return $this->db->registros();
        }

        public function anadirMicrocredito($microcreditoModificado){

            

            $this->db->query("INSERT INTO prestamo(importe, estado, titulo, fechaPrestamo, idTipo, idPersona, idMovimiento)
                                    VALUES (:importe, :estado, :titulo, :fechaPrestamo, :idTipo, :idPersona, :idMovimiento)");

            $this->db->bind(':importe',$microcreditoModificado['importe']);
            $this->db->bind(':estado',$microcreditoModificado['estado']);
            $this->db->bind(':titulo',$microcreditoModificado['titulo']);
            $this->db->bind(':fechaPrestamo',$microcreditoModificado['fechaPrestamo']);
            $this->db->bind(':idTipo',$microcreditoModificado['idTipo']);
            $this->db->bind(':idPersona',$microcreditoModificado['idPersona']);
            $this->db->bind(':idMovimiento',$microcreditoModificado['idMovimiento']); 
            
            
            
            
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

            $this->db->query("UPDATE prestamo 
                                    SET importe=:importe, estado=:estado, titulo=:titulo, fechaPrestamo=:fechaPrestamo, idTipo=:idTipo, idPersona=:idPersona, idMovimiento=:idMovimiento
                                    WHERE idPrestamo=:idPrestamo");

            $this->db->bind(':importe',$microcreditoModificado['importe']);
            $this->db->bind(':estado',$microcreditoModificado['estado']);
            $this->db->bind(':titulo',$microcreditoModificado['titulo']);
            $this->db->bind(':fechaPrestamo',$microcreditoModificado['fechaPrestamo']);
            $this->db->bind(':idTipo',$microcreditoModificado['idTipo']);
            $this->db->bind(':idPersona',$microcreditoModificado['idPersona']);
            $this->db->bind(':idMovimiento',$microcreditoModificado['idMovimiento']); 
            $this->db->bind(':idPrestamo', $idPrestamo);



            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function obtenerPersonas(){
            $this->db->query("SELECT persona.*, persona.nombre as nombre_persona, tipopersona.*, tipopersona.nombre as nombre_tipo 
                                    FROM persona 
                                    INNER JOIN tipopersona 
                                    WHERE persona.idTipo = tipopersona.idTipo "); 

            return $this->db->registros();                    
        }

        public function obtenerTipoMovimiento(){
            $this->db->query("SELECT * FROM tipomovimiento");

            return $this->db->registros(); 
        }


    }



?>  