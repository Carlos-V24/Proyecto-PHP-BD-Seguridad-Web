<?php
if ( isset($_POST['Finalizar']) && $_POST['Finalizar']=="Finalizar") {
      include_once "bd.php";
      $Cantidad=intval($_POST['Cantidad']);
      $conexion=connectDB2("coyocafe");
      if(!$conexion) {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      $consulta = "UPDATE pedidoos SET id_estado_ent='2' WHERE id_cliente='319019566'  AND id_estado_ent='1' LIMIT 1";
      $respuesta = mysqli_query($conexion, $consulta);
      Header("Location:Mis_pedidos.php");
}else {
  echo "Error";
}

?>
