"use strict";


window.addEventListener("load", function A(){

var producto = new Object();
producto = localStorage.getItem('producto');
CargarInfoProducto(producto);
});

function CargarInfoProducto(producto){
   var tituloProducto = document.getElementById('tituloProducto');
   var imagenProducto = document.getElementById('imagenProducto');
   var nombreProducto = document.getElementById('nombreProducto');
   
   tituloProducto.innerHTML = JSON.parse(producto).nombre;
   nombreProducto.value = JSON.parse(producto).nombre;
   imagenProducto.src = JSON.parse(producto).imagen;
   
}


