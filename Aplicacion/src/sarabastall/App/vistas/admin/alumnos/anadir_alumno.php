<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto mt-5">
     

 

        <form method="post" id="idFormulario" enctype="multipart/form-data" onsubmit="return Validar(this, 'nombre', 'anyo_nacimiento', 'padre', 'idApellidos', 'direccion_familiar')">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" name="nombre" >
                </div>
                <div class="col-12 mb-3">

                    <label class="form-label" for="idGenero">Género:</label>

                        <select class="form-control" aria-label=".form-select-sm example" id="idGenero" name="idGenero">
                        <?php foreach ($datos['generos'] as $genero): ?> 
                            
                            <option value="<?php echo $genero->idGenero;?>"><?php echo $genero->nombre; ?></option>
                        <?php endforeach;?>
                        </select>

                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="anyo_nacimiento">Año de nacimiento:</label>
                    <input class="form-control" type="int" id="anyo_nacimiento" name="anyo_nacimiento" >
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
     


               
                <div id="containerCurso" class="col-12 mb-4">

</div>

<div class="col-12 mb-5 d-flex justify-content-center" >
    <input class="btn btn-primary backwadd" type="submit" value="Añadir" onclick="return validarFormulario();">
</div>
</div>
        </form>

            
            <div class="col-12">
               
               <div class="col-12 d-flex justify-content-center" >
               <a href="<?php echo RUTA_URL ?>/admin"><button class="btn btn-secondary backwadd">Volver</button></a>
               </div>
           </div>
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
