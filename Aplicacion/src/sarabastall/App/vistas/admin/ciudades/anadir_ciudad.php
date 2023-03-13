<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-10 mx-auto mt-5">
  

        <form method="post" id="idFormulario" onsubmit="return Validar(this, 'nombre', 'cuantia')">
            <div class="row">

                <div class="col-12 mb-3">

                    <label class="form-label" for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" name="nombre" required>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="cuantia">Cuantía:</label>
                    <input class="form-control" type="text" id="cuantia" name="cuantia" required>

                </div>


           

        
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