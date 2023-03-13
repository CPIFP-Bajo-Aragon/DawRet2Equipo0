<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<br><br>

<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" onclick="paginar(this)">Anterior</a>
            </li>

            <li class="page-item active"><a class="page-link" href="#" onclick="paginar(this)">1</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">2</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">3</a></li>

            <li class="page-item">
            <a class="page-link" href="#" onclick="paginar(this)">Siguiente</a>
            </li>
        </ul>
    </nav>

<div >  

    
    <div class="card bg-light mt-5 w-75 card-center m-auto" >
        <h2 class="card-header"> Microcreditos</h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Importe</th>
                        <th scope="col">Estado </th>
                        <th scope="col">Titulo <i id="titulo" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">Fecha de Prestamo <i id="fechaPrestamo" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">Persona <i id="persona" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
                        <th scope="col">Tipo de prestamo</th>
                        <th scope="col">Movimiento</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
            </table>
            
        </div>
    

    </div>  
    <br>
    <button class="btn btn-secondary" style="width:30%; float:right; margin-right:12.6%"><a href="<?php echo RUTA_URL ?>/admin" class="text-white">Volver</a></button>


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

    <script type="text/javascript">// obtenemos el array de valores mediante la conversion a json del array de php
            let arrayJS = <?php echo json_encode($datos['microcreditos']);?>;
          // console.log(arrayJS);
;          /* Colocamos los atributos de la tabla */ 
            let atributos = [
            "importe",
            "estado",
            "titulo",
            "fechaPrestamo",
            "nombre_persona",
            "nombre_prestamo",
            "nombre_movimiento",
            "idPrestamo"
             /* Clave siempre al final */
        ];

          /* Colocamos los atributos por los que se ordenará */
        let ordenar = [
            "titulo",
            "fechaPrestamo",
            "idPersona"

        ]

          /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "microcredito", /* controlador */
            "eliminarmicrocredito", /* función borrar */
            "editarmicrocredito", /* función editar */
            "idPrestamo", /* idUser */
        ];

        /* Añadir funciones de los botones aquí */
        let extras = [
            "funcionMateriales"
        ];

          // console.log(atributos.length);
          // console.log(atributos[0]);

        </script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
