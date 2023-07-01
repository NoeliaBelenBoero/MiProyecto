<?php

include '../class/autoload.php';

if (isset($_POST['accion']) && $_POST['accion'] == 'guardar'){
    $miProducto = new productos();
    $miProducto->nombreProducto = $_POST['NombreProducto'];
    $miProducto->imagen = $_POST['Imagen'];
    $miProducto->descripcion = $_POST['Descripcion'];
    $miProducto->precio = $_POST['Precio'];
    $miProducto->categoria = $_POST['CategoriaID'];
    $miProducto->guardar();
} else  if (isset ($_GET['add'])){
    include 'views/productos.html';
    die();
}

$lista_pdt = productos::listar();
include 'views/lista_productos.php';

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

