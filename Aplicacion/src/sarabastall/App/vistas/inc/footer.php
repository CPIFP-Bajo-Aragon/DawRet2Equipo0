 <!-- ======= Footer ======= -->


 <br><br>

  <div class="modal fade" id="modalCerrarAccion" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title " id="modalCerrarAccionLabel">
            Configuración de Accesibilidad
          </h5>
            
        </div><br>
        <div class="m-3">
        <form method="POST" action="">
          <select class="form-select" aria-label="Default select example">
            <option value="1">Fuente predeterminada</option>
            <option value="2">Fuente para accesibilidad (dislexia)</option>
          </select><br>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="check" name="check" value="1" onchange="javascript:showContent()">
            <label class="form-check-label" for="exampleCheck1">Habilitar barra de herramientas de accesibilidad</label>
          </div>
          
        </div>
                  
      </div>
    </div>
  </div>
        <footer class="text-center text-lg-start text-muted fixed-bottom " style="background-color:#222222">
            <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2023 Copyright:
                <a class="text-reset fw-bold" target="_blank" href="https://cpifpbajoaragon.com/">
                    Parseritos
                </a>
                <button type="button" 
            data-bs-toggle="modal"
            data-bs-target="#modalCerrarAccion" 
            class="" style="background-color: transparent; border:0;">
            <img src="<?php echo RUTA_URL_STATIC ?>/assets/img/icons8-accesibilidad-2-96.png" alt="" style="width: 32px; ">
        
            </div>
        </footer>


        <!-- JAVASCRIPT -->
        <script src="<?php echo RUTA_URL_STATIC?>/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Vendor JS Files -->
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/vendor/aos/aos.js"></script>
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/vendor/php-email-form/validate.js"></script>
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="<?php echo RUTA_URL_STATIC ?>/assets/js/main.js"></script>
        <script>
          rolActual = <?php echo json_encode($this->datos['usuarioSesion']->idRol);?>;
          console.log(rolActual);
        </script>

        <script type="text/javascript">
            function showContent() {
                element = document.getElementById("content");
                check = document.getElementById("check");
                if (check.checked) {
                    element.style ="z-index:995";
                    element.style.position = 'fixed';
                    element.style.display = 'flex';
                    element.style = "box-shadow: 0 1rem 3rem rgba(black, 0.175) ";
                  
                    
                }
                else {
                    element.style.display='none';
                }
            }
        </script>
    </body>
</html>