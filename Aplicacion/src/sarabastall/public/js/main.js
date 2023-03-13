/* ------------------------------------------------*/
/* CODIGO DEL BUSCADOR */
/* ------------------------------------------------*/
function buscador(){
    // console.log(arrayPHP);
    texto = quitarAcentos();
    filtro = [];

    /* Buscamos en el array algo relacionado con el bucle */
    for(i=0; i<arrayPHP.length; i++){
        for(j=0; j<atributos.length-1; j++){

            // console.log(atributos[j]);
            if (arrayPHP[i][atributos[j]] == null){
                campo = "";
            }else if(!isNaN(arrayPHP[i][atributos[j]])){
                campo = arrayPHP[i][atributos[j]]+"".toLowerCase();
            }else{
                campo = arrayPHP[i][atributos[j]].toLowerCase();
            }
            
            // console.log(campo);
            if (campo.indexOf(texto) > -1){ /* Si no coincide la función tira un -1 */
                filtro.push(arrayPHP[i]);
                break;
                // console.log(filtro);
            }
        }
    }

    //Si no se encuentran coincidencias igualamos la tabla
    if(filtro.length == 0){
        document.getElementById("buscador").value = "";
        alert("No hay coincidencias");
        filtro = arrayPHP;
    }

    //Modificamos el arrayJS para mostrar los datos del filtro
    arrayJS = filtro.slice();

    //Graficamos la tabla
    resetValues();
    pages = numPaginas(arrayJS);
    delTable();
    crearTabla(arrayJS, pages);
}

function quitarAcentos(){
    //Seleccionamos el buscador de la página y lo que se escribe en él
    buscadores = document.getElementById("buscador");
    cadena = buscadores.value;
    //Constante que me almacena lla forma de convertir caracteres raros
    let acentos = {'á':'a','é':'e','í':'i','ó':'o','ú':'u','Á':'A','É':'E','Í':'I','Ó':'O','Ú':'U', 'ü':'u'};

    //quitamos las tildes
    noTildes = cadena.split('').map( letra => acentos[letra] || letra).join('').toString().toLowerCase();	
    // console.log(noTildes);
    return noTildes;
}

/* ------------------------------------------------*/
/* CODIGO DE FILTRAR */
/* ------------------------------------------------*/

function filtrar(option, atributo){
    //Inicializamos filtro a cero
    filtro = [];

    //Comparamos el id de tipo persona con el id tipo 
    // console.log(atributo + " " + atributo);
    if (option.id == "todos"){
        filtro = arrayPHP;
    }else{
        for(i=0; i<arrayPHP.length; i++){
            if (arrayPHP[i][atributo] == option.id){
                filtro.push(arrayPHP[i]);
            }
        }
    }

        /* Si no hay coincidencias devuelve un mensaje y todo el array */
        if(filtro.length == 0){
            alert("No hay elementos de este filtro registrados en la Base de datos");
            filtro = arrayPHP;
        }
        
    
    arrayJS = filtro;
    //Modificamos el arrayJS para mostrar los datos del filtro
    

    //Creamos la tabla con el filtro aplicado
    resetValues();
    pages = numPaginas(arrayJS);
    delTable();
    crearTabla(arrayJS, pages);
}

function resetValues(){
    elementos = document.querySelectorAll(".page-item");
    // console.log(elementos);
    for (i=1; i<elementos.length-1; i++) {
        if (elementos[i].classList.contains("active")){
            elementos[i].classList.remove("active");
        }

        if (elementos[i].classList.contains("disabled")){
            elementos[i].classList.remove("disabled");
        }

        elementos[i].firstChild.innerHTML = i;
    }

    if (!(elementos[0].classList.contains("disabled"))){
        elementos[0].classList.add("disabled");
    }

    if (!(elementos[1].classList.contains("disabled"))){
        elementos[1].classList.add("disabled");
    }

    if (elementos[elementos.length-1].classList.contains("disabled")){
        // console.log(elementos[elementos.length-1]);
        elementos[elementos.length-1].classList.remove("disabled");
    }
}

window.addEventListener("afterprint", function(event) {
    console.log(event);
  });


/* ------------------------------------------------*/
/* CODIGO DE VENTANAS MODALES */
/* ------------------------------------------------*/

/* ============ Abre la ventana Modal ============ */
function openModal(boton){

    /* Hacemos visible el modal que se necesite */
    if(boton.classList.contains("edit")){
        modal = document.getElementById("modalEdit");
        select = modal.getElementsByTagName("select");
        
        /* OCULTAR O MOSTRAR EL DROPDOWN CURSO */
        if (select != null){
            if (select.id == "curso"){
                alert("Estamos en personas");
            }
        }
        
        
        /* Asignamos al botón la función fetch que necesitamos */
        // let modalEdit = document.getElementById("modalEdit");
        // modalEdit.setAttribute("onclick", "afiasf("+boton.name+")");
    }

    if(boton.classList.contains("delete")){
        modal = document.getElementById("modal1");

        /* Personalizamos la ruta en función del elemento que se quiera eliminar */
        let modalBorrar = document.getElementById("modalBorrar");
        modalBorrar.href = funciones[0]+"/"+funciones[1]+"/"+funciones[2]+"/"+boton.name;
    }
    
    modal.style.display="flex";
};
/* =============================================== */


