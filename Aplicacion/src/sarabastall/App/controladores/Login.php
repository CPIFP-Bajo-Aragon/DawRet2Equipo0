<?php
    class Login extends Controlador{
        public function __construct(){
            $this->loginModelo = $this->modelo('LoginModelo');
        }

        public function index($error = ''){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datos = $_POST;
                $this->datos['usuario'] = trim($_POST['idUsuario']);
                $this->datos['pass'] = trim($_POST['idPassword']);
    
                $usuarioSesion = $this->loginModelo->login($this->datos);
    
                if (isset($usuarioSesion) && !empty($usuarioSesion)) {
                    Sesion::crearSesion($usuarioSesion);
                    redireccionar('/');
                }else{
                    redireccionar('/login/index/error_1');
                }
            }else{
                
                if (Sesion::sesionCreada()) {
                    redireccionar('/');
                }
                $this->datos['error'] = $error;
    
                $this->vista('login', $this->datos);
            }
        }

        public function logout(){
            Sesion::cerrarSesion();
            redireccionar('/');
        }
    } 
?> 