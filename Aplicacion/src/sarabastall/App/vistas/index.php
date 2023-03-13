<?php require_once RUTA_APP.'/vistas/inc/header.php'?>




  <!-- ======= Inicio section ======= -->
 
  <main id="main">

    <section id="inicio">
      <div class="container">
        <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded border-0 p-5 " >

        <div class="section-title pb-0" data-aos="fade-up">
          <h2 id="h2">Inicio</h2>
        </div>
        <div class="d-flex justify-content-center col-12">
          <hr class="hr-title">
          </div>

        <div class="row">
          
          <div class="col-lg-12" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
            <p id="p">
              Somos una pequeña ONG española, que nace y trabaja en la provincia de Zaragoza, en Caspe y su Comarca, y desarrollamos proyectos de cooperación en Asia.
              Nuestros orígenes se remontan al año 1983, cuando un grupo de jóvenes empezamos a realizar campamentos de verano para niños y niñas de la zona, en el Pirineo aragonés. Pronto se ampliaron los proyectos y, además de los campamentos, comenzamos a realizar actividades medioambientales, solidarias y culturales, convirtiendo a la Asociación Sarabastall en un referente de participación social y voluntariado.
              Fruto de la evolución, y cuando nuestros proyectos de cooperación comienzan a crecer, con el ánimo de mejorar el funcionamiento, Sarabastall se organiza en dos entidades:
            </p>
            </div>
          </div>
        

        </div>
          
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded border-0 p-1"><a class="tarjetas" href="<?php echo RUTA_URL ?>/beca">
              <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/beca.png" style="width: 90px;" class="card-img-top m-auto" id="icono" alt="">
              <br>
              <div class="card-body">
                <h5 class="card-title">Becas</h5>
                <div class="d-flex justify-content-center col-12">
                <hr class="hr-card">
                </div>
                <p class="card-text"  id="p">Destinado a que los niños/as puedan completar sus estudios elementales y secundarios, de tal forma que tengan una mayor preparación para la vida, y que en el futuro los mejor preparados puedan continuar sus estudios universitarios, y todos se conviertan en motor de desarrollo de su sociedad.</p>
              </div>
              
            </a></div>
          </div>
          <div class="col">
            <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded border-0 p-1"><a class="tarjetas"  href="<?php echo RUTA_URL ?>/microcredito">
              <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/credito.png" style="width: 90px;" class="card-img-top m-auto"id="icono" alt="">
              <div class="card-body">
                <h5 class="card-title">Microcreditos</h5>
                <div class="d-flex justify-content-center col-12">
                  <hr class="hr-card">
                  </div>
                <p class="card-text"  id="p"> El proyecto se plantea, seguir instalando algún invernadero más, y especialmente formar a los hombres y mujeres en su atención y utilización y a través de microcréditos favorecer que más familias puedan hacer uso de esta nueva herramienta.</>
              </div>
              
            </a></div>
          </div>
          <div class="col">
            <div class="card h-100 text-center shadow-lg p-3 mb-5 bg-body rounded border-0 p-1"><a class="tarjetas"  href="<?php echo RUTA_URL ?>/curso">
              <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/formacion.png" style="width: 90px;" class="card-img-top m-auto" id="icono" alt="...">
              <div class="card-body">
                <h5 class="card-title">Formación</h5>
                <div class="d-flex justify-content-center col-12">
                  <hr class="hr-card">
                  </div>
                <p class="card-text"  id="p">El proyecto de formación a maestros se plantea tras el estudio y valoración de las escuelas del valle, y del análisis del nivel de formación de sus profesionales. Uno se los objetivos prioritarios de los proyectos de la Fundación Sarabastall en Pakistán, siempre ha estado ligado con la mejora de la sanidad, la higiene y la calidad de vida en la zona.</>
              </div>
              
            </a></div>
          </div>
        </div>
        

    </section><!-- End inicio Section -->

    

    
  
<!--    

    ======= Contact Section ======= 
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga eum quidem</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form" data-aos="fade-left">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>

  </main>  -->


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

