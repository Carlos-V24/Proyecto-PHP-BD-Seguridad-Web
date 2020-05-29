<?php
if ( isset($_POST['Finalizar']) && $_POST['Finalizar']=="Finalizar") {
      include_once "bd.php";
      $conexion=connectDB2("coyocafe");
      if(!$conexion) {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                    WHERE id_cliente='319019566' AND id_estado_ent='1' ";
      $respuesta = mysqli_query($conexion, $consulta);
      while ($row = mysqli_fetch_array($respuesta)) {
        $id[]=$row['id_alimento'];
        $Alt[]=$row['cantidad'];
        $stock[]=$row['Stock'];
        if (intval($row['Stock'])<intval($row['cantidad'])) {
          echo "Error";
          Header("Location: Error.php");
        }
      }
      for ($i=0; $i <count($id) ; $i++) {
        $id_sub=$id[$i];
        echo $stock[$i]."<br>";
        $Stock_sub=$stock[$i]-$Alt[$i];
        echo $Stock_sub;
        $consulta = "UPDATE Alimento SET stock='$Stock_sub' WHERE id_alimento='$id_sub' LIMIT 1";
        mysqli_query($conexion, $consulta);
      }
      $consulta = "UPDATE pedidoos SET id_estado_ent='2' WHERE id_cliente='319019566'  AND id_estado_ent='1' LIMIT 1";
      mysqli_query($conexion, $consulta);
      Header("Location:Mis_pedidos.php");
}else {
  echo "Error";
}

?>
