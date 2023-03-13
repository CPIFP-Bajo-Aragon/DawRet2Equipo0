<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br>


        <form method="post" id="idFormulario" onsubmit="return Validar(this, 'importe', 'Obs', 'fechaInicio', 'fechaFin', 'fechaAbonoMadrina', 'fechaAlumno')">

            <div class="row">

                <div class="col-12 mb-3">

                    <label class="form-label" for="idTipo">Tipo:</label>
                    <select class="form-control" name="idTipo" id="idTipo">
                        <?php foreach ($datos['tipoBeca'] as $becatipo ): ?>
                            <option value="<?php echo $becatipo->idTipo; ?>"><?php echo $becatipo->nombre ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="importe">Importe:</label>
                    <input class="form-control" type="text" id="importe" name="importe">

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="Obs">Observaciones:</label>
                    <input class="form-control" type="text" id="Obs" name="Obs">

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaInicio">Fecha de Inicio:</label>
                    <input class="form-control" type="date" id="fechaInicio" name="fechaInicio" required>

                </div>
                    
                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaFin">Fecha de Fin:</label>
                    <input class="form-control" type="date" id="fechaFin" name="fechaFin" required>
                
                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="idCentro">Centro:</label>
                    <select class="form-control" name="idCentro" id="idCentro">
                        <?php foreach ($datos['centro'] as $centro ): ?>
                            <option value="<?php echo $centro->idCentro; ?>"><?php echo $centro->nombreCentro ?></option>
                            <?php endforeach; ?>
                    </select>

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="idPersona">Madrina:</label><br>
                    <select class="form-control" name="idPersona" id="idPersona">
                        <?php
                            foreach ($datos['madrinas'] as $madrina ): ?>
                                <option value="<?php echo $madrina->idPersona; ?>"><?php echo $madrina->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                
                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaAbonoMadrina">Fecha de abono de Madrina:</label>
                    <input class="form-control" type="date" id="fechaAbonoMadrina" name="fechaAbonoMadrina" >

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="idAlumno">Alumno:</label><br>
                    <select class="form-control" name="idAlumno" id="idAlumno">
                        <?php foreach ($datos['alumnos'] as $alumno ): ?>
                            <option value="<?php echo $alumno->idAlumno; ?>"><?php echo $alumno->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12 mb-3">

                    <label class="form-label" for="fechaAlumno">Fecha de Beca del Alumno:</label>
                    <input class="form-control" type="date" id="fechaAlumno" name="fechaAlumno">

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

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>