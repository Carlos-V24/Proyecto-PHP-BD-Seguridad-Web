<?php
//función para filtrar texto
function Filtrar ($texto){
  strip_tags($texto);//Elimina posibles etiquetas
  htmlentities($texto);//Elimina posibles caracteres especiales
  return$texto;
}

?>
