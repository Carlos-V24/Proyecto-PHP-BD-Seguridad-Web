<?php
//Comprueba que la sesion usuario este abiertea
session_start();
if(! isset($_SESSION['Usuario']))
{
  //Incluye los estilos y el icono de la pestaña
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
  //se agreagan algunas funciones para el cuestionario
    include_once "Cuest_form.php";
    include_once "Barrara_navegacion.php";
    include_once "bd.php";
    Barra_navegacion();
    //comienza el cuestionario
    echo "<article class='Registro'>";
    echo "  <section class='Encabezado'>";
    echo "    <h1>Registro Profesor<h1>";
    echo "  </section>";
    echo "  <form action='../dynamics/Captura_datos.php' method='POST'>";//vincula con captura de datos
    echo "  <section>";
              Solicitar_NTrab();//input del N de trabajador
              Solicitar_Nom();//input del nombre
              Solicitar_Apell_P();//input del apellido aterno
              Solicitar_Apell_M();//input apellido materno
    echo "    <input type='hidden' name='Extra' value='Trabajador'>";
              Solicitar_Psw();//solicita la contraseña
              Solicitar_Psw_Rpt();//solicita la contraseña denuevo pero tiene name distinto
    echo "    <input type='submit' class='Ingresar' Value='Ingresar'><br><br><br><br>";
    echo "  </section";
    echo "</article>";
    echo "</article>";
    include_once "Footer.php";
    Footer();
}
else {
    //si la session esta activada te manda al inicio
    header("Location: Inicio.php");
}
