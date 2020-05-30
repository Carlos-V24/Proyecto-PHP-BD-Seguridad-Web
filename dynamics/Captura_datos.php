<?php
if((isset($_POST['NCuenta'])||isset($_POST['RFC'])||isset($_POST['NTrabajador'])) && isset($_POST['Nombre']) &&
  (isset($_POST['Grupo'])||isset($_POST['Colegio'])||isset($_POST['Extra'])) && isset($_POST['psw']) &&
  isset($_POST['psw-repeat']) && isset($_POST['ApellidoP']) && isset($_POST['ApellidoM'])) {
    include_once "Encrypt_PassW.php";
    include_once "Filtrar.php";
    $RFCRequerimientos=0;
    $Errores=0;
    //////////////////////////////Nombre//////////////////////////////////

    if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+( +[A-Za-zÑñÁÉÍÓÚáéíóú]+|) */', $_POST['Nombre'])) {
      $RFCRequerimientos++;
      $Nombre= Filtrar($_POST['Nombre']);
    }else {
      $Errores++;
      setcookie("ERROR","005", time()+2);
      header("Location: Registrate.php");
    }
    //////////////////////////////Apellido Paterno/////////////////////////////////
    if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+ */', $_POST['ApellidoP'])) {
      $RFCRequerimientos++;
      $ApellidoP= Filtrar($_POST['ApellidoP']);
    }else {
      $Errores++;
      setcookie("ERROR","005", time()+2);
      header("Location: Registrate.php");
    }
    //////////////////////////////Apellido Materno/////////////////////////////////
    if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+ */', $_POST['ApellidoM'])) {
      $RFCRequerimientos++;
      $ApellidoM= Filtrar($_POST['ApellidoM']);
    }else {
      $Errores++;
      setcookie("ERROR","005", time()+2);
      header("Location: Registrate.php");
    }
  ////////////////////Usuario(N°Cuenta, RFC o N°Trabajador)//////////////////////////
  if( isset($_POST['NCuenta']) && preg_match('/^3(1[6-9]|2[0-2])\d{6}$/', $_POST['NCuenta'])) {
    $Usuario=Filtrar($_POST['NCuenta']);
  }elseif (isset($_POST['RFC']) && preg_match('/^[A-Z]{4}\d{2}(0[1-9]|1[0-2])([0-3]1|[0-2][1-9])[A-Z\d]{3}$/', $_POST['RFC']) && $RFCRequerimientos==3) {
      $RFCComponentes[]= substr(strtoupper($_POST['ApellidoP']), 0, 2);
      $RFCComponentes[]= substr(strtoupper($_POST['ApellidoM']), 0, 1);
      $RFCComponentes[]= substr(strtoupper($_POST['Nombre']), 0, 1);
      $RFCComponentes = implode($RFCComponentes);
      if (!($RFCComponentes == substr($_POST['RFC'], 0, 4))) {
        echo "Dato Invalido: RFC<br>";
        $Errores++;
      }else {
        $Usuario=$_POST['RFC'];
      }
  }elseif ($_POST['NTrabajador'] && preg_match('/^\d{6}$/', $_POST['NTrabajador'])) {
    $Usuario=Filtrar($_POST['NTrabajador']);
  }else {
    $Errores++;
    setcookie("ERROR","005", time()+2);
    header("Location: Registrate.php");
  }
  ///////////////////////////Contrseña/////////////////////////////////
  if ($_POST['psw']==$_POST['psw-repeat'] &&
      preg_match('/^(?=[\w!#$@%&*^+-]*\d)(?=[\w!#$@%&*^+-]*[A-Z])(?=[\w!#@$%&*^+-]*[a-z])(?=[\w!#$%&*^+@-]*[!#$%&*@^+-])\S{8,100}$/', $_POST['psw']) &&
      preg_match('/^(?=[\w!#$@%&*^+-]*\d)(?=[\w!#$@%&*^+-]*[A-Z])(?=[\w!#@$%&*^+-]*[a-z])(?=[\w!#$%&*^+@-]*[!#$%&*@^+-])\S{8,100}$/', $_POST['psw-repeat'])){
        $Contraseña = Filtrar($_POST['psw']);
        $Contraseña = Cifrar($Contraseña);//Cifras la contraseña
  }else{
    echo $_POST['psw']."<br>";
    echo $_POST['psw-repeat']."<br>";
    setcookie("ERROR_psw","006", time()+2);
    header("Location: Registrate.php");
    $Errores++;
  }
  /////////////////////////Grupo, Colegio o Extra/////////////////////////////
  if (isset($_POST['Grupo']) && $_POST['Grupo']>=1 && $_POST['Grupo']<=98) {
    $Extra=Filtrar($_POST['Grupo']);
  }elseif(isset($_POST['Colegio']) && $_POST['Colegio']>=99 && $_POST['Colegio']<=123){
    $Extra=Filtrar($_POST['Colegio']);
  }elseif (isset($_POST['Extra']) && $_POST['Extra']==("Trabajador"||"Funcionario")) {
    if ($_POST['Extra']=="Trabajador") {
      $Extra=124;
    }elseif ($_POST['Extra']=="Funcionario") {
      $Extra=125;
    }
  }else {
    setcookie("ERROR","005", time()+2);
    header("Location: Registrate.php");
    $Errores++;
  }
  ////////////////////////////////Insercion de datos///////////////////////////////////////////
  if ($Errores==0) {
    include_once "bd.php";
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
    $consulta = "SELECT id_cliente FROM Cliente";
    $ListUs = mysqli_query($conexion, $consulta);
    $Usuario_existen=false;
    while($row = mysqli_fetch_array($ListUs)){
      if ($row['id_cliente']==$Usuario){
        $Usuario_existen=true;
      }
    }
    if ($Usuario_existen==true) {
      echo "Usuario ya exitente<br>";
    }elseif ($Usuario_existen==false ) {
      $consulta = "INSERT INTO Cliente VALUES ('$Usuario','$Extra','$Nombre','$Contraseña','$ApellidoP','$ApellidoM')";
      mysqli_query($conexion, $consulta);
      //Una vez finalizados los procedimientos se cierra la conexion con la base
      mysqli_close($conexion);
      header("Location: ../dynamics/Inicio_sesion.php");
    }
    echo $Contraseña."<br>";
    echo $Usuario."<br>";
    echo $ApellidoP."<br>";
    echo $ApellidoM."<br>";
    echo $Nombre."<br>";
    echo $Extra."<br>";
  }
}else {
  setcookie("ERROR","001", time()+2);
  header("Location: Registrate.php");
}
?>
