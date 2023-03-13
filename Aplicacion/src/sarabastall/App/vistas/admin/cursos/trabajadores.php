<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<br><br>

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
        <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="advanced">
            Buscar por filtros <i class="fa fa-angle-down"></i>
        </a>
    </div>
        <div class=" container-fluid collapse" id="collapseExample">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card p-3  py-4">

                    <h5>Filtrar resultados</h5>
                    <?php //print_r($datos['alumnos']);?>
                        <div class="row g-3 mt-2">
                            

                            <!-- Buscador -->
                            <div class="col-sm-12 col-lg-10">
                                <input type="text" class="form-control" onkeyup="buscador()" id="buscador" placeholder="Escribe la palabra que deseas buscar en la lista">   
                            </div>

                            <div class="col-lg-2 text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Filtrar por Nota
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <!-- Filtro -->
                                        <?php
                                            foreach ($datos['trabajadores'] as $nota ): ?> 
                                            <li><a class="dropdown-item" href="#" id="<?php echo $nota -> notaFinal?>" onclick="filtrar(this, 'notaFinal')"><?php echo $nota -> notaFinal?></a></li>
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

    <div class="card bg-light mt-2 w-75 card-center m-auto" >
        <h2 class="card-header"> Trabajadores</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre <i id="nombreCurso" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">Nota Final <i id="fechaInicio" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
            
        </div>
    

    </div>  
    <br>
    <a href="<?php echo RUTA_URL ?>/curso/verCurso" class="text-white"><button class="btn btn-secondary backwards_button">Volver</button></a>

    <div id="modalEdit" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>


        <div class="modal-header">
            <h2>EDITAR REGISTRO</h2>
        </div>

        <div class="modal-body">
            <form method="post" id="editForm" action="javascript:editarDatos()">
                <div class="row">

                    <input type="hidden" id="idTrabajador" name="idTrabajador">

                    <div class="col-12 mb-3">
                        <label class="form-label" for="notaFinal">Nota Final:</label>
                        <input class="form-control" type="text" id="notaFinal" name="notaFinal">
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

</div>   <br><br><br><br><br><br><br><br><br><br><br><br>
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

    <script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del array de php
        let arrayPHP = <?php echo json_encode($datos['trabajadores']);?>;
        let arrayJS = arrayPHP.slice();
        let tableName = "Trabajadores";
        console.log(arrayJS);
       
        /* Colocamos los atributos de la tabla */ 
        let atributos = [
            "nombre_persona",
            "notaFinal",
            "idTrabajador" /* Clave siempre al final */
        ];

          /* Colocamos los atributos por los que se ordenará */
        let ordenar = [
            "nombreCurso",
            "fechaInicio",
            "fechaFin",
            "nombre",
            "nombre_profesor"
        ]

          /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "curso", /* controlador */
            "eliminarTrabajador", /* función borrar */
            "editarCurso", /* función editar */
            "idTrabajador", /* idUser */
            "generarDiploma",
            "idCurso"
        ]

        /* Añadir funciones de los botones aquí */
        let extras = [];

          // console.log(atributos.length);
          // console.log(atributos[0]);

        /* Funciones del Fetch */
        let arrayfetch = [
            "fetchVerDatos",
            "fetchEditarDatos",
        ];

        let formData =[
            "notaFinal", 
            "idTrabajador",
        ];
        </script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
