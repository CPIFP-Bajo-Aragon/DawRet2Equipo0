<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<section id="gestion">

    <div class="container">
        <div class="col-12">
            <h1 class="col-3">Personal</h1>
            <a class="text-white" href="<?php echo RUTA_URL?>/admin/verPersona"><button class="btn btn-dark mx-1 col-3">Ver</button></a>
            <a  class="text-white" href="<?php echo RUTA_URL?>/admin/anadirPersona"><button class="btn btn-dark mx-1 col-3">Añadir</button></a>
        </div>
        <br><br>
        <div class="col-12">
                <h1 class="col-6">Cursos</h1>
                <a class="text-white" href="<?php echo RUTA_URL?>/curso/verCurso"><button class="btn btn-dark mx-1 col-3">Ver</button></a>
                <a  class="text-white" href="<?php echo RUTA_URL?>/curso/anadirCurso"><button class="btn btn-dark mx-1 col-3">Añadir</button></a>
        </div>
        <br><br> 
        <div class="col-12">
            <h1 class="col-3">Becas</h1>
            <a class="text-white" href="<?php echo RUTA_URL?>/beca/verBeca"><button class="btn btn-dark mx-1 col-3">Ver</button></a>
            <a  class="text-white" href="<?php echo RUTA_URL?>/beca/anadirBeca"><button class="btn btn-dark mx-1 col-3">Añadir</button></a>
        </div>
        <br><br> 
        <div class="col-12">
            <h1 class="col-3">Microréditos</h1>
            <a class="text-white" href="<?php echo RUTA_URL?>/microcredito/verMicrocredito"><button class="btn btn-dark mx-1 col-3">Ver</button></a>
            <a  class="text-white" href="<?php echo RUTA_URL?>/microcredito/anadirMicrocredito"><button class="btn btn-dark mx-1 col-3">Añadir</button></a>
        </div>
        <br><br> 
        <div class="col-12">
            <h1 class="col-3">Alumnos</h1>
            <a class="text-white" href="<?php echo RUTA_URL?>/alumno/listaAlumno"><button class="btn btn-dark mx-1 col-3">Ver</button></a>
            <a  class="text-white" href="<?php echo RUTA_URL?>/alumno/anadirAlumno"><button class="btn btn-dark mx-1 col-3">Añadir</button></a>
        </div>
        
    </div>
    <br><br><br>


</section>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>