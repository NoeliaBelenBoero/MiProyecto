<?php
/*@autor Marcelo Lofiego*/

class autoload {
    static public function cargar_clase($clase) {
        $arrayClases = array();
        $base = __DIR__.DIRECTORY_SEPARATOR;
        $arrayClases['database'] = $base.'database.php';
        $arrayClases['categorias'] = $base.'categorias.php';
        $arrayClases['productos'] = $base.'productos.php';
        
        if (isset($arrayClases[$clase])) {
            if (file_exists($arrayClases[$clase])) {
                include $arrayClases[$clase];
            } else {
                throw new Exception("Archivo de clase no encontrada"
                        . "[{$arrayClases[$clase]}]");
            }
        }
    }
}
spl_autoload_register('autoload::cargar_clase');

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

