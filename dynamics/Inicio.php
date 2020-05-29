<?php
//iniciando sesión
session_start();
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  Barra_navegacion();

  if(isset($_SESSION['psw']))
  {
    if ($_SESSION['Extra']>=1 && $_SESSION['Extra']<=98) {
      echo "Bienevenido Alumno: ".$_SESSION['Nombre'];
    }elseif ($_SESSION['Extra']>=99 && $_SESSION['Extra']<=123) {
      echo "Bienevenido Profesor: ".$_SESSION['ApellidoP'];
    }elseif ($_SESSION['Extra']==124) {
      echo "Bienevenido Funcionario: ".$_SESSION['Nombre']." ".$_SESSION['ApellidoP'];
    }
    elseif ($_SESSION['Extra']==125) {
      echo "Bienevenido Trabajador: ".$_SESSION['Nombre']." ".$_SESSION['ApellidoP'];
    }else {
      echo "Bienevenido Alumno: ".$_SESSION['Nombre'];
    }
  }else {
    echo "No";
  }
?>
