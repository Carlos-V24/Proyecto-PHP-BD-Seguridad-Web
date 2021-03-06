<?php
//inicio de seción para los alumnos
session_start();
if(! isset($_SESSION['psw']))
{
  //se incluyen estilos
  include_once "Func_favicon.php";
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
echo "<meta charset='utf-8'>";
//se incluyen funciones
    include_once "Barrara_navegacion.php";
    include_once "Cuest_form.php";
    include_once "bd.php";
    Barra_navegacion();

    //form de registro de alumnos
    echo "<form action='../dynamics/Captura_datos.php' method='POST'>";
    echo "<article class='Registro'>";
    echo "<section class='Encabezado'>";
    echo "<h1>Registro Alumno<h1>";
    echo "</section>";
    echo "<section>";
            //inputs que solicitan datos de los alumnos
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
    //elección de grupos que se encuentran dentro de la base de datos
    echo "  <label for='Grupo'><b>Grupo</b></label>
            <select id='Grupo' name='Grupo'>";
            echo "<option value='' >--Seleccione una opción--</option>";
            //Solicita todos los grupos
            $consulta = "SELECT id_extra_clie,Extra FROM extra_cliente WHERE id_tipo_clie='1'";
            $respuesta = mysqli_query($conexion, $consulta);
            while($row = mysqli_fetch_array($respuesta)){
              echo "<option value=".$row['id_extra_clie'].">".$row['Extra']."</option>";
            }
    echo " </select><br>";
            //registro de la contraseña
            Solicitar_Psw();
            Solicitar_Psw_Rpt();
    echo "<input type='submit' class='Ingresar' Value='Ingresar'><br><br><br><br>";
    echo "</section";
    echo "</article>";
    echo "</article>";
    include_once "Footer.php";
    Footer();
}else {
    header("Location: Inicio.php");
}
?>