/* ============ Cierra la ventana Modal ============ */
function closeModal(){
    let modales = document.getElementsByClassName("modal-container");
    for (modales in modal){
        modal.style.display="none";
    }
}
/* ================================================== */

/* ============ Cierra la ventana modal al hacer click fuera de la ventana ============ */
window.onclick = function(event) {
    let modales = document.getElementsByClassName("modal-container");
    // console.log(modales);
    if(modales != null){
        for (i=0; i<modales.length; i++){
            if (event.target == modales[i]) {
                modal.style.display = "none";
            }
        }
    }
}
/* ===================================================================================== */




/* ------------------------------------------------*/
/* CODIGO DE PAGINACIÓN */
/* ------------------------------------------------*/

/* ============ Al cargar la pagina ============ */
window.addEventListener("load", function() { 

    /* COOKIES */
    save_config();

    if (!(typeof arrayJS === 'undefined')){ /* Evita errores en el console.log */
        if (arrayJS.length == 0){ /* Si no hay datos desactivamos el menu de navegación */
            elementos = document.querySelectorAll(".page-item");
            for (i=0; i<elementos.length; i++){
                if (!(elementos[i].classList.contains("disabled"))){
                    elementos[i].classList.add("disabled");
                }
            }
            alert("No hay elementos disponibles");
        }else{
            // Si hay datos creamos la primera página
            pages = numPaginas(arrayJS);
            crearTabla(arrayJS, pages);
        }
    }
});
/* ============================================ */


/* ============ Al cambiar de página ============ */
function paginar(boton){

    /* Gestion ordenar */
    if (boton.classList.contains("ordenar")){
        let elementos = document.querySelectorAll(".ordenar");
        
        for (i=0; i<elementos.length; i++){
            elementos[i].parentNode.style.color = "black";
            if (elementos[i].classList.contains("fa-arrow-up-wide-short")){
                elementos[i].classList.remove("fa-arrow-up-short-wide");
                elementos[i].classList.add("fa-arrow-up-wide-short");
            }
            if (elementos[i] == boton){
                
                array = cargarArray(boton, ordenar[i]);
            }
        }
        boton = document.getElementsByClassName("page-item")[1];
    }else{
        array = arrayJS;
    }

    //Determinamos el número de paginas
    pages = numPaginas(array);

    /* Si es una llamada del navegador de las páginas */
    if (boton.classList.contains("page-link")){
        paginador(boton, pages);
    }
    
    delTable();
    crearTabla(array, pages);
}
/* ================================================ */


/* ============ Devuelve el array que se necesite ============ */
function cargarArray(boton, argumento){
    // console.log(argumento);
    
    /* Ordenamos el array en función de su argumento */
    array = arrayJS.sort((a,b) =>{

        /* Si es una fecha */
        if ( !(isNaN(Date.parse(a[argumento]))) ){
            return new Date(a[argumento]) - new Date(b[argumento]);

        }else{
            if (a[argumento]+"".toLowerCase() > b[argumento]+"".toLowerCase()){
                return 1;
            }else if (a[argumento]+"".toLowerCase() < b[argumento]+"".toLowerCase()){
                return -1;
            }
            return 0;
        }
    });

    /* Si Ya se ha ordenado previamente */
    if (boton.classList.contains("fa-arrow-up-short-wide")){
        boton.classList.replace("fa-arrow-up-short-wide", "fa-arrow-up-wide-short");
        boton.parentNode.style.color = "#0d6efd";
        array.reverse();
    }else{
        boton.parentNode.style.color = "#0d6efd";
        boton.classList.replace("fa-arrow-up-wide-short", "fa-arrow-up-short-wide");
    }
   

    
    // console.log(array);
    
    return array;
}
/* =========================================================== */


/* ============ Carga el número de páginas ============ */
function numPaginas(array){

    let anterior = document.getElementsByClassName("page-item")[0];
    let btn1 = document.getElementsByClassName("page-item")[1];
    let btn2 = document.getElementsByClassName("page-item")[2];
    let btn3 = document.getElementsByClassName("page-item")[3];
    let siguiente = document.getElementsByClassName("page-item")[4];

    /* check pages */
    let numPaginas = array.length/10;
    if(!(Number.isInteger(numPaginas))) {
        numPaginas = Math.trunc(numPaginas)+1
    }
    

    if(numPaginas > 0){
        btn1.classList.replace("disabled", "active");
    }
    if (numPaginas == 1){
        btn2.classList.add("disabled");
        btn3.classList.add("disabled");
        siguiente.classList.add("disabled");
    }else if(numPaginas == 2){
        if (btn1.classList.contains("disabled")){
            btn1.classList.remove("disabled");
        }else if(btn2.classList.contains("disabled")){
            btn2.classList.remove("disabled");
        }
        btn3.classList.add("disabled");
    }

    return numPaginas;
}
/* ==================================================== */


