<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

 <!-- ======= Cursos Section ======= -->
 <section id="cursos" class="portfolio">
      <div class="container">

        <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded border-0 p-5 " >

          <div class="section-title pb-0" data-aos="fade-up">
            <h2 id="h2">CURSOS</h2>
          </div>
          <div class="d-flex justify-content-center col-12">
            <hr class="hr-title">
            </div>
  
          <div class="row">
            
            <div class="col-lg-12" data-aos="fade-left">
              <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
              
                De los programas de cooperación que la Fundación Sarabastall ha puesto en marcha y está desarrollando en el Valle de Hushé,
                tal vez el más importante y uno de los que más nos satisface, es el programa de becas, destinado a que los niños/as puedan completar 
                sus estudios elementales y secundarios, de tal forma que tengan una mayor preparación para la vida, y que en el futuro los mejor 
                preparados puedan continuar sus estudios universitarios, y todos se conviertan en motor de desarrollo de su sociedad.
              
              </div>
            </div>
          </div>
          </div>

        

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <a href="<?php echo RUTA_URL ?>/curso/verCurso" id="maestros" onClick="formacion(this)" title="More Details">
              <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/Formacion-maestros.jpg" class="img-fluid" id="icono" alt="">
              <div class="portfolio-info">
                <h4>MAESTROS</h4>
              </div>
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <a href="<?php echo RUTA_URL?>/curso/verCurso" id="sanitarios" onClick="formacion(this)" title="More Details">
              <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/Formacion-sanitarios.jpg" class="img-fluid" id="icono" alt="">
              <div class="portfolio-info">
                <h4>SANITARIOS</h4>
              </div>
              </a>
            </div>
          </div>
     
        </div>

      </div>
    </section><!-- End cursos Section -->

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>