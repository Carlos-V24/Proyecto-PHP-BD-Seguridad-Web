<?php
//iniciando sesión
//colo el mapa para referencia de puntos de entregas
session_start();
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  Barra_navegacion();
  echo "<img style='margin-left: 150px; margin-right: 150px; margin-top:50px;'src='../statics/img/Mapa.png' alt='Mapa' width='1200'>";
  include_once "Footer.php";
  Footer();
?>
