<?php

  //Conexion con base
  define("DBUSER","root");
  define("DBHOST","localhost");
  define("PASSWORD_BD","");
  function connect () {
    //funcion de Conexion
    return mysqli_connect(DBHOST, DBUSER, PASSWORD_BD);
  }

  //ingresa a base si se encuentra, sino se sale
  function connectDB1 ($conexion, $base) {
    return mysqli_select_db($conexion, $base)
    or die("F. No pude entrar a la base");
  }

  //Se detectan los datos, y si no están lo vuelve a revisar
  function connectDB2 ($base) {
    $con = mysqli_connect(DBHOST, DBUSER, PASSWORD_BD, $base);
    if (!$con)
    {
      echo "No se ha podido acceder a la base. <br>";
    }
    return $con;
  }
?>
