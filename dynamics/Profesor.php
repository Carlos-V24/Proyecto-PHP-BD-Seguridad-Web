<?php
//Verifica que la sesion no este activada
session_start();
if(! isset($_SESSION['Usuario']))
{
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  include_once "Cuest_form.php";
  include_once "bd.php";
  Barra_navegacion();
  echo "<article class='Registro'>";
  echo "  <section class='Encabezado'>";
  echo "    <h1>Registro Profesor<h1>";
  echo "  </section>";
  echo "  <section>";
  echo "    <form action='../dynamics/Captura_datos.php' method='POST' ";
              Solicitar_RFC();//solicita rfc
              Solicitar_Nom();//solicita nombre
              Solicitar_Apell_P();//solicita apellido paterno
              Solicitar_Apell_M();//solicita apellido materno
  //Conexion con la base de datos
  $conexion=connectDB2("coyocafe");
  //comprueba que la conexion haya funcionado
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }else{
  echo "  <label for='Colegio'><b>Colegio</b></label>
            <select id='Colegio' name='Colegio'>";
            echo "<option value='' >--Seleccione una opción--</option>";
          //Solicita todos los colegios
          $consulta = "SELECT id_extra_clie,Extra FROM extra_cliente WHERE id_tipo_clie='2'";
          $respuesta = mysqli_query($conexion, $consulta);
          while($row = mysqli_fetch_array($respuesta)){
            echo "<option value=".$row['id_extra_clie'].">".$row['Extra']."</option>";
          }
  echo "  </select><br><br>";
            Solicitar_Psw();//solicita contraseña
            Solicitar_Psw_Rpt();//contraseña para la verificacion
  echo "    <input type='submit' class='Ingresar' Value='Ingresar'><br><br><br><br>";
  echo "  </form>";
  echo "</section";
  echo "</article>";//la verdad no se porque 2, pero si quito uno queda mal el footer
  echo "</article>";
  }
  include_once "Footer.php";
  Footer();
}else {
  header("Location: Inicio.php");
}
?>
