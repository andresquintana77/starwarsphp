<?php
/*
** Index Peliculas StarWars
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Star Wars Films</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
     <div style="display: none">Star Wars API</div>
     <div class="Ppal">
        <h1>The Protagonists</h1>
        <div class="content-all">
            <div class="content-carrousel">
                <figure><img src="image/image1.png"></figure>
                <figure><img src="image/image2.png"></figure>
                <figure><img src="image/image3.png"></figure>
                <figure><img src="image/image4.png"></figure>
                <figure><img src="image/image5.png"></figure>
                <figure><img src="image/image7.png"></figure>
            </div>
        
        </div>
      
         <br><br><br><br><br><br><br><br><br><br><br><br>
         
        <div class="content-peliculas">
            <form name="buscadorPeliculas" id="buscadorPeliculas" action="/StarWars/Vistas/resultadoBusqueda.php" method="post" >    
            
            <h2>Enter the title of the Star Wars movie</h2>
            <input type="textbox" name="titulo">
            <br>
            <button type="submit" name="submit">Buscar</button>
             
            </form>
             
        </div>
        
        <br><br>
        
        <div>
        
        <?php 
        include_once("vistas/historicoBusquedas.php");
        ?>
        
        </div>
        
    </div>           
</body>

</html>    