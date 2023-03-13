<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">

    <div class="col-10 mx-auto"> 
        <br><br><br>
 

        <form method="post" id="idFormulario" onsubmit="return validarFormulario()">
            <label class="form-label" for="idUsuario">Usuario:</label><br>
            <input class="form-control" type="text" id="idUsuario" name="idUsuario"><br>
            <label class="form-label" for="idPass">Contraseña:</label><br>
            <input class="form-control" type="password" id="idPass" name="idPass"><br>
            <label class="form-label" for="idDni">DNI:</label><br>
            <input class="form-control" type="text" id="idDni" name="idDni" onblur="comprobarDNI(this)"><br>
            <label class="form-label" for="idNombre">Nombre:</label><br>
            <input class="form-control" type="text" id="idNombre" name="idNombre" onblur="comprobarNombre(this)" required><br>
            <label class="form-label" for="idApellidos">Apellidos:</label><br>
            <input class="form-control" type="text" id="idApellidos" name="idApellidos" required><br>
            <label class="form-label" for="idTelefono">Telefono:</label><br>
            <input class="form-control" type="text" id="idTelefono" name="idTelefono" onblur="comprobarTelefono(this)"><br>
            <label class="form-label" for="idCorreo">Correo:</label><br>
            <input class="form-control" type="text" id="idCorreo" name="idCorreo" onblur="comprobarCorreo(this)"><br>
            <label class="form-label" for="idFecha">Fecha de nacimiento:</label><br>
            <input class="form-control" type="date" id="idFecha" name="idFecha" required onblur="comprobarFchaNacimiento()"><br>
            <label class="form-label" for="idTipo">Tipo:</label>
                <select class="form-control" name="idTipo" id="idTipo">
                    <?php
                    foreach ($datos['tipoPersona'] as $tipo ): ?>
                        <option value="<?php echo $tipo->idTipo; ?>"><?php echo $tipo->nombre ?></option>
                    <?php endforeach; ?>
                </select><br>
            <label class="form-label" for="idCursoActual">Curso actual:</label><br>
            <select class="form-control" name="idCursoActual" id="idCursoActual">
                    <?php
                    foreach ($datos['cursos'] as $curso ): ?>
                        <option value="<?php echo $curso->idCurso; ?>"><?php echo $curso->nombreCurso ?></option>
                    <?php endforeach; ?>
                </select><br><br>
            <button class="btn btn-secondary" style="width:49%"> <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
            <input class="btn btn-primary" style=" width:49%" type="submit" value="Añadir"><br><br><br><br>
        </form>
    </div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>