/* ============ Gestiona el navegador de las páginas ============ */
/* ============================================================== */
function paginador(link, numPaginas){

    let activo = document.querySelectorAll(".active a")[0];
    let anterior = document.getElementsByClassName("page-item")[0];
    let btn1 = document.getElementsByClassName("page-item")[1];
    let btn2 = document.getElementsByClassName("page-item")[2];
    let btn3 = document.getElementsByClassName("page-item")[3];
    let siguiente = document.getElementsByClassName("page-item")[4];
    
    /* Quitamos la clase active del boton actual */
    activo.parentNode.classList.remove('active'); /* Seleccionamos el li del elemento activo y le quitamos el active */

    /* Si van al primer elemento...  */
    if (link.innerHTML=="1" || (activo.innerHTML=="2" && link.innerHTML=="Anterior")){
        if (numPaginas == "2"){
            siguiente.classList.remove("disabled");
        }
        btn1.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
        anterior.classList.add('disabled'); /* desactivamos el botón Anterior */
    }
    /* Si sale del primer elemento */
    else if (link.innerHTML - activo.innerHTML == 2 && (link.innerHTML=="3" || link.innerHTML=="2")){
        /* Renombramos los botones de una manera especial */
        btn1.firstChild.innerHTML=parseInt(link.innerHTML)-1;
        btn2.firstChild.innerHTML=link.innerHTML;
        btn3.firstChild.innerHTML=parseInt(link.innerHTML)+1;
        
        anterior.classList.remove('disabled'); /* Quitaremos la clase disabled */
        btn2.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
    }
    /* Si van al ultimo elemento... */
    else if (link.innerHTML==numPaginas || (activo.innerHTML==numPaginas-1 && link.innerHTML=="Siguiente")){ //AQUI HAY QUE DETERMINAR EL NUM DE PÁGINAS
        /* Si el ultimo es la página 2*/
        if(activo.innerHTML == "1"){
            btn2.classList.add('active');
            siguiente.classList.replace('active', "disabled");
            anterior.classList.remove('disabled');
        }else{
            btn3.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
        }
        siguiente.classList.add('disabled'); /* desactivamos el botón Anterior */
    }
    /* Si sale del ultimo elemento */
    else if (link.innerHTML - activo.innerHTML == -2 && (link.innerHTML==numPaginas-1 || link.innerHTML==numPaginas-2)){
        /* Renombramos los botones de una manera especial */
        btn1.firstChild.innerHTML=parseInt(link.innerHTML)-1;
        btn2.firstChild.innerHTML=parseInt(link.innerHTML)+1;
        btn3.firstChild.innerHTML=parseInt(link.innerHTML)+2;
        siguiente.classList.remove('disabled'); /* Quitaremos la clase disabled */
        btn2.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
    }
    else{
        /* Si el botón anterior esta desactivado */
        if (anterior.classList.contains( 'disabled' )){ 
            anterior.classList.remove('disabled'); /* Quitaremos la clase disabled */
        }
            /* Si el botón siguiente esta desactivado */
        if (siguiente.classList.contains('disabled')){ /* Quitaremos la clase disabled */
            siguiente.classList.remove('disabled');
        }

        /* Si avanza con los botones de números */
        if (link.innerHTML !="Anterior" && link.innerHTML != "Siguiente" && link.innerHTML > activo.innerHTML && activo.innerHTML != numPaginas){
            btn1.firstChild.innerHTML=activo.innerHTML;
            btn3.firstChild.innerHTML=parseInt(activo.innerHTML)+2;
            btn2.firstChild.innerHTML=parseInt(activo.innerHTML)+1;
        }
        /* Si retocede con los botones de números */
        else if(link.innerHTML !="Anterior" && link.innerHTML != "Siguiente" && link.innerHTML < activo.innerHTML){
            btn1.firstChild.innerHTML=parseInt(activo.innerHTML)-2;
            btn3.firstChild.innerHTML=activo.innerHTML;
            btn2.firstChild.innerHTML=activo.innerHTML-1;
        }
        btn2.classList.add('active'); /* Seleccionamos el primer li y le añadimos la clase active */
    }

    /* Cambiamos el número de los botones con siguiente */
    if(link.innerHTML=="Siguiente" && activo.innerHTML != numPaginas-1){
        btn1.firstChild.innerHTML=activo.innerHTML;
        btn3.firstChild.innerHTML=parseInt(activo.innerHTML)+2;
        btn2.firstChild.innerHTML=parseInt(activo.innerHTML)+1;
    }
    /* Cambiamos el número de los botones Anterior */
    else if (link.innerHTML=="Anterior"&& activo.innerHTML != 2 && activo.innerHTML!=numPaginas){
        btn1.firstChild.innerHTML=parseInt(activo.innerHTML)-2;
        btn3.firstChild.innerHTML=activo.innerHTML;
        btn2.firstChild.innerHTML=activo.innerHTML-1;
    }
}
/* ============================================================== */


