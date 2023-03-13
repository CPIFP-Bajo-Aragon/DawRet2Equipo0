<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<?php print_r($this->datos['materiales']);?>
<div class="container">

<div class="col-10 mx-auto">
    <br><br><br>

    <h1></h1>
    
    <form method="post" id="idFormulario" enctype="multipart/form-data">

        <div class="row">
            <div class="col-12 mb-3">
                <label class="form-label" for="nombre">Archivo:</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="col-6">
                <button class="btn btn-secondary w-100 "> <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
            </div>
            <div class="col-6">
                <input class="btn btn-primary w-100" type="submit" value="Añadir"><br><br><br><br>
            </div>
        </div>

    </form>
    
</div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>