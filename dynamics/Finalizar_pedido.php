<?php //Finalizar_pedido.php
session_start();
if( isset($_SESSION['Usuario']))
{
    include_once "Func_favicon.php";
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
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
    $consulta = "SELECT * FROM Lista_Negra WHERE id_cliente='".$_SESSION['Usuario']."'";
    $respuesta = mysqli_query($conexion, $consulta);
    $Banning=false;
    if ($row = mysqli_fetch_array($respuesta)) {
      $Hasta=$row['Hasta'];
      $Banning=true;
    }
    //Conexion con la base de datos
    //Solicita todos los grupos
    if ($Banning==false) {
    $consulta = "SELECT * FROM Pedidoos WHERE id_estado_ent='2'";
    $respuesta = mysqli_query($conexion, $consulta);
    $Pedidos_Perosna=0;
    while($row = mysqli_fetch_array($respuesta)){
      if($row['id_estado_ent']==1)
      $Pedidos_Perosna++;
    }
    $Total=0;
    $Hasta=date("Y-m-d h:i:s", time() + (($Pedidos_Perosna+1)*5*45));
    $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                  WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' ";
    $respuesta = mysqli_query($conexion, $consulta);
    echo "<h3 style='padding-left: 10%; font-family: Verdana, sans-serif;'>Tiempo estimado de entrega: ".$Hasta."</h3>";
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

    if(isset($_POST['2'])){
      $tipo_ent = $_POST['2'];
      echo "<div id='Lugar_entrega'>";
      echo "<label for='Lugar_entrega'><b>Lugar de Entrega</b></label><br>
      <select id='Lugar_entrega' name='Lugar_entrega'>";
      echo "<option value='' >--Seleccione una opción--</option>";
      //Solicita todos los lugares de entrega
      $consulta = "SELECT id_lugar_entrega,Lugar FROM lugar_entrega WHERE id_tipo_ent='2'";
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){
        echo "<option value=".$row['id_lugar_entrega'].">".$row['Lugar']."</option>";
      }
      echo " </select><br>
            </div>";
      echo "<input type='submit' name='Finalizar' value='Finalizar'>";
    }
    elseif(isset($_POST['1'])){
      echo "<div id='Lugar_entrega'>";
      $tipo_ent = $_POST['1'];
      echo "<label for='Lugar_entrega'><b>Lugar de Entrega</b></label><br>
      <select id='Lugar_entrega' name='Lugar_entrega'>";
      //Solicita todos los lugares de entrega
      $consulta = "SELECT id_lugar_entrega,Lugar FROM lugar_entrega WHERE id_tipo_ent='1'";
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){
        echo "<option value=".$row['id_lugar_entrega'].">".$row['Lugar']."</option>";
      }
      echo " </select><br>
            </div>";
      echo "<input type='submit' name='Finalizar' value='Finalizar'>";
    }
    echo "</form>";
    echo "<form action='Finalizar_pedido.php' method='POST'>
          <label for='tipo_entrega'>Elija un tipo de entrega:</label><br><br>";
    //Solicita el tipo de entrega
    $consulta = "SELECT id_tipo_ent,Tipo_entrega FROM tipo_entrega ";
    $respuesta = mysqli_query($conexion, $consulta);
    while($row = mysqli_fetch_array($respuesta)){
      echo "<input id='tipo_entrega' type='submit' name='".$row['id_tipo_ent']."' value=".$row['Tipo_entrega'].">";
    }
    echo " </form><br>";
  }else {
    include_once "Tipos_errores.php";
    Alerta("Usted ha sido penalizado por no recoger su pedido. Podra volver a solicitar pedidos hasta $Hasta;");
  }
  include_once "Footer.php";
  Footer();
  }else {
    header("Location: Inicio.php");
  }
?>
