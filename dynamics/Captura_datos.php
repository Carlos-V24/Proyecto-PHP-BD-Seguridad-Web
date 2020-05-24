<?php
if((isset($_POST['NCuenta'])|isset($_POST['RFC'])) && isset($_POST['Nombre']) &&
  (isset($_POST['Grupo'])|isset($_POST['Colegio'])) && isset($_POST['psw']) && isset($_POST['psw-repeat'])){
    include_once "Encrypt_PassW.php";
  ////////////////////Usuario(N°Cuenta o RFC)//////////////////////////
  if (preg_match('/^\d{9}$/', $_POST['NCuenta'])) {
    $Usuario=$_POST['NCuenta'];
    $Usuario=strip_tags($Usuario);//Elimina posibles etiquetas
    $Usuario = htmlentities($Usuario);//Elimina posibles caracteres especiales
  }elseif ((strlen($_POST['RFC'])==12||strlen($_POST['RFC'])==13)){
    $Usuario=$_POST['RFC'];
  }else {
    echo "Datos id_usuario incorrecto";
  }
  ///////////////////////////Contrseña/////////////////////////////////
  if ($_POST['psw']==$_POST['psw-repeat'] &&
      preg_match('/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,100}$/', $_POST['psw']) &&
      preg_match('/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,100}$/', $_POST['psw-repeat'])){
        $Contraseña = $_POST['psw'];
        $Contraseña = strip_tags($Contraseña);//Elimina posibles etiquetas
        $Contraseña = htmlentities($Contraseña);//Elimina posibles caracteres especiales
        $Contraseña = Cifrar($Contraseña);
  }else{
    echo "<br>Sus contraseñas no coinciden";
  }
  /////////////////////////Grupo o Colegio/////////////////////////////
  if (preg_match('/^\d{3}$/',$_POST['Grupo'])) {
    $Extra=$_POST['Grupo'];
    $Contraseña = strip_tags($Contraseña);//Elimina posibles etiquetas
    $Contraseña = htmlentities($Contraseña);//Elimina posibles caracteres especiales
  }elseif ($_POST['RFC']) {
    // code...
  }else {
    echo "<br>Datos erroneos";
  }
  //////////////////////////////Nombre//////////////////////////////////
  if (is_string($_POST['Nombre'])) {
    $Nombre=$_POST['Nombre'];
  }
  //////////////////////////////////////////////////////////////////////
  echo $Usuario."<br>";
  echo $Nombre."<br>";
  echo $Extra."<br>";
  $Cifrado = Cifrar($Contraseña);
  echo Cifrar($Contraseña)."<br>";
  echo strlen(Cifrar($Contraseña))."<br>";
  echo Descifrar($Cifrado);
}else {
  echo "Adios";
}

?>
