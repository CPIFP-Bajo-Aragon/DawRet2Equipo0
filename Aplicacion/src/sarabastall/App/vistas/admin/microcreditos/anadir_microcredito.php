<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-10 mx-auto">
        <br><br><br>


        <form method="post" id="idFormulario" onsubmit="return Validar(this, 'importe', 'titulo', 'fechaFin')">
            <div class="row">

                <div class="col-12 mb-3">

                    <label class="form-label" for="importe">Importe:</label>
                    <input class="form-control" type="text" id="importe" name="importe" required>

                </div>


                <div class="col-12 mb-3">

                    <label class="form-label" for="titulo">Título:</label>
                    <input class="form-control" type="text" id="titulo" name="titulo" required>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaFin">Fecha de vencimiento:</label>
                    <input class="form-control" type="date" id="fechaFin" name="fechaFin" required>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="idPersona">Persona:</label>
                    <select class="form-control" type="text" id="idPersona" name="idPersona">
                        <?php foreach ($datos['personas'] as $persona): ?>
                            <option value="<?php echo $persona->idPersona;?>"><?php echo $persona->nombre; ?></option>
                        <?php endforeach;?>
                    </select>

                </div>

            

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