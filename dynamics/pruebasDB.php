<?php
  include("bd.php");
  //CONEXIONES
  //Obtener la conexión luego la base
  /*$con = connect();
  if(!$con)
    die("No se ha podido conectar al servidor.");
  else {
    $db = connectDB1($con, "cw020");
  }*/
  //Conexion más base y despliegue de errores
  $conexion = connectDB2("cw2020");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
  else {
    //Arreglos de datos a insertar en la tabla instructor
    $instructoresNoms = ["Carlos Alfredo",
                         "Antonio",
                         "Juan Carlos",
                         "Gamaliel",
                         "Diego",
                         "Emiliano",
                         "Jose Manuel"
                        ];
    $instructoresApP = ["Campos",
                        "Lopez",
                        "Camacho",
                        "Rios",
                        "Rosas",
                        "Cruz",
                        "List"
                       ];
    $instructoresApM = ["De la Garza",
                        "Chong",
                        "Barrientos",
                        "Lira",
                        "Franco",
                        "Hernández",
                        "Ceseña"
                       ];
    $edades = [26, 17, 18, 18, 18, 18, 18];
    $constancias = [9, 5, 4, 5, 5, 4, 4];
    $sql = "";
    //Inserción de registros en tabla instructor
    /*for($x = 0; $x < count($instructoresNoms); $x++)
    {
      $sql = sprintf("INSERT INTO instructor VALUES ('%d', '%s', '%s', '%s', '%d', '%d')",
             ($x+1),
             $instructoresNoms[$x],
             $instructoresApP[$x],
             $instructoresApM[$x],
             $edades[$x],
             $constancias[$x]);
      mysqli_query($conexion, $sql);
    }*/
    //Consulta y formato de los índices
    $consulta = "SELECT * FROM instructor";
    $respuesta = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($respuesta,MYSQLI_ASSOC); //Asociativos
    print_r($row);
    echo "<br>";
    $row = mysqli_fetch_array($respuesta,MYSQLI_NUM); //Indexados
    print_r($row);
    echo "<br>";
    $row = mysqli_fetch_array($respuesta); //Tanto asociativos como indexados
    print_r($row);
    echo "<br>";
    $consulta = "SELECT * FROM instructor";
    $respuesta = mysqli_query($conexion, $consulta);
    while($row = mysqli_fetch_array($respuesta)){
      echo "Id_instructor: ".$row['id_instructor']."<br>";
      echo "Nombre: ".$row[1]."<br>";
      echo "Apellido paterno: ".$row[2]."<br>";
      echo "Apellido materno: ".$row[3]."<br>";
      echo "Edad: ".$row[4]."<br>";
      echo "Constancias: ".$row[5]."<br>"."<br>";
    }
    //Actualizaciones
    $sql = "UPDATE instructor SET edad=17 WHERE nombre='Diego'";
    mysqli_query($conexion, $sql);
    $sql = "UPDATE instructor SET edad=19 WHERE id_instructor=7";
    mysqli_query($conexion, $sql);
    //Impresion de resultados en formato de tabla
    $consulta = "SELECT * FROM instructor";
    $respuesta = mysqli_query($conexion, $consulta);
    echo "<table border='2'>";
    echo "  <tr>";
    echo "    <th>Id_instructor</th>";
    echo "    <th>Nombre</th>";
    echo "    <th>Apellido paterno</th>";
    echo "    <th>Apellido materno</th>";
    echo "    <th>Edad</th>";
    echo "    <th>Constancias</th>";
    echo "  </tr>";
    while($row = mysqli_fetch_array($respuesta)){
      echo "<tr>";
      echo "  <td>".$row[0]."</td>";
      echo "  <td>".$row[1]."</td>";
      echo "  <td>".$row[2]."</td>";
      echo "  <td>".$row[3]."</td>";
      echo "  <td>".$row[4]."</td>";
      echo "  <td>".$row[5]."</td>";
      echo "</tr>";
    }
    echo "</table>";
    //Info extra
    echo mysqli_affected_rows($conexion)."<br>"; //Filas afectadas
    echo mysqli_field_count($conexion)."<br>"; //Columnas
    echo mysqli_character_set_name($conexion)."<br>"; //Tipo de Carácter
    print_r(mysqli_error_list($conexion)); //error en consultas
    echo "<br>".mysqli_ping($conexion)."<br>"; //Verifica el estado del servidor
    echo "Información del host: ".mysqli_get_host_info($conexion);
    //Una vez finalizados los procedimientos se cierra la conexion con la base
    mysqli_close($conexion);
  }
?>
