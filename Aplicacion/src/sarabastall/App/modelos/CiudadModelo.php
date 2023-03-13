<?php
    class CiudadModelo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerCiudades(){
            $this->db->query("SELECT * FROM ciudad");

            return $this->db->registros();
        }

        public function anadirCiudad($ciudad){

                $this->db->query("INSERT INTO ciudad(nombre, cuantia)
                                        VALUES (:nombre, :cuantia)");
               
                $this->db->bind(':nombre',$ciudad['nombre']);
                $this->db->bind(':cuantia',$ciudad['cuantia']);              
                
                if ($this->db->execute()) {
                    return true;
                }else{
                    return false;
                }
        }


        public function borrarCiudad($idCiudad){
            $this->db->query("DELETE FROM ciudad WHERE idCiudad=:idCiudad");
            $this->db->bind(':idCiudad',$idCiudad);
            $this->db->execute();

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }
    }

?> 