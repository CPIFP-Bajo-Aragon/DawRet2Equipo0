/* ------------------------------------------------*/
/* CODIGO DEL BUSCADOR */
/* ------------------------------------------------*/

function buscador(){
    // console.log(arrayPHP);
    texto = quitarAcentos();
    filtro = [];

    /* Buscamos en el array algo relacionado con el bucle */
    for(i=0; i<arrayPHP.length; i++){
        for(j=0; j<atributos.length-2; j++){
            campo = arrayPHP[i][atributos[j]].toLowerCase();
            console.log(campo);
            if (campo.indexOf(texto) > -1){ /* Si no coincide la función tira un -1 */
                filtro.push(arrayPHP[i]);
                break;
                // console.log(filtro);
            }
        }
    }

    

    //Si no se encuentran coincidencias igualamos la tabla
    if(filtro.length == 0){
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

    if (option.id == "todos"){
        filtro = arrayPHP;
    }else{
        for(i=0; i<arrayPHP.length; i++){
            if (arrayPHP[i][atributo] == option.id){
                filtro.push(arrayPHP[i]);
            }
        }
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
            console.log(elementos[i]);
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
        console.log(elementos[elementos.length-1]);
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

    /* Hacemos visible el modal */
    let modal = document.getElementById("modal1");
    modal.style.display="flex";

    /* Personalizamos la ruta en función del elemento que se quiera eliminar */
    let modalBorrar = document.getElementById("modalBorrar");
    modalBorrar.href = funciones[0]+"/"+funciones[1]+"/"+funciones[2]+"/"+boton.name;

};
/* =============================================== */


/* ============ Cierra la ventana Modal ============ */
function closeModal(){
    let modal = document.getElementById("modal1");
    modal.style.display="none";
}
/* ================================================== */

/* ============ Cierra la ventana modal al hacer click fuera de la ventana ============ */
window.onclick = function(event) {
    let modal = document.getElementById("modal1");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
/* ===================================================================================== */




/* ------------------------------------------------*/
/* CODIGO DE PAGINACIÓN */
/* ------------------------------------------------*/

/* ============ Al cargar la pagina ============ */
window.addEventListener("load", function() { 
    // Creamos la primera página
    pages = numPaginas(arrayJS);
    crearTabla(arrayJS, pages);
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
    let elementos = document.querySelectorAll(".ordenar");
    
    /* Ordenamos el array en función de su argumento */
    array = arrayJS.sort((a,b) =>{

        /* Si es una fecha */
        if ( !(isNaN(Date.parse(a[argumento]))) ){
            return new Date(a[argumento]) - new Date(b[argumento]);

        }else{
            if (a[argumento].toLowerCase() > b[argumento].toLowerCase()){
                return 1;
            }else if (a[argumento].toLowerCase() < b[argumento].toLowerCase()){
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

            if (j==atributos.length-1){

                if (rolActual == 100){
                    /* Creamos los botones de editar y borrar */
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
                    borrar.classList.add("btn", "btn-primary", "btn-square-md", "mx-lg-2", "my-2");
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



    function formacion(link){
     
        
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
