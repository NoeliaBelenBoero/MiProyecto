<?php
  
   $conex = mysqli_connect('localhost', 'root', 'marc2023', 'miproyecto');

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Lista de productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/estilos.css">
        <link rel="stylesheet" href="../../assets/css/estilos1.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.
              0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+
              K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
              crossorigin="anonymous">
    </head>
    <body>
    <center>    
        <div class="productos">
            <h1>Lista de productos</h1><br><br>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Categoria ID</th>
                    </tr>
                </thead>
                <tbody>
                      <?php
                       $sql = "SELECT * from productos";
                       $result = mysqli_query($conex, $sql);
              
                       while ($mostrar=mysqli_fetch_array($result)){
                    ?>
            
                    <tr>
                       <td><?php echo $mostrar['IDproducto'] ?></td>
                       <td><?php echo $mostrar['NombreProducto'] ?></td>
                       <td class="img_1"><img  src="data:image/jpg;base64,
                       <?php echo base64_encode($mostrar['Imagen']); ?>"/></td>
                       <td><?php echo $mostrar['Descripcion'] ?></td>
                       <td><?php echo $mostrar['Precio'] ?></td>
                       <td><?php echo $mostrar['CategoriaID'] ?></td>
                    </tr>
                     <?php
                     }
                     ?> 
                </tbody>
            </table><br><br><br>
            <a href="../productos.php?add">Agregar</a>
            <br><br><br>
            <h2>Marcelo Lofiego</h2>
        </div>
    </center>    
    </body>
</html>

