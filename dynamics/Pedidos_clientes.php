<?php
session_name("Admin");
session_start();
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
}       $consulta = "SELECT * FROM pedidoos WHERE  id_estado_ent='2'";
        $respuesta = mysqli_query($conexion, $consulta);
        $UltID=0;
        $pedidos=['0'];
        while($row = mysqli_fetch_array($respuesta)){
          if ($row['id_pedido']>$UltID) {
          $pedidos[]=$row['id_pedido'];
          }
        }
        if (count($pedidos)>1) {
        for ($i=1; $i <count($pedidos) ; $i++) {
        $Total=0;
        $consulta = "SELECT carrito_alim.id_pedido,Alimento.Nombre,Alimento.precio,carrito_alim.cantidad,cliente.nombre,
                            cliente.ApellidoP,cliente.ApellidoM,tipo_cliente.Tipo_cliente,cliente.id_cliente, Pedidoos.Max_hora FROM carrito_alim
                    LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                    LEFT JOIN Cliente ON Pedidoos.id_cliente=cliente.id_cliente
                    LEFT JOIN extra_cliente ON cliente.id_extra_clie=extra_cliente.id_extra_clie
                    LEFT JOIN tipo_cliente ON extra_cliente.id_tipo_clie=tipo_cliente.id_tipo_clie
                    LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE  id_estado_ent='2' AND carrito_alim.id_pedido='".$pedidos[$i]."'";
        $respuesta = mysqli_query($conexion, $consulta);
        while($row = mysqli_fetch_array($respuesta)){
          if ($row['id_pedido']>$UltID) {
            echo "<h3 style='padding-left: 10%; font-family: Verdana, sans-serif;'>Tiempo estimado de entrega: ".$row['Max_hora']."</h3>";
            echo "  <table>";
            echo "    <tr>";
            echo "      <th class=''>id_pedido</th>";
            echo "      <th class=''>Nombre Cliente</th>";
            echo "      <th class=''>Tipo cliente</th>";
            echo "      <th class=''>Alimento</th>";
            echo "      <th class=''>Cantidad</th>";
            echo "    </tr>";
            echo "    <tr>";
            echo "      <td class='Id'>".$row['id_pedido']."</td>";
            echo "      <td class='Nombre'>".$row['nombre']." ".$row['ApellidoP']." ".$row['ApellidoM']."</td>";
            echo "      <td class=''>".$row['Tipo_cliente']."</td>";
          }else {
            echo "      <td colspan='3'></td>";
          }
          echo "        <td class='Alimento'>".$row['Nombre']."</td>";
          echo "        <td class='Cantidad'>".$row['cantidad']."</td>";
          echo "      </tr>";
          $UltID=$row['id_pedido'];
          $Total+=$row['precio']*$row['cantidad'];
        }
        echo "        <tr class='total'>";
        echo "          <td colspan='4' class='total'>Total</td>";
        echo "          <td class='Cantidad'>$ ".$Total."</td>";
        echo "        </tr>";
        echo "      </table>";
        echo "      <form action='Pedido_entregado.php' method='POST'>";
        echo "        <input type='hidden' name='id_pedido' value='".$pedidos[$i]."'>";
        echo "        <input type='submit' class='Entregado' name='id_".$pedidos[$i]."' value='Entregado'>";
        echo "      </form>";
        echo "      <form action='Pedido_NO_recogido.php' method='POST'>";
        echo "        <input type='hidden' name='id_pedido' value='".$pedidos[$i]."'>";
        echo "        <input type='submit' class='NRecogido' name='id_".$pedidos[$i]."' value='No fué recogido'>";
        echo "      </form>";
      }
    }else {
      include_once "Tipos_errores.php";
      Alerta("No hay pedidos pendientes");
    }
    include_once "Footer.php";
    Footer();
?>
