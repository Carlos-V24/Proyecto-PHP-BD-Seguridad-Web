<?php
//iniciando sesión
session_start();
//solo si se presiona se cierra session y se redirige a la página principal
if(isset($_POST['cerrar_sesion']))
{
  session_unset();
  session_destroy();
  header("Location: Inicio.php");
}else {
  echo "No se pudo cerrar sesion";
}

?>
