<?php
    class MaterialModelo{
        private $db;
 
        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMateriales(){
            $this->db->query("SELECT * FROM materiales");
        }
    }
?>