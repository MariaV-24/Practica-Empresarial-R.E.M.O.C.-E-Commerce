/*MEDIUM-ZOOM*/

/* Clase Zoom */
mediumZoom('.zoom', {
    margin: 50,
    background: 'var(--gris)'
})


/******************************************************************************************************/
/*Listeners*/
addEventListener("transitionend",(function OcultarCarrucel (event){
    var carrucel = document.getElementById('carrucel');    
    var clickeado = $(event.target.classList);
    var clases = Object.values(clickeado);
    clases.forEach(item => {
    if(item ==='zoom'){
        if(carrucel.style.visibility === "visible" |carrucel.style.visibility === ""){
            carrucel.style.visibility = "hidden";
        }
        else{
            carrucel.style.visibility = "visible";
        }
    }
        });

}))


/******************************************************************************************************/
/*Funciones*/


function SetNombreProducto(event){
    var getProducto = (Object.values(event.path))[1].children;
    var producto = new Object();

    producto.imagen = getProducto[0].currentSrc;
    producto.nombre = getProducto[1].innerHTML;
    
    localStorage.setItem('producto',JSON.stringify(producto));

    return;
}


function ValidarCotizar(){
    var error=[];
    error[0] = false;

    ValidarNombre(error);
    ValidarTelefono(error);
    ValidarCorreo(error);
    ValidarMensaje(error);

    if(error[0] = true) return false;
    else {
        return true;
    }
}

function ValidarVenta(){
    var error=[];
    error[0] = false;

    ValidarNombre(error);
    ValidarDireccion(error);
    ValidarTelefono(error);

    if (error[0] === true) {
        return false
    }
    else {
        return true;
    };
}


function ValidarContactenos() {
    var error = [];
    error[0] = false;
    ValidarNombre(error);
    ValidarAsunto(error);
    ValidarCorreo(error);
    ValidarMensaje(error);

    if (error[0] === true) {
        return false
    }
    else {
        return true;
    };
}

/******************************************************************************************************/
/*Validaciones*/


function ValidarNombre(error) {
    var txtNombre = document.getElementById('nombre');
    var nombreAlert = document.getElementById('nombreAlert');
    if (txtNombre.value === "") {
        var nombreAlert = document.getElementById('nombreAlert');
        nombreAlert.style.visibility = "visible";
        txtNombre.style.borderColor = "#D11124";
        error[0] = true;
    }
    else {
        nombreAlert.style.visibility = "hidden";
        txtNombre.style.borderColor = "#000000";
    }
}

function ValidarAsunto(error) {
    var txtAsunto = document.getElementById('asunto');
    var asuntoAlert = document.getElementById('asuntoAlert');
    if (txtAsunto.value === "") {
        asuntoAlert.style.visibility = "visible";
        txtAsunto.style.borderColor = "#D11124";
        txtAsunto.style.borderColor = "#D11124";
        error[0] = true;
    }
    else {
        asuntoAlert.style.visibility = "hidden";
        txtAsunto.style.borderColor = "#000000";
    }
}

function ValidarCorreo(error) {
    var txtEmail = document.getElementById('email');
    var regularExp = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var emailAlert = document.getElementById('emailAlert');

    if (!regularExp.test(txtEmail.value)) {
        emailAlert.style.visibility = "visible";
        txtEmail.style.borderColor = "#D11124";
        error[0] = true;
    }
    else {
        txtEmail.style.borderColor = "#000000";
        emailAlert.style.visibility = "hidden";
    }
}

function ValidarMensaje(error) {
    var txtMensaje = document.getElementById('mensaje');
    var mensajeAlert = document.getElementById('mensajeAlert');
    if (txtMensaje.value === "") {
        mensajeAlert.style.visibility = "visible";
        txtMensaje.style.borderColor = "#D11124";
        error[0] = true;
    }
    else {
        txtMensaje.style.borderColor = "#000000";
        mensajeAlert.style.visibility = "hidden";
    }
}


function ValidarTelefono(){
    var telefono = document.getElementById('telefono').value;
    var telefonoAlert = document.getElementById('telefonoAlert');

    if(telefono ==='' | telefono.length > 8){
        var telefonoAlert = document.getElementById('telefonoAlert');
        telefonoAlert.style.visibility="visible";
        telefono.style.borderColor = "#D11124";
        error[0] = true;
    }
    else{
        telefonoAlert.style.visibility="hidden";
        telefono.style.borderColor = "#000000";
    }
}

function ValidarDireccion(error) {
    var direccion = document.getElementById('direccion');
    var direccionAlert = document.getElementById('direccionAlert');

    if (direccion.value === "") {
        var direccionAlert = document.getElementById('direccionAlert');
        direccionAlert.style.visibility = "visible";
        direccion.style.borderColor = "#D11124";
        error[0] = true;
    }
    else {
        direccionAlert.style.visibility = "hidden";
        direccion.style.borderColor = "#000000";
    }
}