<?php
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
}       $consulta = "SELECT * FROM pedidoos WHERE  id_estado_ent='3' or id_estado_ent='4'";
        $respuesta = mysqli_query($conexion, $consulta);
        $UltID=0;
        $pedidos=['0'];
        //calcula todos los pedidos que hayan sido finalizados
        while($row = mysqli_fetch_array($respuesta)){
          if ($row['id_pedido']>$UltID) {
          $pedidos[]=$row['id_pedido'];
          }
        }
        //checa que almenos ahaya uno
        if (count($pedidos)>1) {
        for ($i=1; $i <count($pedidos); $i++) {
        $Total=0;
        $pedido=$pedidos[$i];
        $consulta = "SELECT carrito_alim.id_pedido,Alimento.Nombre,Alimento.precio,carrito_alim.cantidad,cliente.nombre,
                            cliente.ApellidoP,cliente.ApellidoM,tipo_cliente.Tipo_cliente,cliente.id_cliente,estado_entrega.Estado FROM carrito_alim
                    LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                    LEFT JOIN Cliente ON Pedidoos.id_cliente=cliente.id_cliente
                    LEFT JOIN extra_cliente ON cliente.id_extra_clie=extra_cliente.id_extra_clie
                    LEFT JOIN tipo_cliente ON extra_cliente.id_tipo_clie=tipo_cliente.id_tipo_clie
                    LEFT JOIN estado_entrega ON Pedidoos.id_estado_ent=estado_entrega.id_estado_ent
                    LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE  pedidoos.id_estado_ent='3' or pedidoos.id_estado_ent='4' AND pedidoos.id_pedido='$pedido'";
          $pedidoos = mysqli_query($conexion, $consulta);
          //No se porque no me actualiza el id cada peido :/
          //Seria bonito que encontraran el error :)
          if ($row = mysqli_fetch_array($pedidoos)) {
            echo "  <table class='Finalizados'>";
            echo "    <tr>";
            echo "      <th class=''>id_pedido</th>";
            echo "      <th class=''>Nombre Cliente</th>";
            echo "      <th class=''>Tipo cliente</th>";
            echo "      <th class=''>Estado de entrega</th>";
            echo "    </tr>";
            echo "    <tr>";
            echo "      <td class='Id'>".$row['id_pedido']."</td>";
            echo "      <td class='Nombre'>".$row['nombre']." ".$row['ApellidoP']." ".$row['ApellidoM']."</td>";
            echo "      <td >".$row['Tipo_cliente']."</td>";
            echo "      <td >".$row['Estado']."</td>";
            echo "    <tr>";
            echo "      <td colspan='4'></td>";
            echo "      </tr>";
            echo "      </table>";
            echo "      <form action='Eliminar_registros.php' method='POST'>";
            echo "        <input type='hidden' name='id_pedido' value='".$pedidos[$i]."'>";
            echo "        <input type='submit' class='Eliminar' name='id_".$pedidos[$i]."' value='Eliminar registro'>";
            echo "      </form>";
          }
        }
      }else {
      include_once "Tipos_errores.php";
      Alerta("No hay peido finalizados");
    }
    include_once "Footer.php";
    Footer();
  }else {
    header("Location:Pedidos_clientes.php");
  }
?>
