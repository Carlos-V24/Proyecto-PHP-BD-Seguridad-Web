<?php
session_start();
if (isset($_POST['Usuario']) && isset($_POST['psw'])) {
  include_once "bd.php";
  include_once "Encrypt_PassW.php";
  include_once "Filtrar.php";
  if (preg_match('/^([A-Z]{4}\d{2}(0[1-9]|1[0-2])([0-3]1|[0-2][1-9])[A-Z\d]{3}|3(1[6-9]|2[0-2])\d{6}|\d{6})$/', $_POST['Usuario']) &&
      preg_match('/^(?=[\w!#$@%&*^+-]*\d)(?=[\w!#$@%&*^+-]*[A-Z])(?=[\w!#@$%&*^+-]*[a-z])(?=[\w!#$%&*^+@-]*[!#$%&*@^+-])\S{8,100}$/', $_POST['psw'])) {
  $Usuario=Filtrar($_POST['Usuario']);
  $Contraseña=Filtrar($_POST['psw']);
  $conexion=connectDB2("coyocafe");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
  //Comparar $Usuario_existen
  $consulta = "SELECT id_cliente FROM Cliente";
  $ListUs = mysqli_query($conexion, $consulta);
  $Usuario_existen=false;
  while($row = mysqli_fetch_array($ListUs)){
    if ($row['id_cliente']==$Usuario){
      $Usuario_existen=true;
    }
  }
  if ($Usuario_existen==true) {
  $consulta = "SELECT Contraseña FROM Cliente WHERE id_cliente='$Usuario'";
  $ContraseñaBD = mysqli_query($conexion, $consulta);
  //Transforma de objeto a la contraseña
  $ContraseñaBD = mysqli_fetch_row($ContraseñaBD);
  $ContraseñaBD = $ContraseñaBD[0];
  $ContraseñaBD = Descifrar($ContraseñaBD);
  //Compara las contraseñas
  if ($ContraseñaBD===$Contraseña) {
    $consulta = "SELECT * FROM Cliente WHERE id_cliente='$Usuario'";
    $respuesta = mysqli_query($conexion, $consulta);
    while ($Datos=mysqli_fetch_array($respuesta)) {
      $Extra=$Datos['id_extra_clie'];
      $Nombre=$Datos['Nombre'];
      $ApellidoP=$Datos['ApellidoP'];
    }
    echo "Nice, sea bienvenido joven(Se inicia la sesion)";
    /*Aqui se inicia la sesiom*/
    $_SESSION['Extra']=$Extra;
    $_SESSION['Nombre']=$Nombre;
    $_SESSION['ApellidoP']=$ApellidoP;
    $_SESSION['Usuario']=$Usuario;
    $_SESSION['psw']=$Contraseña;
    header("Location: Inicio.php");
  }else {
    setcookie("ERROR","004", time()+2);
    header("Location: Inicio_sesion.php");
  }
}else {
  setcookie("ERROR","003", time()+2);
  header("Location: Inicio_sesion.php");
}
}else {
  setcookie("ERROR","002", time()+2);
  header("Location: Inicio_sesion.php");
}
}else {
  setcookie("ERROR","001", time()+2);
  header("Location: Inicio_sesion.php");
}
?>
