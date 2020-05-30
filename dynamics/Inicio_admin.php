<?php
session_name("Admin");
session_start();
if(!$_SESSION){
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  include_once "Cuest_form.php";
  include_once "bd.php";
  Barra_navegacion_empleados();
  echo "<form action='Inicio_admin_DB.php' method='POST'>";
  echo "<article>";
    echo "<section class='Encabezado'>";
    echo "<h1>Iniciar sesion<h1>";
    echo "</section>";
    echo "<section class='Cuestionario'>";
    Solicitar_Admin();
  Solicitar_Psw();
  echo "<input type='submit' class='Ingresar' Value='Ingresar'>";
    echo "<section>";
    echo "</article>";
    echo "</article>";
    include_once "Footer.php";
    Footer();
}
else {
  header("Location: Pedidos_clientes.php");
}
?>