/* ============ Elimina la tabla anterior ============ */
function delTable(){
    document.querySelectorAll("tbody")[0].remove();
}
/* ==================================================== */

/* ============ Hace la tabla en función del numero de páginas y el array ============ */
function crearTabla(array, numPaginas){

    /* Indicamos el número de elementos que deseamos en la página */
    let activo = document.querySelectorAll(".active a")[0];

    inicio = (activo.innerHTML+0)-10;
    // console.log(numPaginas+" "+activo.innerHTML);
    if (activo.innerHTML == numPaginas){
        // console.log(array.length);
        fin = array.length;
    }else{
        fin = (activo.innerHTML+0);
    }

    // console.log(inicio+" "+fin);

    /* Seleccionamos la tabla y creamos el body de la tabla */
    let table = document.getElementsByTagName("table")[0];
    let tblBody = document.createElement("tbody");

     /* Crea las celdas */
    for (i=inicio; i<fin; i++) {
        /* Crea las hileras de la tabla */
        let fila = document.createElement("tr");

        for (j = 0; j<atributos.length; j++) {
            // Crea un elemento <td> y un nodo de texto, haz que el nodo de
            // texto sea el contenido de <td>, ubica el elemento <td> al final
            // de la hilera de la tabla

            let celda = document.createElement("td");
            textoCelda = document.createTextNode(array[i][atributos[j]]);

            /* Cambiar color */
            if (array[i][atributos[j]] == "Pagado"){
                celda.style.color = "#8c1311";
            }else if(array[i][atributos[j]]== "Nueva"){
                celda.style.color = "#127d0c";
            }else if(array[i][atributos[j]] == "Pagando"){
                celda.style.color = "#f76d0a";
            }

            if (j==atributos.length-1){

                    /* Creamos los botones de editar y borrar */
                    id = array[i][atributos[j]];
                    curso = array[i][funciones[6]];

                    if (tableName == "Personas" || tableName == "Cursos" || tableName == "Becas" || tableName == "Microcreditos" || tableName == "Trabajadores"){
                        crearButtons(tableName, celda, id, fila, curso);
                    }else{
                        a = document.createElement("a");
                        a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[3]+"/"+array[i][atributos[j]];
                        edit = document.createElement("button");
                        edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
                        icono1 = document.createElement("i");
                        icono1.classList.add("fa-solid", "fa-pen-to-square");
                        edit.appendChild(icono1);
                        a.appendChild(edit);
                        celda.appendChild(a);

                        borrar = document.createElement("button");
                        borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "delete");
                        borrar.setAttribute("onclick", "openModal(this);");
                        borrar.setAttribute("name", array[i][atributos[j]]);
                        icono2 = document.createElement("i");
                        icono2.classList.add("fa-solid", "fa-trash-can");
                        borrar.appendChild(icono2);
                        celda.appendChild(borrar);

                   

                    
                }

                /* Añade botones adicionales */
                if (extras.length != 0){
                    for (k=0; k<extras.length; k++){
                        a = document.createElement("a");
                        a.href = funciones[0]+"/"+extras[k]+"/"+array[i][atributos[j]];
                        details = document.createElement("button");
                        details.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
                        icono = document.createElement("i");

                        /* El icono se repetirá */
                        icono.classList.add("fa-regular", "fa-file");
                        details.appendChild(icono);
                        a.appendChild(details);
                        celda.appendChild(a);
                    }
                }
            }

            if (j != atributos.length-1){
                celda.appendChild(textoCelda);
                
            }
            fila.appendChild(celda);
        }

        // Agrega la hilera al final de la tabla
        tblBody.appendChild(fila);
    }
    // Colocamos el body en la tabla
    table.appendChild(tblBody);
}

