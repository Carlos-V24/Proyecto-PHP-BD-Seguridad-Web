<?php
session_name("Admin");
session_start();
  include_once "bd.php";
  include_once "Encrypt_PassW.php";
  include_once "Filtrar.php";
  if ($_POST['Admin']=='ADMIN' && isset($_POST['Admin'])){
  $Contraseña=Filtrar($_POST['psw']);
  $conexion=connectDB3("Coyocafe",$Contraseña);
  if(!$conexion) {
    echo "Contraseña incorrecta";
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }else {
    $_SESSION['Admin']='Admin';
    $_SESSION['psw']=$Contraseña;
    header("Location:Pedidos_clientes.php");
  }
}else {
  echo "Ese usuario no es el solicitado";
}
?>
