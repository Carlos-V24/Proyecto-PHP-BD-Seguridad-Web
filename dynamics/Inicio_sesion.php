<?php
//iniciando sesión
session_start();
if(! isset($_SESSION['psw']))
{
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  include_once "Cuest_form.php";
  include_once "bd.php";
  Barra_navegacion();
  echo "<form action='Inicio_sesion_DB.php' method='POST'>";
  echo "<article>";
    echo "<section class='Encabezado'>";
    echo "<h1>Iniciar sesion<h1>";
    echo "</section>";
    echo "<section class='Cuestionario'>";;
  Solicitar_Usu();
  Solicitar_Psw();
  echo "<input type='submit' class='Ingresar' Value='Ingresar'>";
    echo "<section>";
    echo "</article>";
}
else {
  header("Location: Inicio.php");
}
?>
