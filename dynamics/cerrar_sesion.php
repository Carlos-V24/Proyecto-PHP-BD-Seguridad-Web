<?php
//iniciando sesión
session_name("Coyocafe");
session_id("0026");
session_start();
//solo si se presiona se cierra session y se redirige a la página principal
if(isset($_POST['cerrar_sesion']))
{
  echo "hola";
  session_unset();
  session_destroy();
  header("Location: Inicio.php");
}

?>
