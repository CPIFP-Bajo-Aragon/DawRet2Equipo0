<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br>



        <form method="post" id="idFormulario" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" name="nombre" >
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="apellidos">Apellidos:</label>
                    <input class="form-control" type="text" id="apellidos" name="apellidos">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="anyo_nacimiento">Año nacimiento:</label>
                    <input class="form-control" type="text" id="anyo_nacimiento" name="anyo_nacimiento" >
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="padre">Padre:</label>
                    <input class="form-control" type="text" id="padre" name="padre" >
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="direccion_familiar">Dirección:</label>
                    <input class="form-control" type="text" id="direccion_familiar" name="direccion_familiar"  >
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="fileToUpload">Imagen:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>      
                <div class="col-6">
                    <button class="btn btn-secondary w-100" > <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
                </div>
                <div class="col-6">
                    <input class="btn btn-primary w-100"  type="submit" value="Añadir"><br><br><br><br>
                </div>
            </div>
        </form>
        
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
