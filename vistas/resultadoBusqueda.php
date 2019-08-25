<?php

include_once("../modulos/Buscador.class.php");

session_start();
$cs = new Buscador();
$result = $cs->ConsultarPeliculas($_POST["titulo"]); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Star Wars Films</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
     <div class="Ppal">
        <h1>The Protagonists</h1>
        <div class="content-all">
            <div class="content-carrousel">
                <figure><img src="../image/image1.png"></figure>
                <figure><img src="../image/image2.png"></figure>
                <figure><img src="../image/image3.png"></figure>
                <figure><img src="../image/image4.png"></figure>
                <figure><img src="../image/image5.png"></figure>
                <figure><img src="../image/image7.png"></figure>
            </div>
        
        </div>
      
         <br><br><br><br><br><br><br><br><br><br><br><br>
         
         <?php
         
         if($result != null)
         {
             if(!Isset($_SESSION["count"]))
               $_SESSION["count"] = 0; 
             
             $_SESSION["historico"][$_SESSION["count"]] = $result["titulo"];
             $date = new DateTime("now"); 
             $hora = $date->format('H:i:s');
             $_SESSION["hora"][$_SESSION["count"]] = $hora; 
             $_SESSION["count"]++;
         ?>
         
         <h1><?php echo $result["titulo"]?></h1>
            <div class="content-peliculas">
            
                <table>
                
                <tr>
                    
                    <th class="info">Episode</th>               <th><?php echo $result["episodio"]?></th>
                
                </tr>
                <tr>
                
                    <th>Opening Crawl</th>                            <th><?php echo $result["sinopsis"]?></th>
                
                </tr>
                <tr>
                
                    <th>Director</th>                            <th><?php echo $result["director"]?></th>
                
                </tr>
                <tr>
                
                    <th>Producer</th>                           <th><?php echo $result["productor"]?></th>
                
                </tr>
                <tr>
                
                    <th>Release</th>                             <th><?php echo $result["estreno"]?></th>
                       
                </tr>
                
                </table>
                
                <?php if($result["planetas"] != false) {
                
                $items = count($result["planetas"]);
                $i = 0;
                
                ?>
                
                <br>
                
                <h1>Planets</h1>
                
                <br>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th> <th>Climate</th> <th>Gravity</th> 
                        </tr>
                    </thead>
                
                <?php 
                    while($i < $items)
                    {
                    ?>   
                        <tr>
                            <th><?php echo $result["planetas"][$i]["nombre"]?></th> <th><?php echo $result["planetas"][$i]["clima"]?></th> 
                            <th><?php echo $result["planetas"][$i]["gravedad"]?></th>
                        </tr>
                    <?php    
                        $i++;
                    }
                ?>    
                
                </table>
                
                <?php    
                
                }
                
                if($result["personajes"] != false) {
                
                $items = count($result["personajes"]);
                $i = 0;
                
                ?>
                
                <br>
                
                <h1>Characters</h1>
                
                <br>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th> 
                        </tr>
                    </thead>
                
                <?php 
                    while($i < $items)
                    {
                    ?>   
                        <tr>
                            <th><?php echo $result["personajes"][$i]["nombre"]?></th> 
                        </tr>
                    <?php    
                        $i++;
                    }
                ?>    
                
                </table>
                
                <?php    
                
                }
                
                if($result["naves"] != false) {
                
                $items = count($result["naves"]);
                $i = 0;
                
                ?>
                
                <br>
                
                <h1>Starships</h1>
                
                <br>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th> <th>Model</th> <th>Capacity</th> <th>Max Atmosphering Speed</th> 
                        </tr>
                    </thead>
                
                <?php 
                    while($i < $items)
                    {
                    ?>   
                        <tr>
                            <th><?php echo $result["naves"][$i]["nombre"]?></th> <th><?php echo $result["naves"][$i]["modelo"]?></th> 
                            <th><?php echo $result["naves"][$i]["capacidad"]?></th> <th><?php echo $result["naves"][$i]["velocidad_max"]?></th>
                        </tr>
                    <?php    
                        $i++;
                    }
                ?>    
                
                </table>
                
                <?php    
                
                }
                
                if($result["vehiculos"] != false) {
                
                $items = count($result["vehiculos"]);
                $i = 0;
                
                ?>
                
                <br>
                
                <h1>Vehicles</h1>
                
                <br>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th> <th>Model</th> 
                        </tr>
                    </thead>
                
                <?php 
                    while($i < $items)
                    {
                    ?>   
                        <tr>
                            <th><?php echo $result["vehiculos"][$i]["nombre"]?></th> 
                            <th><?php echo $result["vehiculos"][$i]["modelo"]?></th> 
                        </tr>
                    <?php    
                        $i++;
                    }
                ?>
                
                </table>
                
                <?php    
                
                }
                
                if($result["especies"] != false) {
                
                $items = count($result["especies"]);
                $i = 0;
                
                ?>
                
                <br>
                
                <h1>Species</h1>
                
                <br>
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th> <th>Classification</th>
                        </tr>
                    </thead>
                
                <?php 
                    while($i < $items)
                    {
                    ?>   
                        <tr>
                            <th><?php echo $result["especies"][$i]["nombre"]?></th> 
                            <th><?php echo $result["especies"][$i]["clasificacion"]?></th>
                        </tr>
                    <?php    
                        $i++;
                    }
                ?>
                
                </table>
            
            <?php
         
            }
                
                   
            ?>
          
          </div>
            
         <?php   
         }
         else
         {
         
         ?>
         
         <h1>No existe pelicula de Star Wars con dicho titulo</h1>
            <div class="content-peliculas">
                
                 
            </div>
            
        <?php
         }
         
        ?>
    
           <a href="../">VOLVER</a>
          
        </div>           
</body>

</html>