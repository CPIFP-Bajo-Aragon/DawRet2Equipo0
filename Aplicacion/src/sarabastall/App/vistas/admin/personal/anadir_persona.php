<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">

    <div class="col-10 mx-auto mt-5 "> 
    


        <form method="post" id="idFormulario" onsubmit="return Validar(this, 'idUsuario', 'idPass', 'idDni', 'idApellidos', 'idTelefono', 'idCorreo', 'idFecha')">
            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label" for="idUsuario">Usuario:</label>
                    <input class="form-control" type="text" id="idUsuario" name="idUsuario">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="idPass">Contraseña:</label>
                    <input class="form-control" type="password" id="idPass" name="idPass">
                </div>      
                <div class="col-12 mb-3">
                    <label class="form-label" for="idDni">DNI:</label>
                    <input class="form-control" type="text" id="idDni" name="idDni" >
                </div>
                <div class="col-12 mb-3">           
                    <label class="form-label" for="idNombre">Nombre:</label>
                    <input class="form-control" type="text" id="idNombre" name="idNombre">
                </div>
                <div class="col-12 mb-3">       
                    <label class="form-label" for="idApellidos">Apellidos:</label>
                    <input class="form-control" type="text" id="idApellidos" name="idApellidos">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="idTelefono">Telefono:</label>
                    <input class="form-control" type="text" id="idTelefono" name="idTelefono">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="idCorreo">Correo:</label>
                    <input class="form-control" type="text" id="idCorreo" name="idCorreo">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="idFecha">Fecha de nacimiento:</label>
                    <input class="form-control" type="date" id="idFecha" name="idFecha">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="idTipo">Tipo:</label>
                    <select class="form-control" name="idTipo" id="idTipo" onchange="create_input(this)">
                        <?php foreach ($datos['tipoPersona'] as $tipo ): ?>
                            <option value="<?php echo $tipo->idTipo; ?>"><?php echo $tipo->nombre ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="containerCurso" class="col-12 mb-4">

                </div>
                
                <div class="col-12 mb-5 d-flex justify-content-center" >
                    <input class="btn btn-primary backwadd" type="submit" value="Añadir" onclick="return validarFormulario();">
                </div>
            </div>
        </form>
        
            <div class="col-12 mb-5 d-flex justify-content-center">
            
            </div>
            
            <div class="col-12">
               
               <div class="col-12 mb-5 d-flex justify-content-center" >
               <a href="<?php echo RUTA_URL ?>/admin"><button class="btn btn-secondary backwadd">Volver</button></a>
               </div>
           </div>
    </div>

</div>

<!-- 
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

<script type="text/javascript">

    numCursos =  <?php echo json_encode($datos['cursos']);?>;
    // console.log(numCursos);
    // alert("hola");
</script>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>