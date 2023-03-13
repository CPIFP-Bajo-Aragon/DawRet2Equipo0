<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fundación Sarabastall</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Vendor CSS Files -->
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- <link href="<?php echo RUTA_URL_STATIC ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> -->
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 
  
  <!-- Template Main CSS File -->
  <link href="<?php echo RUTA_URL ?>/public/css/estilos.css" rel="stylesheet" type="text/css">
  <link href="<?php echo RUTA_URL_STATIC ?>/assets/css/style.css" rel="stylesheet" type="text/css">
  
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> -->
</head>

<body>

<header id="header" class="d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="<?php echo RUTA_URL?>/inicio"><img src="<?php echo RUTA_URL_STATIC ?>/assets/img/logo-fundacion-sarabastall.png" alt="" class="img-fluid" id="icono"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
        <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo']=="Inicio"):?>
            <a class="nav-link scrollto active" aria-current="page" href="<?php echo RUTA_URL?>/inicio/">Inicio</a>
          <?php else: ?>
            <a class="nav-link scrollto" aria-current="page" href="<?php echo RUTA_URL?>/inicio/">Inicio</a>
          <?php endif?> 
        </li>

        <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo']=="Microcredito"):?>
            <a class="nav-link scrollto active" aria-current="page" href="<?php echo RUTA_URL?>/microcredito/">Microcreditos</a>
          <?php else: ?>
            <a class="nav-link scrollto" aria-current="page" href="<?php echo RUTA_URL?>/microcredito/">Microcreditos</a>
          <?php endif?> 
        </li>

        <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo']=="Beca"):?>
            <a class="nav-link scrollto active" aria-current="page" href="<?php echo RUTA_URL?>/beca/">Becas</a>
          <?php else: ?>
            <a class="nav-link scrollto" aria-current="page" href="<?php echo RUTA_URL?>/beca/">Becas</a>
          <?php endif?> 
        </li>

        <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo']=="Curso"):?>
            <a class="nav-link scrollto active" aria-current="page" href="<?php echo RUTA_URL?>/curso/">Cursos</a>
          <?php else: ?>
            <a class="nav-link scrollto" aria-current="page" href="<?php echo RUTA_URL?>/curso/">Cursos</a>
          <?php endif?> 
        </li>
        <?php if($datos['usuarioSesion']->idRol==100):?>
        <li class="nav-item">
        <?php if (isset($datos['menuActivo']) && $datos['menuActivo']=="Gestion"):?>
            <a class="nav-link scrollto active" aria-current="page" href="<?php echo RUTA_URL?>/admin/">Gestion</a>
          <?php else: ?>
            <a class="nav-link scrollto" aria-current="page" href="<?php echo RUTA_URL?>/admin/">Gestion</a>
          <?php endif?> 
        </li>
        <?php endif?>

          <!-- <li id="li"><a id="a" class="nav-link scrollto" href="<?php //echo RUTA_URL ?>/inicio">Inicio</a></li> -->
          <!-- <li id="li"><a id="a" class="nav-link scrollto" href="<?php //echo RUTA_URL ?>/microcredito">Microcreditos</a></li> -->
          <!-- <li id="li"><a id="a" class="nav-link scrollto" href="<?php //echo RUTA_URL ?>/beca">Becas</a></li> -->
          <!-- <li id="li"><a id="a" class="nav-link scrollto" href="<?php //echo RUTA_URL ?>/curso">Cursos</a></li> -->
          <!-- <li id="li"><a id="a" class="nav-link scrollto" href="<?php //echo RUTA_URL ?>/admin"><span>Gestión</span></a></li> -->
          <li><a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL ?>/login/logout">LogOut</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      
    </div>

  </header><!-- End Header -->
  

  <nav class="navbar w-100 justify-content-center position-fixed bg-light" id="content" style="display:none;">

    <div class="container w-75 d-flex" id="accesibilidad">
      <div class="fontsize col-6 d-flex justify-content-start">
        <ul>
          <li>
            <span  id="p">Tamaño de fuente</span>
          </li>
          <li>
            <button class="btn btn-outline-ligth" onclick="return cambiarTexto('-')" >A-</button>
          </li>
          <li>
            <button class="btn btn-outline-ligth" onclick="return cambiarTexto('+')">A+</button>
          </li>
        </ul>
      </div>
      <div class="sitecolor col-6 d-flex justify-content-end">
        <ul>
          <li>
          <span  id="p">Color del sitio</span>
          </li>
          <li>
            <button class="btn btn-outline-ligth" onclick="return cambiarFondoBlanco()" >R</button>
          </li>
          <li>
            <button class="btn" style="background-color:#000000 ; border: 0; color: #ffff00 ;" onclick="return cambiarFondoNegro()" >A</button>
          </li>
          <li>
            <button  class="btn" style="background-color:#ffffcc ; border: 0; color: #000000;" onclick="return cambiarFondoVainilla()" >A</button>
          </li>
          <li>
            <button  class="btn" style="background-color:#99ccff ; border: 0; color: #000000;" onclick="return cambiarFondoCian()">A</button>
          </li>
        </ul>
      </div>
    </div>
