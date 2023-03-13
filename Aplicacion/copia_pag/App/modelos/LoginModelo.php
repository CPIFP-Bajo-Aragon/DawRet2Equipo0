<?php

    class LoginModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;

        }
            
        public function login($datos){
            $this->db->query("SELECT * FROM persona
                                WHERE username = :username
                                AND clave = sha2(:clave, 256)");

            $this->db->bind(':username',$datos['usuario']);
            $this->db->bind(':clave',$datos['pass']);

            return $this->db->registro();
        }
        
    
    }

