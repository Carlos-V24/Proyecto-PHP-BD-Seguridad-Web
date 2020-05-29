<?php
if ( isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Modificar" && isset($_POST['Cantidad'])) {
      include_once "bd.php";
      $id=intval($_POST['id_alimento']);
      echo $id;
      $Cantidad=intval($_POST['Cantidad']);
      $conexion=connectDB2("coyocafe");
      if(!$conexion) {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      $consulta = "UPDATE carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                    SET cantidad='$Cantidad' WHERE id_cliente='319019566' AND  carrito_alim.id_alimento='$id' AND id_estado_ent='1' LIMIT 1";
      $respuesta = mysqli_query($conexion, $consulta);
      Header("Location:Mis_pedidos.php");
}else {
  echo "Error";
}
?>
