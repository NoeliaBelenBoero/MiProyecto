/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$(document).ready(function(){
    alert("La página está lista para ser utilizada");
});

// validación del formulario de categorias
$("#cancelar_categoria").click(function(){
   alert($(this).html()); 
});

$("#formulario_categorias").submit(function(){
    var idCategoria = $("#id_categoria").val();
    var nombreCategoria = $("#nombre_categoria").val();
    var errores = [];
    if($.trim(idCategoria) === ""){
        errores.push("*ID de la categoria");
    }
    if($.trim(nombreCategoria) === ""){
        errores.push("*Nombre de la categoria");
    }
    if(errores.length > 0){
        errores.push("\nMarcelo Lofiego");
        alert(errores.join("\n"));
        return false;
    } else {
        return true;
    }
});

// validación del formulario de productos
$("#cancelar_producto").click(function(){
   alert($(this).html()); 
});

$("#formulario_productos").submit(function(){
    var idProducto = $("#id_producto").val();
    var nombreProducto = $("#nombre_producto").val();
    var imagen = $("#imagen").val();
    var descripcion = $("#descripcion").val();
    var precio = $("#precio").val();
    var categoria = $("#categoria").val();
    var errores = [];
    if($.trim(idProducto) === ""){
        errores.push("*ID del producto");
    }
    if($.trim(nombreProducto) === ""){
        errores.push("*Nombre del producto");
    }
    if($.trim(imagen) === ""){
        errores.push("*Imagen");
    }
    if($.trim(descripcion) === ""){
        errores.push("*Descripción");
    }
    if($.trim(precio) === ""){
        errores.push("*Precio");
    }
    if($.trim(categoria) === ""){
        errores.push("*Categoria");
    }
    if(errores.length > 0){
        errores.push("\nMarcelo Lofiego");
        alert(errores.join("\n"));
        return false;
    } else {
        return true;
    }
});
