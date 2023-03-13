<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" onclick="paginar(this)">Anterior</a>
            </li>

            <li class="page-item disabled"><a class="page-link" href="#" onclick="paginar(this)">1</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">2</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">3</a></li>

            <li class="page-item">
                <a class="page-link" href="#" onclick="paginar(this)">Siguiente</a>
            </li>
            
        </ul>
    </nav>

    <div class="d-flex justify-content-center">

    </div>


    <!-- Collapse -->
    <div class="d-flex justify-content-center">
        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="advanced">
            Buscar por filtros <i class="fa fa-angle-down"></i>
        </a>
    </div>
        <div class=" container-fluid collapse" id="collapseExample">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card p-3  py-4">

                    <h5>Filtrar resultados</h5>

                        <div class="row g-3 mt-2">
                            
                            <!-- Buscador -->
                            <div class="col-sm-12 col-lg-10">
                                <input type="text" class="form-control" onkeyup="buscador()" id="buscador" placeholder="Escribe la palabra que deseas buscar en la lista">   
                            </div>

                            <div class="col-lg-2 text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Filtrar por Rol
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <!-- Filtro -->
                                        <?php
                                            foreach ($datos['tipoPersona'] as $tipo ): ?>
                                            <li>
                                                <a class="dropdown-item" href="#" id="<?php echo $tipo -> idTipo?>" onclick="filtrar(this, 'idTipo')"><?php echo $tipo -> nombre?></a>
                                            </li>
                                        <?php endforeach; ?>
                                            <li><a class="dropdown-item" href="#" id="todos" onclick="filtrar(this)">Todos</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="col-lg-1">
                                <button class="btn btn-primary d-block" onclick="buscador()">Buscar</button>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

    <div class=" container card bg-light mt-2 card-center m-auto" >
        <h2 class="card-header">Personas</h2>
        <div class="table-responsive">
            <table class="table table-hover"> 
                <thead>
                    <tr>
                        <th scope="col">Nombre <i id="nombre" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">Apellidos <i id="apellidos" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">DNI</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha de nacimiento <i id="fechaNacimiento" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">Curso actual</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
            </table>
            
        </div>
    

    </div>  
    <br>
    <a href="<?php echo RUTA_URL ?>/admin" class="text-white"><button class="btn btn-secondary backwards_personal">Volver</button></a>


    

</div>   <br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- MODAL ELIMINAR HTML -->
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


    <!-- MODAL EDITAR HTML -->
    <div id="modalEdit" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>


        <div class="modal-header">
            <h2>EDITAR REGISTRO</h2>
        </div>

        <div class="modal-body">
            <form method="post" id="editForm" action="javascript:editarDatos()">
                <div class="row">

                    <input type="hidden" id="idPersona" name="idPersona">

                    <div class="col-12 mb-3">
                        <label class="form-label" for="username">Nombre de Usuario:</label>
                        <input class="form-control" type="text" id="username" name="username">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label" for="dni">DNI:</label>
                        <input class="form-control" type="text" id="dni" name="DNI">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label" for="nombre">Nombre:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="apellidos">Apellidos:</label>
                        <input class="form-control" type="text" id="apellidos" name="apellidos">
                    </div>
                    <div class="col-12 mb-3">

                        <label class="form-label" for="telefono">Teléfono:</label>
                        <input class="form-control" type="text" id="telefono" name="telefono">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label" for="correo">Correo:</label>
                        <input class="form-control" type="email" id="correo" name="correo">
                    </div>
                    <div class="col-12 mb-3">

                        <label class="form-label" for="fecha">Fecha de Nacimiento:</label>
                        <input class="form-control" type="date" id="fecha" name="fechaNacimiento">
                    </div>
                    <div  class="col-12 mb-3">
                        <label class="form-label" for="curso">Curso:</label>
                       
                        <select class="form-control" id="curso" name="cursoActual">
                            <?php foreach ($datos['cursos'] as $curso): ?>
                                <option value="<?php echo $curso->idCurso;?>"><?php echo $curso->nombreCurso; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
                        <button type="submit" id="buttonEditar" class="btn btn-outline-warning" onclick="closeModal()">Enviar</button>
                        <!-- <a id="modalEdit" href="">
                        <input class="btn btn-primary w-100"  type="submit" value="Editar">
                        </a> -->
                    </div>
            </div>
            </form>

            </div>
        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->
    

    <!-- CONFIGURACIÓN JAVASCRIPT -->
    <script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del array de php        
        let arrayPHP = <?php echo json_encode($datos['personas']);?>;
        let arrayJS = arrayPHP.slice();
        let tableName = "Personas";
        // console.log(arrayPHP);

        /* Colocamos los atributos de la tabla */ 
        let atributos = [
            "nombre_persona", 
            "apellidos",
            "DNI",
            "telefono",
            "correo",
            "fechaNacimiento",
            "cursoActual",
            "idPersona", /* Clave siempre al final */
        ];

        /* Colocamos los atributos por los que se ordenará */
        let ordenar = [
            "nombre_persona",
            "apellidos",
            "fechaNacimiento"
        ]

        /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "admin", /* controlador */
            "eliminarPersona", /* función borrar */
            "editarPersona", /* función editar */
            "idPersona", /* idUser */
        ];


        /* Añadir funciones de los botones aquí */
        let extras = [];

        /* Funciones del Fetch */
        let arrayfetch = [
            "fetchVerDatos",
            "fetchEditarDatos",
        ];

        let formData =[
            "nombre", 
            "apellidos",
            "DNI",
            "telefono",
            "correo",
            "fechaNacimiento",
            "cursoActual",
            "idPersona",
        ];

        </script>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
