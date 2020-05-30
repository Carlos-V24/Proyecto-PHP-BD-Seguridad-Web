<?php
//iniciando sesión
session_start();
if(! isset($_SESSION['psw']))
{
    include_once "Func_favicon.php";
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "Cuest_form.php";
    Barra_navegacion();
    if (isset($_COOKIE['ERROR'])) {
      include_once "Tipos_errores.php";
      Error($_COOKIE['ERROR']);
    }if (isset($_COOKIE['ERROR_psw'])) {
      include_once "Tipos_errores.php";
      Error($_COOKIE['ERROR_psw']);
    }
    echo "<article>";
    echo "<section class='Encabezado'>";
    echo "<h1>Iniciar sesion<h1>";
    echo "</section>";
    echo "<section class='Cuestionario'>";
    echo "<form action='Alumnos.php'>
          <button type='submit'>Alumno</button>
          </form>";
    echo "<form action='Profesor.php'>
          <button type='submit'>Profesor</button>
          </form>";
    echo "<form action='Funcionario.php'' >
          <button type='submit'>Funcionario</button>
          </form>";
    echo "<form action='Trabajador.php'>
          <button type='submit'>Trabajador</button>
          </form>";
    echo "</section>";
    echo "</article>";
    include_once "Footer.php";
    Footer();
}
else {
    header("Location: Inicio.php");
}
?>
