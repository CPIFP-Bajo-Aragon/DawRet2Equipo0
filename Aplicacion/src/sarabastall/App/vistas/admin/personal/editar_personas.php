<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br>

        <?php foreach($datos['personas'] as $usu ):  ?>

        <form method="post" id="idFormulario" >
            <div class="row">
            
                <div class="col-12 mb-3">

                    <label class="form-label" for="username">Nombre de Usuario:</label>
                    <input class="form-control" type="text" id="username" name="username" value="<?php echo $usu->username ?>">
                        </div>
                <div class="col-12 mb-3">

                    <label class="form-label" for="dni">DNI:</label>
                    <input class="form-control" type="text" id="dni" name="dni" value="<?php echo $usu->DNI ?>">
                </div>
                <div class="col-12 mb-3">

                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" name="nombre"  value="<?php echo $usu->nombre ?>">
                </div>
                <div class="col-12 mb-3">
                    
                    <label class="form-label" for="apellidos">Apellidos:</label>
                    <input class="form-control" type="text" id="apellidos" name="apellidos"  value="<?php echo $usu->apellidos ?>">
                </div>
                <div class="col-12 mb-3">

                    <label class="form-label" for="telefono">Teléfono:</label>
                    <input class="form-control" type="text" id="telefono" name="telefono"  value="<?php echo $usu->telefono ?>">
                </div>
                <div class="col-12 mb-3">

                    <label class="form-label" for="correo">Correo:</label>
                    <input class="form-control" type="date" id="correo" name="correo" value="<?php echo $usu->correo ?>" >
                </div>
                <div class="col-12 mb-3">
                    
                    <label class="form-label" for="fecha">Fecha de Nacimiento:</label>
                    <input class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $usu->fechaNacimiento ?>">
                </div>
                <div class="col-12 mb-3">
                    
                    <label class="form-label" for="curso">Curso:</label>
                    <input class="form-control" type="text" id="curso" name="curso" value="<?php echo $usu->cursoActual ?>">
                </div>
                <div class="col-6">
                    
                    <button class="btn btn-secondary w-100" > <a href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
                </div>
                <div class="col-6 mb-5">
                    <input class="btn btn-primary w-100"  type="submit" value="Editar">
                </div>
        </div>
        </form>
        <?php endforeach ?> 
    </div>

</div>
<?php

if($_SERVER['REQUEST_METHOD'] == "post"){

    if(empty($_POST['username']) || $_POST['username'] = ""){
        $username_error = "Please enter the username";
    }

}

?>





<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