function crearButtons(tableName, celda, id, fila, curso){
    
    switch (tableName) {
        case "Personas":
            /* Botón editar */
            editFetch = document.createElement("button");
            editFetch.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "edit");
            editFetch.setAttribute("onclick", "editarCampo(this);");
            editFetch.setAttribute("name", id);
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            editFetch.appendChild(icono1);
            celda.appendChild(editFetch);

            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);
            break;

        case "Trabajadores":
              
            editFetch = document.createElement("button");
            editFetch.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "edit");
            editFetch.setAttribute("onclick", "editarCampo(this);");
            editFetch.setAttribute("name", id);
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            editFetch.appendChild(icono1);
            celda.appendChild(editFetch);

            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);
            

            /* Botón Generar Diploma */
            link = document.createElement("a");
            link.href = funciones[0]+"/"+funciones[1]+"/"+funciones[5]+"/"+id+"/"+curso;
            diploma = document.createElement("button");
            diploma.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-graduation-cap");
            diploma.appendChild(icono1);
            link.appendChild(diploma);
            celda.appendChild(link);
            break;

        case "Cursos":

        if(rolActual == 100){
            /* Botón editar */
            a = document.createElement("a");
            a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[3]+"/"+id;
            edit = document.createElement("button");
            edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            edit.appendChild(icono1);
            a.appendChild(edit);
            celda.appendChild(a);

            /* Botón Materiales */
            a = document.createElement("a");
            a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[4]+"/"+id;
            edit = document.createElement("button");
            edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-file-lines");
            edit.appendChild(icono1);
            a.appendChild(edit);
            celda.appendChild(a);
            
            /* Botón Trabajadores */
            a = document.createElement("a");
            a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[5]+"/"+id;
            edit = document.createElement("button");
            edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-users");
            edit.appendChild(icono1);
            a.appendChild(edit);
            celda.appendChild(a);

            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);
            break;
        }else if (rolActual == 300){
             /* Botón Materiales */
             a = document.createElement("a");
             a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[4]+"/"+id;
             edit = document.createElement("button");
             edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
             icono1 = document.createElement("i");
             icono1.classList.add("fa-solid", "fa-file-lines");
             edit.appendChild(icono1);
             a.appendChild(edit);
             celda.appendChild(a);
             break;
        }
            

        case "Becas":
            /* Botón editar */
            a = document.createElement("a");
            a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[3]+"/"+id;
            edit = document.createElement("button");
            edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            edit.appendChild(icono1);
            a.appendChild(edit);
            celda.appendChild(a);

            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);

            break;
        case "Microcreditos":
            /* Botón editar */
            a = document.createElement("a");
            a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[3]+"/"+id;
            edit = document.createElement("button");
            edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
            icono1 = document.createElement("i");
            icono1.classList.add("fa-solid", "fa-pen-to-square");
            edit.appendChild(icono1);
            a.appendChild(edit);
            celda.appendChild(a);

            /* Botón borrar */
            borrar = document.createElement("button");
            borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2", "delete");
            borrar.setAttribute("onclick", "openModal(this);");
            borrar.setAttribute("name", id);
            icono2 = document.createElement("i");
            icono2.classList.add("fa-solid", "fa-trash-can");
            borrar.appendChild(icono2);
            celda.appendChild(borrar);

            td = fila.getElementsByTagName("td")[5]; /* Pillamos el td del estado */
            // console.log(td);
            // console.log(td.textContent);
            if(td.textContent == "Nueva"){
                /* Botón aprobar */
                a = document.createElement("a");
                a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[4]+"/"+id;
                edit = document.createElement("button");
                edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
                icono1 = document.createElement("i");
                icono1.classList.add("fa-solid", "fa-thumbs-up");
                edit.appendChild(icono1);
                a.appendChild(edit);
                celda.appendChild(a);

                /* Botón rechazar */
                a = document.createElement("a");
                a.href = funciones[0]+"/"+funciones[1]+"/"+funciones[5]+"/"+id;
                edit = document.createElement("button");
                edit.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
                icono1 = document.createElement("i");
                icono1.classList.add("fa-solid", "fa-thumbs-down");
                edit.appendChild(icono1);
                a.appendChild(edit);
                celda.appendChild(a);
            }
            break;
              
        // case "":

      }
      return celda;
}

function editarCampo(boton){
    openModal(boton);
    cargarDatos(boton.name);
}		

async function cargarDatos(idCampo){

    // Marcamos el boton como cargando ... y lo deshabilitamos
    let buttonEditar = document.getElementById("buttonEditar")
    buttonEditar.innerHTML='<span class="spinner-border spinner-border-sm"></span> Loading...'
    buttonEditar.disabled = true
       /* fetch (Ruta_URL/controlador/funcion/atributo) */ 
    await fetch(funciones[0]+"/"+funciones[1]+"/"+arrayfetch[0]+"/"+idCampo,{
        headers: {
            "Content-Type": "application/json"
        },
        credentials: 'include'
    })
        .then((resp) => resp.json())
        .then(function(data) {
            console.log(data);

            /* Pillamos los inputs y selects del formEditar */
            const Form = document.getElementById("editForm");
            const inputs = Form.getElementsByTagName("input");
            const select = Form.getElementsByTagName("select");

            // console.log(inputs);

            /* Relleno los datos de los inputs */
            for(i=0; i<inputs.length; i++){
                if (inputs[i].name == "foto"){
                    foto = document.getElementById("idFoto");
                    foto.setAttribute("src", rutaFoto[0]+rutaFoto[1]+data[0][inputs[i].name]);
                }else{
                    inputs[i].value = data[0][inputs[i].name];
                }

                // console.log(inputs[i].name);
                // console.log(data[0][inputs[i].name]);
            }

            /* Selecciona los datos correctos de los selects */
            if (select != null){
                for(i=0; i<select.length; i++){
                    // console.log(select[i].name);
                    options = select[i].getElementsByTagName("option");
                    // console.log(options);
                    for(j=0; j<options.length; j++){
                        // console.log(data[0][select[i].name]);
                        // console.log(options[j].value);
                        if(options[j].value == data[0][select[i].name]){
                            options[j].selected = "selected";
                        }

                        /* Control del select de trabajadores (ver_personas.php) */
                        if (select[i].name == "cursoActual"){
                            if(data[0]["cursoActual"] == "" || data[0]["cursoActual"] == null){
                                options[0].selected = "selected";
                                select[i].parentNode.style.display = "none";
                            }else{
                                select[i].parentNode.style.display = "block";
                            }
                        }

                    }
                }
            }

            // Activamos de nuevo el boton, despues de un delay
            setTimeout(() => {
                buttonEditar.innerHTML='Guardar'
                buttonEditar.disabled = false
            }, 1000);
            
        })
}

