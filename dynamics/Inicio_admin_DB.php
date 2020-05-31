<?php
session_name("Admin");
session_start();
  include_once "bd.php";
  include_once "Encrypt_PassW.php";
  include_once "Filtrar.php";
  if ($_POST['Admin']=='Admin' && isset($_POST['Admin'])){
  $Contraseña=Filtrar($_POST['psw']);
  $conexion=connectDB2("Coyocafe");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }else {
    $consulta = "SELECT Contraseña FROM Admin WHERE Usuario='Admin'";
    $ContraseñaBD = mysqli_query($conexion, $consulta);
    //Transforma de objeto a la contraseña
    $ContraseñaBD = mysqli_fetch_row($ContraseñaBD);
    $ContraseñaBD = $ContraseñaBD[0];
    echo $ContraseñaBD;
    if ($Contraseña == $ContraseñaBD) {
      $_SESSION['Admin']='Admin';
      $_SESSION['psw']=$Contraseña;
      header("Location:Pedidos_clientes.php");
    }else {
      setcookie("ERROR","010", time()+2);
      header("Location:Inicio_admin.php");
    }

  }
}else {
  setcookie("ERROR","09", time()+2);
  header("Location:Inicio_admin.php");
}
?>
