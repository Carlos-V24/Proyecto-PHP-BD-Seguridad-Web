<?php
if((isset($_POST['NCuenta'])||isset($_POST['RFC'])) && isset($_POST['Nombre']) &&
  (isset($_POST['Grupo'])||isset($_POST['Colegio'])) && isset($_POST['psw']) &&
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
      echo "Dato Invalido: Nombre<br>";
      $Errores++;
    }
    //////////////////////////////Apellido Paterno/////////////////////////////////
    if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+ */', $_POST['ApellidoP'])) {
      $RFCRequerimientos++;
      $ApellidoP= Filtrar($_POST['ApellidoP']);
    }else {
      echo "Dato Invalido: Apellido Paterno<br>";
      $Errores++;
    }
    //////////////////////////////Apellido Materno/////////////////////////////////
    if (preg_match('/[A-Za-zÑñÁÉÍÓÚáéíóú]+ */', $_POST['ApellidoM'])) {
      $RFCRequerimientos++;
      $ApellidoM= Filtrar($_POST['ApellidoM']);
    }else {
      echo "Dato Invalido: Nombre<br>";
      $Errores++;
    }
  ////////////////////Usuario(N°Cuenta o RFC)//////////////////////////
  if( isset($_POST['NCuenta']) && preg_match('/^\d{9}$/', $_POST['NCuenta'])) {
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
  }else {
    echo "Datos id_usuario incorrecto";
    $Errores++;
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
    echo "<br>Sus contraseñas no coinciden";
    $Errores++;
  }
  /////////////////////////Grupo o Colegio/////////////////////////////
  if (isset($_POST['Grupo']) && preg_match('/^\d{1,3}$/',$_POST['Grupo'])) {
    $Extra=Filtrar($_POST['Grupo']);
  }elseif(isset($_POST['Colegio'])){
    $Extra=Filtrar($_POST['Colegio']);
  }else {
    echo "<br>Dato extra erroneos";
    $Errores++;
  }
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
      header("Location: ../templates/Inicio_sesion.html");
    }
    echo $Contraseña."<br>";
    echo $Usuario."<br>";
    echo $ApellidoP."<br>";
    echo $ApellidoM."<br>";
    echo $Nombre."<br>";
    echo $Extra."<br>";
  }
}else {
  echo "Ocurrio Un error: Ingrese sus datos denuevo o intente despues";
}

?>
