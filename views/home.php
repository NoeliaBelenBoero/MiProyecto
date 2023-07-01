<?php

   $conex = mysqli_connect('localhost', 'root', 'marc2023', 'miproyecto');

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/estilos_home.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.
              0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+
              K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
              crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous">
        </script>
    </head>
    <header>
        <div class="caja">
            <img class="logo" src="../../assets/img/logo_empresa.png" alt="alt"/>
             <h3>CompuSpace</h3>
             <nav>
                 <ul>
                     <li><a href="#productos">Productos</a></li>
                     <li><a href="#nosotros">Nosotros</a></li>
                     <li><a href="#contactos">Contactos</a></li>
                 </ul>
             </nav>
        </div>
             
    </header>
    <main>
        <body>
            <section id="banner">
                <div class="promo">
                    <h1>Julio Promocional</h1>
                    <h2>Productos seleccionados con 33% de descuento</h2>
                </div>
                <video muted autoplay loop>
                    <source src="../../assets/img/video1.mp4" type="video/mp4">
                </video>
                <div class="capa"></div>
            </section>
            <h4>Nuestros Productos</h4><br>
            <section id="productos">
                <?php
                       $sql = "SELECT * from productos";
                       $result = mysqli_query($conex, $sql);
                       
                       $sql1 = "SELECT * from categorias";
                       $result1 = mysqli_query($conex, $sql1);
                    
                       while ($mostrar1=mysqli_fetch_array($result1)){
                    ?>
                       
                       <?php
                       
                       
                        while ($mostrar=mysqli_fetch_array($result)){
                       ?>
                       <img  src="data:image/jpg;base64,
                       <?php echo base64_encode($mostrar['Imagen']); ?>"/><br>
                       <?php echo $mostrar['NombreProducto'] ?><br>
                       <?php echo $mostrar['Descripcion'] ?><br>
                       <?php echo $mostrar['CategoriaID'] ?><br>
                       
                      
                     <?php
                     
                     }
                    
                   }
               
                ?>       
            </section>
            <section id="nosotros">
                <h4>Nosotros</h4>
                <p>freestar Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Vestibulum sit amet diam commodo, pellentesque enim ut, sollicitudin metus. 
                    Donec nisl ante, pharetra quis ornare aliquet, efficitur sed odio. Nullam 
                    condimentum ipsum sed orci sodales, non tristique nulla vulputate.
                    Aliquam viverra sapien sed posuere condimentum. In tempus, sem id mollis luctus, 
                    dolor odio egestas ante, id congue lectus orci et lacus. Integer non placerat mi.
                    Vivamus id dapibus libero, nec placerat augue. Curabitur ullamcorper elementum 
                    ligula, a ultricies sem volutpat et. Etiam hendrerit nisl eget odio tristique 
                    dapibus. Nam congue enim orci, vitae vestibulum augue imperdiet sit amet.
                    Nam vitae gravida lectus. Ut ut nibh ut libero vulputate vulputate vitae ac dui. 
                    Quisque eu augue porttitor, molestie nisl at, gravida sem. Suspendisse euismod nunc
                    nisi, vel dignissim massa fermentum vel.Integer sit amet placerat lacus. 
                    Morbi id hendrerit massa, lacinia commodo nisi. Cras cursus justo a eros semper, 
                    rutrum feugiat mi interdum. Nam dignissim commodo sapien, eget laoreet sapien
                    rhoncus sed. Duis ac erat arcu. Etiam non elementum elit. Nulla vitae hendrerit 
                    mauris, sed consectetur turpis. Phasellus eget diam consequat sapien laoreet 
                    volutpat nec ac ante. Morbi sed convallis nisi. Donec eu nisi vel dolor convallis
                    mollis. Quisque id fringilla ipsum. Integer volutpat ex nisi, vel efficitur ante 
                    dignissim a.
                </p>
            </section>
            <section id="contactos">
                <h4>Contactos</h4>
                <center>
                    <ul>
                        <li><a class="a1">Telefono de contacto : 223 455 665</a></li>
                      <li><a class="a1">Whatsapp : 223 455 665</a></li>
                      <li><a class="a1">compuspace@gmail.com</a></li>   
                    </ul><br><br><br>
                    <h5>Desarrollado por Marcelo Alejandro Lofiego &COPY; 2023</h5>
                </center>  
            </section>
    </main>     
    </body>
</html>



