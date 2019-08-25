<?php

/*Consultas dirigidas a SWAPI*/

class Buscador
{
	public function ConsultarPeliculas($titulo)
    {
       $url = "https://swapi.co/api/films/?format=json";
       $res = file_get_contents($url);
       $datos = json_decode($res, true);   
       $numero_items = $datos["count"];
       $i = 0;
       $result = false;
       
       while($i < $numero_items)
       {
          if(strtolower($datos["results"][$i]["title"]) == strtolower($titulo))
          {
             $result["titulo"] = $datos["results"][$i]["title"];
             $result["episodio"] = $datos["results"][$i]["episode_id"];
             $result["sinopsis"] = $datos["results"][$i]["opening_crawl"];
             $result["director"] = $datos["results"][$i]["director"];
             $result["productor"] = $datos["results"][$i]["producer"];
             $result["estreno"] = $datos["results"][$i]["release_date"];
             $result["planetas"] = $this::ConsultarPlanetas($datos["results"][$i]["planets"]);
             $result["naves"] = $this::ConsultarNaves($datos["results"][$i]["starships"]);
             $result["vehiculos"] = $this::ConsultarVehiculos($datos["results"][$i]["vehicles"]);
             $result["personajes"] = $this::ConsultarPersonajes($datos["results"][$i]["characters"]);
             $result["especies"] = $this::ConsultarEspecies($datos["results"][$i]["species"]);
             $i = $numero_items;
          }
          else
            $i++;
        }
        
        return $result; 
     }
     
     public function ConsultarPlanetas($planetas)
     {
         $numero_items = count($planetas);
         
         if($numero_items == 0)
         {
              return false;
         }
         else
         {
             $i = 0;
             while($i < $numero_items)
             {
                  $url = $planetas[$i] . "?format=json";
                  $res = file_get_contents($url);
                  $datos = json_decode($res, true);
                   
                  
                  $result[$i]["nombre"] = $datos["name"];
                  $result[$i]["clima"] = $datos["climate"];
                  $result[$i]["gravedad"] = $datos["gravity"];
                  $i++;
              }
          
              return $result;
         } 
      }
      
    public function ConsultarPersonajes($personajes)
     {
         $numero_items = count($personajes);
         
         if($numero_items == 0)
         {
              return false;
         }
         else
         {
             $i = 0;
             while($i < $numero_items)
             {
                  $url = $personajes[$i] . "?format=json";
                  $res = file_get_contents($url);
                  $datos = json_decode($res, true);
                   
                  
                  $result[$i]["nombre"] = $datos["name"];
                  $i++;
              }
          
              return $result;
         } 
      } 
      
     public function ConsultarNaves($naves)
     {
         $numero_items = count($naves);
         
         if($numero_items == 0)
         {
              return false;
         }
         else
         {
             $i = 0;
             while($i < $numero_items)
             {
                  $url = $naves[$i] . "?format=json";
                  $res = file_get_contents($url);
                  $datos = json_decode($res, true);
                   
                  
                  $result[$i]["nombre"] = $datos["name"];
                  $result[$i]["modelo"] = $datos["model"];
                  $result[$i]["capacidad"] = $datos["cargo_capacity"];
                  $result[$i]["velocidad_max"] = $datos["max_atmosphering_speed"];
                  $i++;
              }
          
              return $result;
         } 
      }
      
     public function ConsultarVehiculos($vehiculos)
     {
         $numero_items = count($vehiculos);
         
         if($numero_items == 0)
         {
              return false;
         }
         else
         {
             $i = 0;
             while($i < $numero_items)
             {
                  $url = $vehiculos[$i] . "?format=json";
                  $res = file_get_contents($url);
                  $datos = json_decode($res, true);
                   
                  
                  $result[$i]["nombre"] = $datos["name"];
                  $result[$i]["modelo"] = $datos["model"];
                  $i++;
              }
          
              return $result;
         } 
      }
      
     public function ConsultarEspecies($especies)
     {
         $numero_items = count($especies);
         
         if($numero_items == 0)
         {
              return false;
         }
         else
         {
             $i = 0;
             while($i < $numero_items)
             {
                  $url = $especies[$i] . "?format=json";
                  $res = file_get_contents($url);
                  $datos = json_decode($res, true);
                   
                  
                  $result[$i]["nombre"] = $datos["name"];
                  $result[$i]["clasificacion"] = $datos["classification"];
                  $i++;
              }
          
              return $result;
         } 
       } 
}

?>