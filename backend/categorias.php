<?php

include '../class/autoload.php';

if (isset($_POST['accion']) && $_POST['accion'] == 'guardar'){
    $miCategoria = new categorias();
    $miCategoria->nombreCategoria = $_POST['NombreCategoria'];
    $miCategoria->guardar();
} else  if (isset ($_GET['add'])){
    include 'views/categorias.html';
    die();
}

$lista_ctg = categorias::listar();
include 'views/lista_categorias.php';

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

