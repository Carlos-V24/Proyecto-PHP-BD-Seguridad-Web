<?php
  define("DBUSER","root");
  define("DBHOST","localhost");
  define("PASSWORD_BD","");
  function connect () {
    return mysqli_connect(DBHOST, DBUSER, PASSWORD_BD);
  }
  function connectDB1 ($conexion, $base) {
    return mysqli_select_db($conexion, $base)
    or die("F. No pude entrar a la base");
  }
  function connectDB2 ($base) {
    $con = mysqli_connect(DBHOST, DBUSER, PASSWORD_BD, $base);
    if (!$con)
    {
      echo "No se ha podido acceder a la base. <br>";
    }
    return $con;
  }
  function connectDB3($base, $psw) {
    $con = mysqli_connect(DBHOST, 'ADMIN', $psw);
    if (!$con)
    {
      echo "No se ha podido acceder a la base. <br>";
    }
    return $con;
  }
?>
