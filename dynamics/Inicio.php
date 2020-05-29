<?php
//iniciando sesión
session_name("Coyocafe");
session_id("0026");
session_start();

  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  Barra_navegacion();

  if(isset($_SESSION['psw']))
  {
    //Botón de cerrar session
    echo
    "
      <form action='Cerrar_sesion.php' method='POST' id='cerrar_sesion'>
      <input type='submit' name='cerrar_sesion' value='cerrar_sesion'>
      </form>
    ";
  }
?>
