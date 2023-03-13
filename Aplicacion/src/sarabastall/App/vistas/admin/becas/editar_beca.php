<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<?php 
    // $estadoFormulario = "";
    // if($datos['becas'][0]->idEstado == 3){         // Si la asesoria esta cerrada, desactivo el formulario
    //     $estadoFormulario = "disabled";         
    // }

    // print_r($datos['microcreditos'][0]->idEstado);
    
?> 

<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br>
        <div class="row">
            <div class="card mb-5 col-md-7">
                <div class="card-body">

                    <?php foreach($datos['becas'] as $beca ):  ?>

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
                                    <input class="form-control" type="text" id="importe" name="importe" value="<?php echo $beca->importe ?>">

                                </div>
                                <div class="col-12 mb-3">

                                    <label class="form-label" for="Obs">Observaciones:</label>
                                    <input class="form-control" type="text" id="Obs" name="Obs" value="<?php echo $beca->Obs ?>">

                                </div>
                                <div class="col-12 mb-3">

                                    <label class="form-label" for="fechaInicio">Fecha de Inicio:</label>
                                    <input class="form-control" type="date" id="fechaInicio" name="fechaInicio"  value="<?php echo $beca->fechaInicio ?>">

                                </div>
                                <div class="col-12 mb-3">
                                        
                                    <label class="form-label" for="fechaFin">Fecha de Fin:</label>
                                    <input class="form-control" type="date" id="fechaFin" name="fechaFin"  value="<?php echo $beca->fechaFin ?>">
                                
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
                                        
                                    <label class="form-label" for="idPersona">Madrina:</label>
                                    <select class="form-control" name="idPersona" id="idPersona">
                                        <?php foreach ($datos['madrinas'] as $madrina ): ?>
                                            <option value="<?php echo $beca->idPersona; ?>"><?php echo $madrina->nombre ?></option>  
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                                <div class="col-12 mb-3">
                                        
                                    <label class="form-label" for="fechaAbonoMadrina">Fecha de abono de Madrina:</label>
                                    <input class="form-control" type="date" id="fechaAbonoMadrina" name="fechaAbonoMadrina" value="<?php echo $beca->fechaAbonoMadrina ?>" >
                                
                                </div>
                                <div class="col-12 mb-3">
                                        
                                    <label class="form-label" for="idAlumno">Alumno:</label>
                                    <select class="form-control" name="idAlumno" id="idAlumno">
                                        <?php foreach ($datos['alumnos'] as $alumno ): ?>
                                            <option value="<?php echo $alumno->idAlumno; ?>"><?php echo $alumno->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                
                                </div>
                                <div class="col-12 mb-3">
                                        
                                    <label class="form-label" for="fechaAlumno">Fecha de Beca del Alumno:</label>
                                    <input class="form-control" type="date" id="fechaAlumno" name="fechaAlumno" value="<?php echo $beca->fechaAlumno ?>">

                                </div>
                                <div class="col-6">

                                <a href="<?php echo RUTA_URL ?>/beca"><button class="btn btn-secondary w-100"> Volver</button></a>

                                </div>
                                <div class="col-6 mb-5">

                                    <input class="btn btn-primary w-100" type="submit" value="Editar" onclick="return validarFormulario();">

                                </div>
                            </div>
                        </form>
                    <?php //endforeach ?>
            </div>

        </div>
        <div class="mb-5 ms-5  col-md-4">

            

                <?php //if($datos['microcreditos']->idEstado != 3): ?>
                    <form method="post" action="<?php echo RUTA_URL ?>/beca/anadir_movimiento">
                        <input type="hidden" name="idBeca" id="idBeca" value="<?php echo $beca->idBeca ?>">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label" for="accion">Acción</label>
                                <input  class="form-control" type="text" name="accion" id="accion">
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label" for="cantidad">Cantidad</label>
                                <input  class="form-control" type="text" name="cantidad" id="cantidad" placeholder="€">
                            </div>
                            
                            <div class="mb-3 col-12">
                                <button  type="submit" class="w-100 btn btn-success btn-lg">Añadir</button>
                            </div>
                        </div>
                    </form>
                <?php endforeach ?>

                <?php foreach($datos["movimientos"] as $movimiento): ?>
                <div class="card mb-3">
                    <div class="card-body">
                    
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-subtitle mb-2"> <?php echo $movimiento->accion ?>  </h5>
                                </div>
                                <div class="col-10">
                                    <h5 class="card-subtitle warning"><?php echo $movimiento->cantidad ?>€ </h5>
                                </div>
                            </div>
                        
                    </div>
                    <div class="card-footer text-end">
                        <span class="card-text"><?php echo formatoFecha($movimiento->fecha) ?></span>
                    </div>
                </div>
            <?php endforeach ?>

            </div>
    </div>

</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>