// async function editarDatos(){
//     // const datosForm = new FormData(document.getElementById("editForm"))
//     const datosForm = new FormData(document.getElementsByTagName("form")[0]);
//     const form = document.getElementsByTagName("form")[0];
//     const id = form.getElementsByTagName("input")[0].value;

//      /* fetch (Ruta_URL/controlador/funcion) */ 
//     await fetch(funciones[0]+"/"+funciones[1]+"/"+arrayfetch[1], {
//         method: "POST",
//         body: datosForm,
//     })
//         .then((resp) => resp.json())
//         .then(function(data) {

//             // console.log(data);

//             if (data){
//                 campo = document.getElementsByName(id)[0].parentNode;
//                 fila = campo.parentNode;
//                 console.log(fila);
//                 campos = fila.getElementsByTagName("td");

//                 for(i=0; i<campos.length-1; i++){
//                     campos[i].innerHTML =  datosForm.get(formData[i]);
//                 }
//                 /* Hacer Aquí la alerta guay */
//             }else{
//                 /* Hacer Aqui la alerta de error */
//             }
//         })
//     }

async function editarDatos(){
    // const datosForm = new FormData(document.getElementById("editForm"))
    const datosForm = new FormData(document.getElementsByTagName("form")[0]);
    const form = document.getElementsByTagName("form")[0];
    const id = form.getElementsByTagName("input")[0].value;

     // fetch (Ruta_URL/controlador/funcion) 
    await fetch(funciones[0]+"/"+funciones[1]+"/"+arrayfetch[1], {
        method: "POST",
        body: datosForm,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            // console.log(data);

            if (data){
                campo = document.getElementsByName(id)[0].parentNode;
                fila = campo.parentNode;
                campos = fila.getElementsByTagName("td");

                if (tableName == "Trabajadores"){
                    campos[1].innerHTML = datosForm.get(formData[0]);
                }else{
                    for(i=0; i<campos.length-1; i++){
                        campos[i].innerHTML =  datosForm.get(formData[i]);
                    }
                }
                // Hacer Aquí la alerta guay /
            }else{
                // Hacer Aqui la alerta de error */
            }
        })
    }
        function create_input(select){
            // console.log(numCursos.length);
            cursos = document.getElementById("cursosSelect");
            labelCursos  =document.getElementById("cursosLabel");
            
            if(cursos == null){
          
                if(select.value == 3){

                    form = document.getElementById("idFormulario");

                    div = document.getElementById("containerCurso");

                    label=document.createElement("label");
                    textlabel=document.createTextNode("Curso actual");
                    label.classList.add("form-label");
                    label.setAttribute("for","idCursoActual");
                    label.appendChild(textlabel);
                    label.setAttribute("id", "cursosLabel");

                    select1 = document.createElement("select");
                    select1.classList.add("form-control");
                    select1.setAttribute("id", "cursosSelect");
                    select1.setAttribute("name", "idCursoActual");

                    for(i=0; i<numCursos.length;i++){
                        option = document.createElement("option");
                        option.value = numCursos[i].idCurso;
                        option.text = numCursos[i].nombreCurso;
                        select1.appendChild(option);
                    }

                    div.appendChild(label);
                    div.appendChild(select1);
                }

            }else{
                    cursos.remove();
                    labelCursos.remove();

            }

}

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
  
  function cambiarFondoNegro(){

    document.cookie = "color = negro; SameSite=None; Secure";

        backgroundColor = "#000000";
        color = "#ffff00";
    
        var body = document.getElementsByClassName('body');
        
        document.body.setAttribute('style', 'background: '+backgroundColor+' !important;');


        var h1s = document.getElementsByTagName('h1');
    
            for (var i = 0; i<h1s.length; i++) {
                h1s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

        var h4s = document.getElementsByTagName('h4');
    
            for (var i = 0; i<h4s.length; i++) {
                h4s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

        var h2s = document.getElementsByTagName('h2');
    
            for (var i = 0; i<h2s.length; i++) {
                h2s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }
    
    
        var nav = document.getElementsByTagName('nav');
    
            for (var i = 0; i<nav.length; i++) { 
                nav[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            }
    
        var a = document.getElementsByTagName('a');
    
            for (var i = 0; i<a.length; i++) {
                a[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

        var p = document.getElementsByTagName('p');
    
            for (var i = 0; i<p.length; i++) {
                p[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }
        
        var b = document.getElementsByTagName('b');
        
            for (var i = 0; i<b.length; i++) {
                b[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

	    var span = document.getElementsByTagName('span');
	  
            for (var i = 0; i<span.length; i++) {
                span[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

        var header = document.getElementsByTagName('header');


            for (var i = 0; i<header.length; i++) { 
                header[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            }

        var card = document.getElementsByClassName('card');


        for (var i = 0; i<card.length; i++) { 
            card[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            // card[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
        }

        var button = document.getElementsByClassName('btn');


        for (var i = 0; i<button.length; i++) { 
            button[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            button[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');

        }

        var label = document.getElementsByTagName('label');
  
            for (var i = 0; i<label.length; i++) {
                label[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

        var th = document.getElementsByTagName('th');
  
            for (var i = 0; i<th.length; i++) {
                // th[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');

                th[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

            var td = document.getElementsByTagName('td');
  
            for (var i = 0; i<td.length; i++) {
                // th[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');

                td[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

    



  
   
  
	  
  }
  
  
  function cambiarFondoNormal(){
  
    document.cookie = "color = normal; SameSite=None; Secure";
    
	  backgroundColor = "";
	  color = "";
  
      var body = document.getElementsByClassName('body');
    //   var header = document.getElementsByClassName('header');
	  
	  document.body.setAttribute('style', 'background: '+backgroundColor+' !important;');

    //   document.header.setAttribute('style', 'background: '+backgroundColor+' !important;');
  
  
	  var h1s = document.getElementsByTagName('h1');
  
	  for (var i = 0; i<h1s.length; i++) {
		  h1s[i].setAttribute('style', 'color:'+color+' !important; ;');
	  }

      var h2s = document.getElementsByTagName('h2');
    
            for (var i = 0; i<h2s.length; i++) {
                h2s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }
  
  
	  var nav = document.getElementsByTagName('nav');
  
	  for (var i = 0; i<nav.length; i++) { 
		  nav[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
	  }
  
	  var a = document.getElementsByTagName('a');
  
	  for (var i = 0; i<a.length; i++) {
		  a[i].setAttribute('style', 'color:'+color+' !important;');
	  }

      var p = document.getElementsByTagName('p');
    
      for (var i = 0; i<p.length; i++) {
          p[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
      }
      
  
	  var b = document.getElementsByTagName('b');
	  
		  for (var i = 0; i<b.length; i++) {
			  b[i].setAttribute('style', 'color:'+color+' !important;');
		  }

		  var span = document.getElementsByTagName('span');
	  
		  for (var i = 0; i<span.length; i++) {
			span[i].setAttribute('style', 'color:'+color+' !important;');
		  }

          var header = document.getElementsByTagName('header');


          for (var i = 0; i<header.length; i++) { 
            header[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
        }

        var card = document.getElementsByClassName('card');


        for (var i = 0; i<card.length; i++) { 
            card[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            // card[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');

      }

      var button = document.getElementsByClassName('btn');


      for (var i = 0; i<button.length; i++) { 
          button[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
          button[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');

      }

       

          var label = document.getElementsByTagName('label');
  
	  for (var i = 0; i<label.length; i++) {
		label[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
	  }

      var h4s = document.getElementsByTagName('h4');
    
            for (var i = 0; i<h4s.length; i++) {
                h4s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

            var th = document.getElementsByTagName('th');
  
            for (var i = 0; i<th.length; i++) {
                // th[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');

                th[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }
            
            var td = document.getElementsByTagName('td');
  
            for (var i = 0; i<td.length; i++) {
                // th[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');

                td[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

      

  
	 
  
	  
  }
  
  function cambiarFondoClaro(){

        document.cookie = "color = claro; SameSite=None; Secure";
         
	    backgroundColor = "#99ccff";
	    color = "#000000";
	  
        var body = document.getElementsByClassName('body');
        // var header = document.getElementsByClassName('header');
        
        document.body.setAttribute('style', 'background: '+backgroundColor+' !important;');
        // document.header.setAttribute('style', 'background: '+backgroundColor+' !important;');
	  
	  
        var h1s = document.getElementsByTagName('h1');

        for (var i = 0; i<h1s.length; i++) {
            h1s[i].setAttribute('style', 'color:'+color+' !important;  -webkit-text-stroke: 0px;');
        }

        var h2s = document.getElementsByTagName('h2');
    
            for (var i = 0; i<h2s.length; i++) {
                h2s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

        var nav = document.getElementsByTagName('nav');

        for (var i = 0; i<nav.length; i++) { 
            nav[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
        }

        var a = document.getElementsByTagName('a');

        for (var i = 0; i<a.length; i++) {
            a[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
        }

        var p = document.getElementsByTagName('p');
    
        for (var i = 0; i<p.length; i++) {
            p[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
        }

        var b = document.getElementsByTagName('b');

        for (var i = 0; i<b.length; i++) {
            b[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
        }

        var span = document.getElementsByTagName('span');

        for (var i = 0; i<span.length; i++) {
            span[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
        }

        var header = document.getElementsByTagName('header');


        for (var i = 0; i<header.length; i++) { 
          header[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
      }

      var card = document.getElementsByClassName('card');


        for (var i = 0; i<card.length; i++) { 
            card[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            // card[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');

      }

        var label = document.getElementsByTagName('label');

        for (var i = 0; i<label.length; i++) {
        label[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
        }

        var button = document.getElementsByClassName('btn');


        for (var i = 0; i<button.length; i++) { 
            button[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');
            button[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');

        }

        var h4s = document.getElementsByTagName('h4');
    
            for (var i = 0; i<h4s.length; i++) {
                h4s[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

            // var li = document.getElementsByTagName('li');
  
            // for (var i = 0; i<li.length; i++) {
            //     li[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');

            //     li[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            // }

            var th = document.getElementsByTagName('th');
  
            for (var i = 0; i<th.length; i++) {

                th[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }

            var td = document.getElementsByTagName('td');
  
            for (var i = 0; i<td.length; i++) {
                // th[i].setAttribute('style', 'background-color:'+backgroundColor+' !important;');

                td[i].setAttribute('style', 'color:'+color+' !important; -webkit-text-stroke: 0px;');
            }
    }

    function save_config(){
        let cookie = getCookie("color");
        alert(cookie);
        if (cookie == "negro"){
            cambiarFondoNegro();
        }
        if (cookie == "normal"){
            cambiarFondoNormal();
        }
        if (cookie == "claro"){
            cambiarFondoClaro();
        }
    }
    

function size_font(order){

    body = document.getElementsByTagName('body')[0];
    table = document.getElementsByTagName('table')[0];

    switch (order){
      case '+':
        body.style.fontSize = '1.9em';
        table.style.fontSize = '1.9em';
        break;

      case '-':
        body.style.fontSize = '0.7em';
        break;

      case '=':
        body.style.fontSize = '1em';
        break;
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];

        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return "";
}




//   VALIDACIÓN DE DATOS EN LOS DISTINTOS CAMPOS 

  function validarFormulario(){
    
    const inputs = document.getElementById("idFormulario").elements; //id del formulario
  
    // Bucle del form a los distintos inputs
    for (let i = 0; i < inputs.length; i++) {
      switch(inputs[i].type){
        case "text": //tipo de dato
          if(inputs[i].value == ""){ //si esta vacio
  
                inputs[i].classList.remove("formBien");
                inputs[i].classList.add("formMal");
              }else{
                inputs[i].classList.remove("formMal");
                inputs[i].classList.add("formBien");
              }
  
          break;
        case "date": //tipo de dato
          if(inputs[i].value == ""){
            inputs[i].classList.remove("formBien");
            inputs[i].classList.add("formMal");
          }else{
  
            inputs[i].classList.remove("formMal");
            inputs[i].classList.add("formBien");
          }
          break;
        case "number": //tipo de dato
          if(inputs[i].value == ""){
            inputs[i].classList.remove("formBien");
            inputs[i].classList.add("formMal");
          }else{
            inputs[i].classList.remove("formMal");
            inputs[i].classList.add("formBien");
          }
          break;
      }
  
    }
}
  
  function Validar() {
    params = Validar.arguments;
    f = params[0];
    for (let i = 1, caracteres = params.length; i < caracteres; i++){  //Bucle de los campos
      if (f[params[i]].value == ""){ //Si el campo esta vacio, sale el alert con el nombre del campo a rellenar
        //alert("Debe rellenar obligatoriamente el campo: " + params[i]);
        // params[i].style.borderColor = "red";
        return false;
       }
     }
  }
/* ======================================================================== */


/* ============ Carga un array de pruebas ============ */
// function arrayPersonas() {
//     let personas = [];
//     for(i=1; i<=45; i++) {
//         persona = {
//             "idPersona":i,
//             "nombre":"Nombre "+i,
//             "apellidos": "Apellido "+i,
//             "DNI":"DNI"+i,
//             "telefono":"Telefono"+i,
//             "correo":"correo"+i+"@gmail.com",
//             "fechaNacimiento":"fechaNacimiento"+i,
//             "tutor":"tutor"+i,
//             "curso":"cursoActual"+i,
//         }
//         personas.push(persona);
//     }
//     return personas;
// }
/* =================================================== */
