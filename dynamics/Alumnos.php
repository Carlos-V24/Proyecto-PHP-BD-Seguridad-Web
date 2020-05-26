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
            Solicitar_NCuent();
            Solicitar_Nom();
            Solicitar_Apell_P();
            Solicitar_Apell_M();
    //Conexion con la base de datos
            $conexion=connectDB2("coyocafe");
            if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
    echo "  <label for='Grupo'><b>Grupo</b></label>
            <select id='Grupo' name='Grupo'>";
            echo "<option value='' >--Seleccione una opción--</option>";
            //Solicita todos los grupos
            $consulta = "SELECT id_extra_clie,Extra FROM extra_cliente WHERE id_tipo_clie='1'";
            $respuesta = mysqli_query($conexion, $consulta);
            while($row = mysqli_fetch_array($respuesta)){
              echo "<option value=".$row['id_extra_clie'].">".$row['Extra']."</option>";
            }
    echo " </select><br><br>";
            Solicitar_Psw();
            Solicitar_Psw_Rpt();
    echo "  <div class='clearfix'>
              <button type='submit' class='signupbtn'>Sign Up</button>
              </div>";
    echo "</div>";
?>
