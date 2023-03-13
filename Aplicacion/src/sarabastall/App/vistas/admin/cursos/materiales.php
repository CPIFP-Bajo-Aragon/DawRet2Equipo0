<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
<div class="col-10 mx-auto">
    <br><br><br>
    <h1></h1>
    <?php if (!empty($this->datos['materialesCurso'])):?>
    <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Archivo</th>
                        <?php $this->datos['rolesPermitidos'] = [100, 200]; 
                        if (tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])):?>
                        <th>Acciones</th>
                        <?php endif?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['materialesCurso'] as $m):?>
                    <tr>
                        <td><?php echo $m->nombre;?></td>
                        <td><a href="<?php echo RUTA_URL?>/public/assets/img/clients/<?php echo $m->archivo;?>" download="<?php echo $m->archivo;?>"><?php echo $m->archivo;?></a></td>
                        <?php $this->datos['rolesPermitidos'] = [100, 200]; 
                        if (tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])):?>
                        <td><button name="<?php echo $m->idMaterial?>" type="button" class="btn btn-primary delete" onclick="openModal(this)"><i class="fa-solid fa-trash-can"></i></button></td>
                        <?php endif?> 
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
    <?php endif;?>
    <?php if (empty($this->datos['materialesCurso'])){
        echo "No hay archivos dispoibles para este curso.";
        }
    ?>
    </div><br><br><br>

    <?php $this->datos['rolesPermitidos'] = [100, 200];
    if (tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])):?>
    <form method="post" id="idFormulario" enctype="multipart/form-data">

        <div class="row">
            <div class="col-12 mb-3">
                <label for="nombreMaterial">Nombre:</label><br>
                <input type="text" name="nombreMaterial" id="nombreMaterial">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="fileToUpload">Archivo:</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
            <div class="col-6">
                <button class="btn btn-secondary w-100 "> <a href="<?php echo RUTA_URL ?>/curso/verCurso">Volver</a></button>
            </div>
            <div class="col-6">
                <input class="btn btn-primary w-100" type="submit" value="Añadir"><br><br><br><br>
            </div>
        </div>
    </form>
    <?php endif;?>
    
</div>

</div>

<div id="modal1" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
    

        <div class="modal-header">
            <h2>ELIMINAR REGISTRO</h2>
        </div>

        <div class="modal-body">
            Esta seguro de Eliminar este registro?
        </div>

        <div class="modal-footer">
            <button class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
            <a id="modalBorrar" href="">
            <button class="btn btn-outline-danger">Eliminar</button>
            </a>
        </div>

        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->

    <div id="modalEdit" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
    

        <div class="modal-header">
            <h2>EDITAR REGISTRO</h2>
        </div>

        <div class="modal-body">
            <form method="post" id="idFormulario" >
                <div class="row">
                
                    <div class="col-12 mb-3">
                        <label class="form-label" for="nombreMaterial">Nombre:</label>
                        <input class="form-control" type="text" id="nombreMaterial" name="nombreMaterial">
                    </div>
            </div>
            </form>

            <div class="modal-footer">
                        <button class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
                        <button type="submit" id="buttonEditar" class="btn btn-outline-warning" onclick="closeModal()">Enviar</button>
                        <a id="modalEdit" href="">
                        <input class="btn btn-primary w-100"  type="submit" value="Editar">
                        </a>
                    </div>

        </div>

<br><br><br><br><br><br><br>

<script type="text/javascript">
    let tableName = "Materiales";
          let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "curso", /* controlador */
            "borrarMaterial", /* función borrar */
            "editarMaterial", /* función editar */
            "idMaterial", /* idUser */
        ]
</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>