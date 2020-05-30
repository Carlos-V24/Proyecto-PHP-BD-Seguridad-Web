<?php
session_start();
if( isset($_SESSION['Usuario']))
{
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_tablas.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "bd.php";
    Barra_navegacion();
    //Conexion con la base de datos
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }

    //Conexion con la base de datos
    //Solicita todos los grupos
    $consulta = "SELECT * FROM Pedidoos WHERE id_estado_ent='2'";
    $respuesta = mysqli_query($conexion, $consulta);
    $Pedidos_Perosna=0;
    while($row = mysqli_fetch_array($respuesta)){
      if($row['id_estado_ent']==1)
      $Pedidos_Perosna++;
    }
    $Total=0;
    $MaxHora= time() + ($Pedidos_Perosna*5*60);
    $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                  WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' ";
    $respuesta = mysqli_query($conexion, $consulta);
    echo "<form action='Finalizar_pedido_BD.php' method='post'>";
    echo "<table>";
    echo "  <tr>";
    echo "    <th>Nombre</th>";
    echo "    <th>Cantidad</th>";
    echo "    <th>Precio</th>";;
    echo "  </tr>";
    while($row = mysqli_fetch_array($respuesta)){
      echo "<tr>";
      echo "  <td>".$row['Nombre']."</td>";
      echo "  <td><center>".$row['cantidad']."</center></td>";
      echo "  <td><center> $ ".$row['Precio']."</center></td>";
      echo "</tr>";
      $Total+=$row['Precio']*$row['cantidad'];
    }
    echo "<tr>";
    echo "<td colspan='2'>Total</td>";
    echo "<td><center>$ ".$Total."</center></td>";
    echo "</tr>";
    echo "</table>";
    echo "<label for='Tipo_entrega'><b>Tipo de Entrega</b></label>
            <select id='Tipo_entrega' name='Tipo_entrega'>";
            echo "<option value='' >--Seleccione una opción--</option>";
            //Solicita todos los lugares de entrega
            $consulta = "SELECT id_tipo_ent FROM lugar_entrega";
            $respuesta = mysqli_query($conexion, $consulta);
            while($row = mysqli_fetch_array($respuesta)){
              echo "<option name='Tipo_entrega' value=".$row['id_tipo_ent'].">".$row['id_tipo_ent']."</option>";
            }
    echo " </select><br>";
    echo "<label for='Lugar_entrega'><b>Lugar de Entrega</b></label>
            <select id='Lugar_entrega' name='Lugar_entrega'>";
            echo "<option value='' >--Seleccione una opción--</option>";
            //Solicita todos los lugares de entrega
            $consulta = "SELECT id_lugar_entrega,Lugar FROM lugar_entrega WHERE id_tipo_ent='1'";
            $respuesta = mysqli_query($conexion, $consulta);
            while($row = mysqli_fetch_array($respuesta)){
              echo "<option value=".$row['id_lugar_entrega'].">".$row['Lugar']."</option>";
            }
    echo " </select><br>";
    echo "<input type='submit' name='Finalizar' value='Finalizar'>";
  }else {
    header("Location: Inicio.php");
  }
?>