</nav>
<br><br><br><br>

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

<script>

  //Todos los elementos a los que les vamos a cambiar el fontSize
const elementsList = document.getElementsByTagName('html');

function getElementFontSize(element){
  //getComputedStyle nos devuelve las propiedades css de cada párrafo(elemento)
  const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
  return parseFloat(elementFontSize);  //Devolvemos el total de pixeles
}

function cambiarTexto(operador) {
  for(let element of elementsList) {
     //Obtener el total de pixel de cada párrafo.
    const currentSize = getElementFontSize(element);
    
     //Restar o sumar, dependiendo del operador.
    const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
     //Aplicarle al parrafo actual el nuevo tamaño.
    element.style.fontSize = newFontSize
  }
  
}
</script>

<script>

function cambiarFondoBlanco() {
    document.getElementById('icono').style='display: flex';
		document.getElementById('main').style='background-color: #ffffff; color:#555555; border:none;';
    document.getElementById('navbar').style='background-color: #ffffff; color:#555555; border:none;';
    document.getElementById('header').style='background-color: #ffffff; color:#555555; border:none;';
    document.getElementById('accesibilidad').style='background-color: #f8f9fa; color:#555555; border:none;';
    document.getElementById('h2').style='color:#555555';




    
    }

function cambiarFondoNegro() {
    document.getElementById('icono').style='display: none';
		document.getElementById('main').style='background-color:#000000; color:ffff00; border: 1px solid #ffff00';
    document.getElementById('navbar').style='background-color:#000000; color:ffff00; border: 1px solid #ffff00';
    document.getElementById('header').style='background-color:#000000; color:ffff00; border: 1px solid #ffff00';
    document.getElementById('accesibilidad').style='background-color:#000000; color:ffff00; border: 1px solid #ffff00';
    document.getElementById('h2').style='color:#ffff00'; 
    document.getElementById('p').style='color:#ffff00'; 
    




    
    }

function cambiarFondoVainilla() {
		document.getElementById('main').style.backgroundColor='#ffffcc';
    document.getElementById('navbar').style.backgroundColor='#ffffcc';
    document.getElementById('header').style.backgroundColor='#ffffcc';
    document.getElementById('accesibilidad').style.backgroundColor='#ffffcc';
    document.getElementsByTagName('div').style.border='1px solid #000000';
    document.getElementsByTagName('a').style.color='#000000';




    
    }

function cambiarFondoCian() {
		document.getElementById('main').style='background-color: #99ccff; color:#000000; border:1px solid black;';
    document.getElementById('navbar').style='background-color: #99ccff; color:#000000; border:1px solid black;';
    document.getElementById('header').style='background-color: #99ccff; color:#000000; border:1px solid black;';
    document.getElementById('accesibilidad').style='background-color: #99ccff; color:#000000; border:1px solid black;';




    
    }
</script>


</body>
</html>

