<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<?php 
    $estadoFormulario = "";
    if($datos['microcreditos'][0]->idEstado == 3){         // Si la asesoria esta cerrada, desactivo el formulario
        $estadoFormulario = "disabled";         
    }

    // print_r($datos['microcreditos'][0]->idEstado);
    
?>


<div class="container">
    <div class="col-12 mx-auto">
        <br><br><br>

        <div class="row">

                
            <div class="card mb-5 col-md-7">

                <div class="card-body">

                    <?php foreach($datos['microcreditos'] as $microcredito ):  ?>

                    <form method="post" id="idFormulario" onsubmit="return Validar(this, 'importe', 'titulo', 'fechaFin')">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="importe">Importe:</label>
                                <input <?php echo $estadoFormulario ?>  class="form-control" type="text" id="importe" name="importe"  value="<?php echo $microcredito->importe;?>">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="titulo">Título:</label>
                                <input <?php echo $estadoFormulario ?> class="form-control" type="text" id="titulo" name="titulo"  value="<?php echo $microcredito->titulo;?>">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="fechaFin">Fecha de Vencimiento:</label>
                                <input <?php echo $estadoFormulario ?> class="form-control" type="date" id="fechaFin" name="fechaFin"  value="<?php echo $microcredito->fechaFin;?>">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="idPersona">Persona:</label>
                                <select <?php echo $estadoFormulario ?>  class="form-control" type="text" id="idPersona" name="idPersona">
                                    <?php foreach ($datos['personas'] as $persona): ?>
                                        <option value="<?php echo $persona->idPersona;?>"><?php echo $persona->nombre; ?></option>
                                    <?php endforeach;?>     
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <button class="btn btn-secondary w-100" > <a href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
                            </div>
                            <div class="col-6 mb-5">
                                <input <?php echo $estadoFormulario ?> class="btn btn-primary w-100" type="submit" value="Editar" onclick="return validarFormulario();">
                            </div>
                        </div>
                    </form>

                    <?php //endforeach; ?>
                </div>

                <?php if($microcredito->idEstado != 3): ?>
                <button type="button" 
                    onclick="valida_cerrar(<?php echo $microcredito->idPrestamo ?>)" 
                    data-bs-toggle="modal" data-bs-target="#modalCerrarAccion" 
                    class="w-100 btn btn-warning btn-lg mb-3">
                    Cerrar Microcredito
                </button>
            <?php endif ?>

            </div>

            
            <div class="mb-5 ms-5  col-md-4">

            

                <?php //if($datos['microcreditos']->idEstado != 3): ?>
                    <form method="post" action="<?php echo RUTA_URL ?>/microcredito/anadir_movimiento">
                        <input type="hidden" name="idPrestamo" id="idPrestamo" value="<?php echo $microcredito->idPrestamo ?>">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label class="form-label" for="accion">Acción</label>
                                <input  <?php echo $estadoFormulario ?> class="form-control" type="text" name="accion" id="accion">
                            </div>
                            <div class="mb-4 col-12">
                                <label class="form-label" for="cantidad">Cantidad</label>
                                <input  <?php echo $estadoFormulario ?> class="form-control" type="text" name="cantidad" id="cantidad" placeholder="€">
                            </div>
                            
                            <div class="mb-3 col-12">
                                <button  <?php echo $estadoFormulario ?> type="submit" class="w-100 btn btn-success btn-lg">Añadir</button>
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

</div>

<div class="modal fade" id="modalCerrarAccion" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCerrarAccionLabel">
                    ¿Estás seguro que quieres cerrar el microcredito?
                </h5>
            </div>
            <div class="modal-footer">
                <form method="post" id="formCerrarAccion" class="col-12" action="<?php echo RUTA_URL ?>/microcredito/cerrarmicrocredito">
                    <input class="form-control" type="text" id="idPrestamo" name="idPrestamo" value="<?php echo $datos['microcreditos'][0]->idPrestamo?>">
                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-secondary col-12" 
                                data-bs-dismiss="modal">Cancelar
                            </button>
                        </div>
                        <div class="col-8">
                            <input type="submit" class="btn btn-warning" value="Cerrar Microcredito">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function valida_cerrar(idPrestamo) {
        document.getElementById("idPrestamo").value = idPrestamo
    }
</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>