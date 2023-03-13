<?php
    class CentroModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCentros(){
            $this->db->query("SELECT centro.*, centro.nombreCentro as nombre_centro, ciudad.*, ciudad.nombre as nombre_ciudad FROM centro, ciudad
                                WHERE centro.idCiudad = ciudad.idCiudad");

            return $this->db->registros();                    
        }


        public function obtenerCentro($idCentro){
            $this->db->query("SELECT centro.*, ciudad.* FROM centro, ciudad
                                WHERE centro.idCiudad = ciudad.idCiudad
                                AND idCentro = :idCentro");
                                
            $this->db->bind(':idCentro',$idCentro);
            return $this->db->registros();                    
        }

        public function obtenerCiudad(){
            $this->db->query("SELECT * FROM ciudad");

            return $this->db->registros();                    
        }

        

        public function anadirCentro($datos){


            $this->db->query("INSERT INTO centro(nombreCentro, distancia, idCiudad)
                                    VALUES (:nombreCentro, :distancia, :idCiudad)");
           
            $this->db->bind(':nombreCentro',$datos['nombreCentro']);
            $this->db->bind(':distancia',$datos['distancia']);
            $this->db->bind(':idCiudad',$datos['idCiudad']);
          
            print_r($datos);
            
            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function borrarcentro($idCentro){
            $this->db->query("DELETE FROM centro WHERE idCentro=:idCentro");
            $this->db->bind(':idCentro',$idCentro);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function editarCentro($centroModificado, $idCentro){


            $this->db->query("UPDATE centro SET nombreCentro=:nombreCentro, distancia=:distancia, idCiudad=:idCiudad 
                            WHERE idCentro =:idCentro");
            // print_r($centro);
            $this->db->bind(':nombreCentro',$centroModificado['nombreCentro']);
            $this->db->bind(':distancia',$centroModificado['distancia']);
            $this->db->bind(':idCiudad',$centroModificado['idCiudad']);

            $this->db->bind(':idCentro',$idCentro);


            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

    }