<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto mt-5">
        

 

        <form method="post" id="idFormulario" enctype="multipart/form-data" onsubmit="return Validar(this, 'nombreCentro', 'distancia')">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label" for="nombreCentro">Nombre:</label>
                    <input class="form-control" type="text" id="nombreCentro" name="nombreCentro" >
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="distancia">Distancia:</label>
                    <input class="form-control" type="int" id="distancia" name="distancia" >
                </div>
                <div class="col-12 mb-3">


                    <label class="form-label" for="idCiudad">Ciudad:</label>

                        <select class="form-control" aria-label=".form-select-sm example" id="idCiudad" name="idCiudad">
                        <?php foreach ($datos['ciudades'] as $ciudad): ?> 
                            
                            <option value="<?php echo $ciudad->idCiudad;?>"><?php echo $ciudad->nombre; ?></option>
                        <?php endforeach;?>
                        </select>

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
