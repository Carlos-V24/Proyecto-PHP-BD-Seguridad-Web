<?php
//se verifica la existencia de un pedido y de la eleccion de eliminar registro
if (isset($_POST['id_'.$_POST['id_pedido']]) && $_POST['id_'.$_POST['id_pedido']]=="Eliminar registro" && isset($_POST['id_pedido'])){
$id_pedido=$_POST['id_pedido'];
include_once "bd.php";
//Conexion con la base de datos
$conexion=connectDB2("coyocafe");
if(!$conexion) {
echo mysqli_connect_error()."<br>";
echo mysqli_connect_errno()."<br>";
exit();
}
//se elimina registro de pedido
$consulta = "DELETE FROM carrito_alim WHERE id_pedido='".$id_pedido."' LIMIT 1";
mysqli_query($conexion, $consulta);
$consulta = "DELETE FROM pedidoos WHERE id_pedido='".$id_pedido."' LIMIT 1";
mysqli_query($conexion, $consulta);
header("Location:Pedidos_Finalizados.php");
}else {
  setcookie("ERROR","001", time()+2);
  header("Location: ../dynamics/Pedidos_finalizados.php");
}
?>
