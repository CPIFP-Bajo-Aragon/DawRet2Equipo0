<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br> 

        <?php foreach($datos['centros'] as $centro ):  ?> 


        <form method="post" id="idFormulario" enctype="multipart/form-data" onsubmit="return Validar(this, 'nombreCentro', 'distancia')">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label" for="nombreCentro">Nombre:</label>
                    <input class="form-control" type="text" id="nombreCentro" name="nombreCentro" value="<?php echo $centro->nombreCentro ?>" >
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="distancia">Distancia (Kms):</label>
                    <input class="form-control" type="int" id="distancia" name="distancia" value="<?php echo $centro->distancia ?>" >
                </div>
                <div class="col-12 mb-3">


                    <label class="form-label" for="idCiudad">Ciudad:</label>

                        <select class="form-control" aria-label=".form-select-sm example" id="idCiudad" name="idCiudad">
                        <?php foreach ($datos['ciudades'] as $ciudad): ?> 
                            
                            <option value="<?php echo $ciudad->idCiudad;?>"><?php echo $ciudad->nombre; ?></option>
                        <?php endforeach;?>
                        </select>

                </div>
                
                <div class="col-6">
                    <button class="btn btn-secondary w-100" > <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
                </div>
                <div class="col-6">
                    <input class="btn btn-primary w-100"  type="submit" value="Añadir" onclick="return validarFormulario();"><br><br><br><br>
                </div>
            </div>
        </form>

        <?php endforeach ?>
        
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
