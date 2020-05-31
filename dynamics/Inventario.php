<?php
//Da inicio a la seción de de admi
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
    }
              //Conexion con la base de datos
              //Solicita todos los grupos
              $consulta = "SELECT * FROM Alimento";
              $respuesta = mysqli_query($conexion, $consulta);
              echo "<form action='Modificar_alimento.php' method='post'>";
              echo "<table class='Inventario'>";
              echo "  <tr>";
              echo "    <th>id_alimento</th>";
              echo "    <th>Nombre</th>";
              echo "    <th>Stock</th>";
              echo "    <th>Precio</th>";
              echo "    <th>Modificar</th>";
              echo "  </tr>";
              while($row = mysqli_fetch_array($respuesta)){
                echo "<tr>";
                echo "<td>".$row['id_alimento']."</td>";
                echo "<td>".$row['Nombre']."</td>";
                echo "<td>".$row['Stock']."</td>";
                echo "<td> $ ".$row['Precio']."</td>";
                echo "<td><button type='submit' name='Modificar' value='".$row['id_alimento']."'><img src='../statics/img/Modificar.png' alt='Modificar' width='20px'></button></td>";
                echo "</tr>";
              }
              echo "</table>";
              echo "</article>";
              include_once "Footer.php";
              Footer();
  }else{
    header("Location:Pedidos_clientes.php");
  }
?>
