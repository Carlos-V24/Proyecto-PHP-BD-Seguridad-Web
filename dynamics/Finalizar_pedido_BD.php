<?php
if ( isset($_POST['Finalizar']) && $_POST['Finalizar']=="Finalizar") {
      session_start();
      if( isset($_SESSION['Usuario']))
      {
      include_once "bd.php";
      $conexion=connectDB2("coyocafe");
      if(!$conexion) {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                    WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' ";
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
        $consulta = "UPDATE Alimento SET stock='$Stock_sub' WHERE id_alimento='$id_sub' LIMIT 1";
        mysqli_query($conexion, $consulta);
      }
      $consulta = "SELECT * FROM Pedidoos WHERE id_estado_ent='2'";
      $respuesta = mysqli_query($conexion, $consulta);
      $Pedidos_Perosna=0;
      while($row = mysqli_fetch_array($respuesta)){
        if($row['id_estado_ent']==1)
        $Pedidos_Perosna++;
      }
      $Hasta=date("Y-m-d h:i:s", time() + ($Pedidos_Perosna+1)*5*60);
      echo $Hasta;
      $consulta = "UPDATE pedidoos SET id_estado_ent='2', Max_hora='$Hasta' WHERE id_cliente='".$_SESSION['Usuario']."'  AND id_estado_ent='1' LIMIT 1";
      mysqli_query($conexion, $consulta);
      Header("Location:Mis_pedidos.php");
    }else {
      header("Location: Inicio.php");
    }
}else {
  echo "Error";
}

?>
