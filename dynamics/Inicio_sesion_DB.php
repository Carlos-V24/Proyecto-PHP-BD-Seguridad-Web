<?php
if (isset($_POST['Usuario']) && isset($_POST['psw'])) {
  include_once "bd.php";
  include_once "Encrypt_PassW.php";
  include_once "Filtrar.php";
  if (preg_match('/^([A-Z]{4}\d{2}(0[1-9]|1[0-2])([0-3]1|[0-2][1-9])[A-Z\d]{3}|3(1[6-9]|2[0-2])\d{6}|\d{6})$/', $_POST['$Usuario']) &&
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
    echo "Nice, sea bienvenido joven(Se inicia la sesion)";
    /*Aqui se inicia la sesiom*/
    header("Location: ../templates/Inicio.html");
  }else {
    echo "<H1>FATAL ERROR: Sus contraseñas no coinciden<H1>";
  }
}else {
  echo "<H1>FATAL ERROR: Usuario inexistente<H1>";
}
}else {
  echo "Sus datos no coinciden con los establecidos";
}
}else {
  echo "Ha sucedidio un error, intenta denuevo";
}
?>
