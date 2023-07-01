<?php
/*@autor Marcelo Lofiego*/
    
    /*Conexión a base de datos*/
    /*function conectarDB(){*/
       $servidor="localhost";
       $usuario="root";
       $clave="marc2023";
       try{
           $conexion = new PDO("mysql:host=$servidor;dbname=miproyecto", 
                   $usuario,$clave);
           $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"Conexión realizada con exito";
         }catch (PDOException $e){
            echo 'La conexion ha fallado'.$e->getMessage();
        }
      /*$conexion = null;*/
        
    /*}*/
    class database{
        
        private $gdb;
        
        function __construct($driver, $base_datos, $host, $usuario, $clave) {
            $cnx=$driver.":dbname=".$base_datos.";host=$host";
            $this->gdb = new PDO($cnx, $usuario, $clave);
            if(!$this->gdb){
                throw new Exception("No se ha podido realizar la conexión");
            }
        }


        function insert($tabla, $campos, $valores, $arr_prepare = null){
            $sql = "INSERT INTO" . $tabla . "(" . $campos . ") "
                    . "VALUES ($valores)";
            
            $resource = $this->gdb->prepare($sql);
            $resource->execute($arr_prepare);
            if ($resource) {
                return $this->gdb->lastInsertId();
            } else {
                echo '<pre>';
                print_r($resource->errorInfo());
                echo '</pre>';
                throw new Exception("No se pudo realizar la inserción "
                        . "del registro");
            }
        }
    
       function update($tabla, $campos, $filtros, $arr_prepare = null){
           $sql = "UPDATE" . $tabla . "SET" .$campos . "WHERE" . $filtros;
           
           $resource = $this->gdb->prepare($sql);
           $resource->execute($arr_prepare);
           if ($resource) {
               return true;
           } else {
               echo '<pre>';
               print_r($resource->errorInfo());
               echo '</pre>';
               throw new Exception("No se pudo actualizar el registro "
                       . "correctamente");
           }
       }
    
       function delete($tabla, $filtros = null, $arr_prepare = null){
           $sql = "DELETE FROM".$tabla . "WHERE" . $filtros;
           
           $resource = $this->gdb->prepare($sql);
           $resource->execute($arr_prepare);
           if ($resource) {
               return true;
           } else {
               throw new Exception("No se pudo eliminar el registro");
           }
       }
    
       function select($tabla, $filtros = null, $arr_prepare=null, $orden=null, 
               $limit=null){
                     $sql = "SELECT * FROM".$tabla;
                     if($filtros != null){
                         $sql.="WHERE".$filtros;
                     }
                     if($orden != null){
                         $sql.="ORDER BY".$orden;
                     }
                     if($limit != null){
                         $sql.="LIMIT".$limit;
                     }
                     $resource = $this->gdb->prepare($sql);
                     $resource->execute($arr_prepare);
                     if($resource){
                         return $resource->fetchAll(PDO::FETCH_ASSOC);
                     } else {
                         throw new Exception("No se pudo realizar la consulta"
                                 . "de selección");
                     }
                     
        }
    }
       






































/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

