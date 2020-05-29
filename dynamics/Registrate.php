<?php
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "Cuest_form.php";
    Barra_navegacion();
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
?>
