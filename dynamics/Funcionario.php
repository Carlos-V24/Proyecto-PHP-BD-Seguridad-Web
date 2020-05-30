<?php
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
    echo "<article class='Registro'>";
    echo "<section class='Encabezado'>";
    echo "<h1>Registro Profesor<h1>";
    echo "</section>";
    echo "<form action='../dynamics/Captura_datos.php' method='POST' >";
    echo "<section>";
            Solicitar_RFC();
            Solicitar_Nom();
            Solicitar_Apell_P();
            Solicitar_Apell_M();
    echo "  <input type='hidden' name='Extra' value='Funcionario'>";
            Solicitar_Psw();
            Solicitar_Psw_Rpt();
    echo "<input type='submit' class='Ingresar' Value='Ingresar'><br><br><br><br>";
    echo "</section";
    echo "</article>";
}else {
    header("Location: Inicio.php");
}
?>
