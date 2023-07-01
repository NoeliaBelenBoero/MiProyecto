<?php
/*@autor Marcelo Lofiego*/
class productos{
    
    protected $idProd;
    public $nombreProducto;
    public $imagen;
    public $descripcion;
    public $precio;
    public $categoria;
    private $exist = false;
            
    function __construct($idProd) {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        $resp = $db->select("productos", "IDproducto=?", array($idProd));
        if(isset($resp[0]['idProd'])){
            
            $this->idProd = $resp[0][$idProd];
            $this->nombreProducto = $resp[0]['NombrePoducto'];
            $this->imagen = $resp[0]['Imagen'];
            $this->descripcion = $resp[0]['Descripcion'];
            $this->precio = $resp[0]['Precio'];
            $this->categoria = $resp[0]['CategoriaID'];
            $this->exist = true;
            
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
        return $db->delete("productos", "IDproducto" . $this->idProd);
    }
    
    private function insertar() {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        $resp = $db->insert("productos", "NombreProducto=?", "Imagen=?", 
                "Descripcion=?", "Precio=?", "CategoriaID", "?,?,?,?", 
                array($this->nombreProducto, $this->imagen, $this->descripcion,
                $this->precio, $this->categoria));
        if($resp){
            $this->idProd = $resp;
            $this->exist = true;
            return true;
        } else {
            return false;
        }
    }
    
    private function actualizar() {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        return $db->update("productos", "NombreProducto=?", 
                "Imagen=?", "Descripcion=?", "Precio=?", "CategoriaID=?",
                "IDproducto=?",
                array($this->nombreProducto, $this->imagen,
                    $this->descripcion,
                $this->precio, $this->categoria, $this->idProd));
    }
    
    static public function listar() {
        $db = new database("mysql", "miproyecto", "localhost", "root", 
                "marc2023");
        return $db->select("productos");
    }
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

