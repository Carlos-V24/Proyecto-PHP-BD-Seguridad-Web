<?php
session_start();

if(! isset($_SESSION['psw']))
{
  echo "<link rel='stylesheet' href='../statics/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  include_once "Cuest_form.php";
  include_once "bd.php";
  Barra_navegacion();
  echo "<form action='Inicio_sesion_DB.php' method='POST' style='border:1px solid #ccc; max-width: 50%; ' >";
  echo "<div class='container'>";
  Solicitar_Usu();
  Solicitar_Psw();
  echo "  <div class='clearfix'>
  <button type='submit' class='signupbtn'>Sign Up</button>
  </div>";
  echo "</div>";

  $_SESSION['psw'] = (isset($_POST['psw']) && $_POST['psw'] != NULL)? $_POST['psw'] : "No hay contraseña";
}
else {
  header(Inicio.php);
}
?>
