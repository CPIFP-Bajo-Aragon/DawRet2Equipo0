<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">

    <div class="col-10 mx-auto">
        <br><br><br>

        <?php foreach($datos['personas'] as $usu ):  ?>

        <form method="post" id="idFormulario" >

            <label class="form-label" for="username">Nombre de Usuario:</label><br>
            <input class="form-control" type="text" id="username" name="username" value="<?php echo $usu->username ?>"><br>

            <label class="form-label" for="dni">DNI:</label><br>
            <input class="form-control" type="text" id="dni" name="dni" value="<?php echo $usu->DNI ?>"><br>

            <label class="form-label" for="nombre">Nombre:</label><br>
            <input class="form-control" type="text" id="nombre" name="nombre"  value="<?php echo $usu->nombre ?>"><br>
            
            <label class="form-label" for="apellidos">Apellidos:</label><br>
            <input class="form-control" type="text" id="apellidos" name="apellidos"  value="<?php echo $usu->apellidos ?>"><br>

            <label class="form-label" for="telefono">Teléfono:</label><br>
            <input class="form-control" type="text" id="telefono" name="telefono"  value="<?php echo $usu->telefono ?>"><br>

            <label class="form-label" for="correo">Correo:</label><br>
            <input class="form-control" type="date" id="correo" name="correo" value="<?php echo $usu->correo ?>" ><br>
            
            <label class="form-label" for="fecha">Fecha de Nacimiento:</label><br>
            <input class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $usu->fechaNacimiento ?>"><br>
            
            <label class="form-label" for="curso">Curso:</label><br>
            <input class="form-control" type="text" id="curso" name="curso" value="<?php echo $usu->cursoActual ?>"><br><br>
            
            <button class="btn btn-secondary" style="width:49%"> <a style="color: #ffffff" href="<?php echo RUTA_URL ?>/admin">Volver</a></button>
            <input class="btn btn-primary" style=" width:49%" type="submit" value="Editar"><br><br><br><br>
        </form>
        <?php endforeach ?> 
    </div>

</div>
<!-- <?php

if($_SERVER['REQUEST_METHOD'] == "post"){

    if(empty($_POST['username']) || $_POST['username'] = ""){
        $username_error = "Please enter the username";
    }

}

?>


<script>

function comprobarNombre(name){
        var n = name.value;
        var regName = /^[a-z]+$/;
        if (!regName.test(n)) {
            name.style = "border: 1px solid red;";
            return false;
        } else {
            name.style = "border: 1px solid #036737";
            return true;
        }
    }

    function comprobarDNI(niff){
        var nif = niff.value;
        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

        if (!(/^\d{8}[A-Z]$/.test(nif))) {
            niff.style = "border:1px solid red";
            alert("Introduce un DNI válido");
            return false;
        }

        if (nif.charAt(8) == letras[(nif.substring(0, 8)) % 23]) {
            niff.style = "border:1px solid green";
            return true;
        }
    }

    function comprobarTelefono(telefono){
        var t = telefono.value;
        if (!(/^\d{9}$/.test(t))) {
            telefono.style = "border: 1px solid red";
            alert("Introduce un teléfono válido");
            return false;
        } else {
            telefono.style = "border: 1px solid green";
            return true;
        }
    }

    function comprobarCorreo(correo){
        var c = correo.value;
        if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(c))) {
            correo.style = "border: 1px solid red";
            return false;
        } else {
            correo.style = "border: 1px solid green";
            return true;
        }
    }

    function comprobarFchaNacimiento(){
        var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[1-9]|2[1-9])$/;
        var testDate = "03/17/21"
        if (date_regex.test(testDate)) {
            return true;
        } else {
            return false;
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var aVerSiFunciona = document.getElementById("idFormulario")
        if (aVerSiFunciona != null) {
            aVerSiFunciona.addEventListener('submit', validarFormulario());
        }
    });


    function validarFormulario(){
        document.getElementById()
        
        var dni = document.getElementById('idDni');
        var n = comprobarDNI(dni);
        var name = document.getElementById('idNombre');
        var nbr = comprobarNombre(name);
        var correo = document.getElementById('idCorreo');
        var c = comprobarCorreo(correo);
        var telefono = document.getElementById('idTelefono');
        var t = comprobarTelefono(telefono);
        if (n && nbr && c && t) {
            this.submit();
        }
    }

</script> -->


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
