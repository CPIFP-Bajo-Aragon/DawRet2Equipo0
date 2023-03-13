<?php
    //Para redireccionar la página
    function redireccionar($pagina){
        header("location: ".RUTA_URL.$pagina);
    }

    function tienePrivilegios($rol_usuario, $rolesPermitidos){
        if (empty($rolesPermitidos) || in_array($rol_usuario, $rolesPermitidos)) {
            return true;
        }
    }

    // function obtenerRol($roles){
    //     $idRol=0;
    //     foreach($roles as $rol){
            
    //         if ($rol->idPersona==1) {
    //             if ($rol->idRol==100) {
    //                 $idRol=100;
    //             }
    //         }else if ($rol->idPersona==2) {
    //             if ($rol->idRol==20) {
    //                 $idRol=20;
    //             }
    //             if ($rol->idRol==10) {
    //                 $idRol=30;
    //             }
    //         } 
    //     }
    //     return $idRol; 
    // }

?>