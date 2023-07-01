<?php
/*@autor Marcelo Lofiego*/

class categorias{
    
    protected $idCate;
    public $nombreCategoria;
    private $exist;
            
    function __construct($idCate) {
        if ($idCate != null){
            $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
            $resp = $db->select("categorias", "IDcategoria=?", array($idCate));
            if(isset($resp[0]['IDcategoria'])){
            
                $this->idCate = $resp[0]['IDcategoria'];
                $this->nombreCategoria = $resp[0]['NombreCategoria'];
                $this->exist = true;
            
            }
        }
        
    }
    
    public function mostrar() {
        echo '<pre>';
        print_r($this);
        echo '</pre>';
    }
    
    public function guardar(){
         if ($this->exist){
            return $this->actualizar();
        } else {
            return $this->insertar();
        }
    }
    
    public function eliminar(){
         $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        return $db->delete("categorias", "IDcategoria" . $this->idCate);
    }
    
    private function insertar() {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        $resp = $db->insert("categorias", "NombreCategoria=?", "?", 
                array($this->nombreCategoria));
        if($resp){
            $this->idCate = $resp;
            $this->exist = true;
            return true;
        } else {
            return false;
        }
    }
    
     private function actualizar() {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        return $db->update("categorias", "NombreCategoria=?", "IDcategoria=?", 
                array($this->nombreCategoria ,$this->idCate));
    }
    
    static public function listar() {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        return $db->select("categorias");
    }
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

