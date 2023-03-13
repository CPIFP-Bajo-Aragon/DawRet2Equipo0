<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-10 mx-auto">
        <br><br><br>
        <form method="post" id="idFormulario" onsubmit="return Validar(this, 'nombreCurso', 'fechaInicio', 'fechaFin', 'importeCurso', 'movimientoCurso')"> 
            <div class="row">
                <div class="col-12 mb-3">

                    <label class="form-label" for="nombreCurso">Nombre:</label>
                    <input class="form-control" type="text" id="nombreCurso" name="nombreCurso" value="<?php echo $datos['cursos']->nombreCurso;?>">

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaInicio">Fecha inicio:</label>
                    <input class="form-control" type="date" id="fechaInicio" name="fechaInicio" required value="<?php echo $datos['cursos']->fechaInicio;?>">
                
                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaFin">Fecha fin:</label>
                    <input class="form-control" type="date" id="fechaFin" name="fechaFin" required value="<?php echo $datos['cursos']->fechaFin;?>">

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="idEspecialidad">Especialidad:</label>
                    <select class="form-control" name="idEspecialidad" id="idEspecialidad">
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
                    <input class="form-control" type="text" id="importeCurso" name="importeCurso" required value="<?php echo $datos['cursos']->importe;?>">

                </div>

                <div class="col-12 mb-4">

                    <label class="form-label" for="movimientoCurso">Movimiento:</label>
                    <select class="form-control" type="text" id="movimientoCurso" name="movimientoCurso"><br>
                        <?php foreach ($datos['movimientos'] as $mov): ?>
                            <option value="<?php echo $mov->idMovimiento;?>"><?php echo $mov->idMovimiento; ?></option>
                        <?php endforeach;?>
                    </select>

                </div>

                <div class="col-6">

                <a href="<?php echo RUTA_URL ?>/curso/verCurso"><button class="btn btn-secondary w-100"> Volver</button></a>

                </div>

                <div class="col-6 mb-5">

                    <input class="btn btn-primary w100" type="submit" value="Editar" onclick="return validarFormulario();">
                
                </div>
            </div>
        </form>
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>