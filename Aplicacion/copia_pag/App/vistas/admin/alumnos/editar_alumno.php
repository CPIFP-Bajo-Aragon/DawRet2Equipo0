<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br>

        <?php foreach($datos['alumnos'] as $alumno ):  ?>

            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-7 col-sm-7 col-8">
                    <form method="post" id="idFormulario" >
                        <div class="row">
                            <div class="col-12 mb-3">

                                <label class="form-label" for="nombre">Nombre:</label>
                                <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $alumno->nombre ?>">

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label" for="apellidos">apellidos:</label>
                                <input class="form-control" type="text" id="apellidos" name="apellidos" value="<?php echo $alumno->apellidos ?>">

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label" for="anyo_nacimiento">Año nacimiento:</label>
                                <input class="form-control" type="text" id="anyo_nacimiento" name="anyo_nacimiento"  value="<?php echo $alumno->anyo_nacimiento ?>">

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label" for="padre">Padre:</label>
                                <input class="form-control" type="text" id="padre" name="padre" value="<?php echo $alumno->padre ?>">

                            </div>

                            <div class="col-12 mb-4">

                                <label class="form-label" for="direccion_familiar">Dirección:</label>
                                <input class="form-control" type="text" id="direccion_familiar" name="direccion_familiar"  value="<?php echo $alumno->direccion_familiar ?>">

                            </div>

                            <div class="col-6">

                                <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/alumno/listaAlumno"> <button class="btn btn-secondary w-100"> Volver</button></a>

                            </div>
                            <div class="col-6 mb-5">

                                <input class="btn btn-primary w-100" type="submit" value="Editar">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 col-4 mt-4 text-center">
                    
                    <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/clients/<?php echo $alumno->foto ?>" class="img-fluid rounded mx-auto d-block" id="icono" alt="">

                </div>
            </div>

       
        
        <?php endforeach ?>
        
     

    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
