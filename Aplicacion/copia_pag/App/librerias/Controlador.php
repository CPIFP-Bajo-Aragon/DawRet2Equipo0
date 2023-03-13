<?php
    // Controlador principal de todos los controladores
    // Se encarga de cargar los modelos y las vistas
    class Controlador{

        protected $datos=[];
        //cargar modelo
        public function modelo($modelo){
            require_once '../App/modelos/'.$modelo.'.php';
            return new $modelo;
        }

        //cargar vista
        public function vista($vista, $datos= []){
            //comprobamos si existe el archivo
            if(file_exists('../App/vistas/'.$vista.'.php')){
                require_once '../App/vistas/'.$vista.'.php';
        }else{
            die("la vista no existe");
        }
    }
}
