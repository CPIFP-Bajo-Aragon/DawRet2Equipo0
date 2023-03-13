<?php

/**
 * mapear la url ingresada en el navegador
 * 1- controlador
 * 2- metodo
 * 3- parametros
 * Ejemplo: /articulo/actualizar/4
 */


class Core{
    protected $controladorActual= 'Inicio';
    protected $metodoActual = 'index';
    protected $parametros = [];

    public function __construct(){
        $url = $this->getUrl();

        if(isset($url[0])){
            //buscamos en controladores, si el controlador existe
            if(file_exists('../App/controladores/'.ucwords($url[0]).'.php')){
                //Si existe, se configura como controlador por defecto
                $this->controladorActual = ucwords($url[0]);
                //eliminamos la primera posicion de $url
                unset($url[0]);
            }
        }

        require_once '../App/controladores/'.$this->controladorActual.'.php';
        $this->controladorActual = new $this->controladorActual;


        // Obtener la segunda parte de la url: el metodo
        if(isset($url[1])){
        if(method_exists($this->controladorActual,$url[1])){
            $this->metodoActual= $url[1];
            unset($url[1]);
            }
        
        }
        
        //Obtenemos los parametros
        $this->parametros = $url ? array_values($url) : [];

        //Llamamos al metodo del controlador
        call_user_func_array([$this->controladorActual,$this->metodoActual], $this->parametros);

    }


    
    

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/'); //limpiamos url por la derecha
            $url = ltrim($_GET['url'], '/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;         
        }
        
        
    }
}


