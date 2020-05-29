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
    echo "<form action='Alumnos.php' style='border:1px solid #ccc; max-width: 50%; ' >
          <button type='submit'>Alumno</button>
          </form>";
    echo "<form action='Profesor.php' style='border:1px solid #ccc; max-width: 50%; ' >
          <button type='submit'>Empleado</button>
          </form>";
    echo "<section>";
    echo "</article>";
?>
