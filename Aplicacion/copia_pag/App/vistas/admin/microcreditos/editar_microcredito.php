<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-10 mx-auto">
        <br><br><br>

        <?php foreach($datos['microcreditos'] as $microcredito ):  ?> 


        <form method="post" id="idFormulario">
            <label class="form-label" for="importe">Importe:</label><br>
                <input class="form-control" type="text" id="importe" name="importe"  value="<?php echo $microcredito->importe;?>"><br>
            <label class="form-label" for="estado">Estado:</label><br>
                <input class="form-control" type="text" id="estado" name="estado"  value="<?php echo $microcredito->estado;?>"><br>
            <label class="form-label" for="titulo">Título:</label><br>
                <input class="form-control" type="text" id="titulo" name="titulo"  value="<?php echo $microcredito->titulo;?>"><br>
            <label class="form-label" for="fechaPrestamo">Fecha de prestamo:</label>
                <input class="form-control" type="date" id="fechaPrestamo" name="fechaPrestamo"  value="<?php echo $microcredito->fechaPrestamo;?>"><br>
            <label class="form-label" for="idPersona">Persona:</label>
                <select class="form-control" type="text" id="idPersona" name="idPersona"><br>
                    <?php foreach ($datos['personas'] as $persona): ?>
                        <option value="<?php echo $persona->idPersona;?>"><?php echo $persona->nombre; ?></option>
                    <?php endforeach;?>
                </select><br>
            <label class="form-label" for="idTipo">Tipo de prestamo:</label>
                <select class="form-control" type="text" id="idTipo" name="idTipo"><br>
                    <?php foreach ($datos['tipoprestamo'] as $tipo): ?>
                        <option value="<?php echo $tipo->idTipo;?>"><?php echo $tipo->nombre; ?></option>
                    <?php endforeach;?>
                </select><br>
            <label class="form-label" for="movimiento">Movimiento:</label><br>
                <select class="form-control" type="text" id="movimiento" name="movimiento"><br>
                    <?php foreach ($datos['movimientos'] as $mov): ?>
                        <option value="<?php echo $mov->idTipo;?>"><?php echo $mov->nombre; ?></option>
                    <?php endforeach;?>
                </select><br>
            <button class="btn btn-secondary" style="width:49%"> <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
            <input class="btn btn-primary" style=" width:49%" type="submit" value="Añadir"><br><br><br><br>
        </form>

        <?php endforeach; ?>

    </div>



</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>