<?php

session_start();
if(Isset($_SESSION["count"]))
{
    $i = 0;
?>
<h1>Search History</h1>
<br>
<table>
      <thead>
          <tr>
              <th>Movie title</th> <th class="hora">Query Time</th> 
          </tr>
      </thead>
  
  <?php 
      while($i < $_SESSION["count"])
      {
      ?>   
          <tr>
              <th><?php echo $_SESSION["historico"][$i];?></th> 
              <th><?php echo $_SESSION["hora"][$i];?></th>
          </tr>
      <?php    
          $i++;
      }
}
?>    
</table>




