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
                                            echo $datos['personas'];
                                            foreach ($datos['tipoPersona'] as $tipo ): ?>
                                            <li><a class="dropdown-item" href="#" id="<?php echo $tipo -> idTipo?>" onclick="filtrar(this, 'idTipo')"><?php echo $tipo -> nombre?></a></li>
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
        <h2 class="card-header"> Ver Personas</h2>
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
    <button class="btn btn-secondary" style="width:30%; float:right; margin-right:12.6%" ><a href="<?php echo RUTA_URL ?>/admin" class="text-white">Volver</a></button>




</div>   <br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- MODAL HTML -->
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

        </div><!-- Fin modal-contenido -->$datos['personas']
    </div><!-- Fin modal-container -->

    

    <script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del array de php        
        let arrayPHP = <?php echo json_encode($datos['personas']);?>;
        let arrayJS = arrayPHP.slice();
        // console.log(arrayJS);

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

        /* Colocamos los atributos por los que se ordenar?? */
        let ordenar = [
            "nombre_persona",
            "apellidos",
            "fechaNacimiento"
        ]

        /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "admin", /* controlador */
            "eliminarPersona", /* funci??n borrar */
            "editarPersona", /* funci??n editar */
            "idPersona", /* idUser */
        ];


        /* A??adir funciones de los botones aqu?? */
        let extras = [];

        // console.log(atributos.length);
        // console.log(atributos[0]);


        


        </script>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
