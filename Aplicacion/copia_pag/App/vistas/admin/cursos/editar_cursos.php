<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-10 mx-auto">
        <br><br><br>

        <?php foreach($datos['cursos'] as $curso ):  ?> 


        <form method="post" id="idFormulario"> 
            <label class="form-label" for="nombreCurso">Nombre:</label><br>
                <input class="form-control" type="text" id="nombreCurso" name="nombreCurso" value="<?php echo $curso->nombreCurso;?>"><br>
            <label class="form-label" for="fechaInicio">Fecha inicio:</label><br>
                <input class="form-control" type="date" id="fechaInicio" name="fechaInicio" required value="<?php echo $curso->fechaInicio;?>"><br>
            <label class="form-label" for="fechaFin">Fecha fin:</label><br>
                <input class="form-control" type="date" id="fechaFin" name="fechaFin" required value="<?php echo $curso->fechaFin;?>"><br>
            <label class="form-label" for="idEspecialidad">Especialidad:</label>
                <select class="form-control" name="idEspecialidad" id="idEspecialidad">
                    <?php foreach ($datos['especialidades'] as $especialidad): ?>
                        <option value="<?php echo $especialidad->idEspecialidad;?>"><?php echo $especialidad->nombre; ?></option>
                    <?php endforeach;?>
                </select><br>
            <label class="form-label" for="profesorCurso">Profesor:</label>
                <select class="form-control" name="profesorCurso" id="profesorCurso">
                    <?php foreach ($datos['profesores'] as $prof): ?>
                        <option value="<?php echo $prof->idPersona;?>"><?php echo $prof->nombre; ?></option>
                    <?php endforeach;?>
                </select><br>
            <label class="form-label" for="importeCurso">Importe:</label><br>
                <input class="form-control" type="text" id="importeCurso" name="importeCurso" required value="<?php echo $curso->importe;?>"><br>
            <label class="form-label" for="movimientoCurso">Movimiento:</label><br>
                <select class="form-control" type="text" id="movimientoCurso" name="movimientoCurso"><br>
                    <?php foreach ($datos['movimientos'] as $mov): ?>
                        <option value="<?php echo $mov->idMovimiento;?>"><?php echo $mov->idMovimiento; ?></option>
                    <?php endforeach;?>
                </select><br>
            <button class="btn btn-secondary" style="width:49%"> <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
            <input class="btn btn-primary" style=" width:49%" type="submit" value="Editar"><br><br><br><br>
        </form>
        <?php endforeach; ?>
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>