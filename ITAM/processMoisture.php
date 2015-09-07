<?php
//Archivo processMoisture.php
$humedad=$lect->h;
	if($humedad < 450){
       $descripcion = "Suelo Inundado";
  } else if($humedad < 700){
       $descripcion = "Suelo Humedo";
  } else if($humedad < 1021){
       $descripcion = "Suelo Seco";
  } else {
    $descripcion = "El sensor esta fuera de la tierra";
  }
?>
