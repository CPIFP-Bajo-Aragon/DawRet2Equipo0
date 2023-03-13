<?php
    //**Desarollo */
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    //**Desarollo */

    //Ruta de la aplicacion
    define('RUTA_APP', dirname(dirname(__FILE__)));
    
    //Ruta url
    
     $serverEngine = $_SERVER["SERVER_SOFTWARE"];
     
     

     if (str_starts_with($serverEngine, 'nginx')) {
         define('RUTA_URL_STATIC', 'http://192.168.4.236:85/public');
         define('RUTA_URL', 'http://192.168.4.236:85'); 
     } else{
        define('RUTA_URL_STATIC', 'http://192.168.4.236:80');
        define('RUTA_URL', 'http://192.168.4.236:80'); 
     }

    DEFINE('NOMBRE_SITIO', 'Web de Sarabastall ');

    //Configuración de la Base de Datos
    define('DB_HOST', '192.168.96.4:3306');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', 'Petrisor');
    define('DB_NOMBRE', 'sarabastall');
