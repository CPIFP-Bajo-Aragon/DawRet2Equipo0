<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-10 mx-auto">
        <br><br><br>


        <form method="post" id="idFormulario" onsubmit="return Validar(this, 'nombreCurso', 'fechaInicio', 'fechaFin', 'importeCurso', 'movimientoCurso')">
            <div class="row">
                <div class="col-12 mb-3">

                    <label class="form-label" for="nombreCurso">Nombre:</label>
                    <input class="form-control" type="text" id="nombreCurso" name="nombreCurso">   

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaInicio">Fecha inicio:</label>
                    <input class="form-control" type="date" id="fechaInicio" name="fechaInicio">

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaFin">Fecha fin:</label>
                    <input class="form-control" type="date" id="fechaFin" name="fechaFin">

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="especialidades">Especialidad:</label>
                    <select class="form-control" name="especialidades" id="especialidades">
                        <?php foreach ($datos['especialidades'] as $especialidad): ?>
                            <option value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->nombre; ?></option>
                        <?php endforeach;?>
                    </select>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="profesorCurso">Profesor:</label>
                    <select class="form-control" name="profesorCurso" id="profesorCurso">
                        <?php foreach ($datos['profesores'] as $prof): ?>
                            <option value="<?php echo $prof->idPersona;?>"><?php echo $prof->nombre; ?></option>
                        <?php endforeach;?>
                    </select>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="importeCurso">Importe:</label>
                    <input class="form-control" type="text" id="importeCurso" name="importeCurso">

                </div>

                <div class="col-12 mb-4">

                    <label class="form-label" for="movimientoCurso">Movimiento:</label><br>
                    <select class="form-control" type="text" id="movimientoCurso" name="movimientoCurso">
                        <?php foreach ($datos['movimientos'] as $mov): ?>
                            <option value="<?php echo $mov->idMovimiento;?>"><?php echo $mov->idMovimiento; ?></option>
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