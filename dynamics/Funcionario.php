<?php
echo "<link rel='stylesheet' href='../statics/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/Estilo_cuestionarios.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "Cuest_form.php";
    include_once "bd.php";
    Barra_navegacion();
    echo "<form action='../dynamics/Captura_datos.php' method='POST' style='border:1px solid #ccc; max-width: 50%; ' >";
    echo "<div class='container'>";
            Solicitar_RFC();
            Solicitar_Nom();
            Solicitar_Apell_P();
            Solicitar_Apell_M();
    echo "  <input type='hidden' name='Extra' value='Funcionario'>";
            Solicitar_Psw();
            Solicitar_Psw_Rpt();
    echo "  <div class='clearfix'>
              <button type='submit' class='signupbtn'>Sign Up</button>
              </div>";
    echo "</div>";
?>
