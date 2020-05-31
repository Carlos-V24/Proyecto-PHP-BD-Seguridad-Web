<?php// se colocan a los alumnos que recibieron una sancion 
session_name("Admin");
session_start();
if (isset($_SESSION['Admin'])) {
      include_once "Func_favicon.php";
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_tablas.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "bd.php";
    Barra_navegacion_empleados();
    //Conexion con la base de datos
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }  $consulta = "SELECT * FROM Lista_negra";
      $respuesta = mysqli_query($conexion, $consulta);
      if (mysqli_fetch_array($respuesta)) {
              //Conexion con la base de datos
              //Solicita todos los grupos
              $consulta = "SELECT Lista_Negra.id_cliente, Lista_Negra.Hasta, Cliente.Nombre,Cliente.ApellidoP, Cliente.ApellidoM, tipo_cliente.Tipo_cliente  FROM Lista_Negra
              LEFT JOIN Cliente ON Lista_Negra.id_cliente=Cliente.id_cliente
              LEFT JOIN extra_cliente ON cliente.id_extra_clie=extra_cliente.id_extra_clie
              LEFT JOIN tipo_cliente ON extra_cliente.id_tipo_clie=tipo_cliente.id_tipo_clie";
              $respuesta = mysqli_query($conexion, $consulta);
              echo "<form action='Eliminar_lista_negra.php' method='post'>";
              echo "<table class='Inventario'>";
              echo "  <tr>";
              echo "    <th>Usuario</th>";
              echo "    <th>Nombre</th>";
              echo "    <th>Hasta</th>";
              echo "    <th>Tipo cliente</th>";
              echo "    <th>Eliminar</th>";
              echo "  </tr>";
              while($row = mysqli_fetch_array($respuesta)){
                echo "<tr>";
                echo "<td>".$row['id_cliente']."</td>";
                echo "<td>".$row['Nombre']." ".$row['ApellidoP']." ".$row['ApellidoM']."</td>";
                echo "<td>".$row['Hasta']."</td>";
                echo "<td>".$row['Tipo_cliente']."</td>";
                echo "<input type='hidden' name='id_usuario' value='".$row['id_cliente']."'>";
                echo "<td><button type='submit' name='Modificar' value='".$row['id_cliente']."'><img src='../statics/img/Eliminar.png' alt='Modificar' width='20px'></button></td>";
                echo "</tr>";
              }
              echo "</table>";
            }else {
              include_once "Tipos_errores.php";
              Alerta("No hay ningun cliente el al lista negra");
            }
            echo "</article>";
            include_once "Footer.php";
            Footer();
  }else{
    header("Location:Pedidos_clientes.php");
  }
?>
