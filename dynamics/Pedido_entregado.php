<?php
session_name("Admin");
session_start();
if (isset($_POST['id_'.$_POST['id_pedido']]) && $_POST['id_'.$_POST['id_pedido']]=="Entregado" && isset($_POST['id_pedido'])){
$id_pedido=$_POST['id_pedido'];
include_once "bd.php";
//Conexion con la base de datos
$conexion=connectDB2("coyocafe");
if(!$conexion) {
echo mysqli_connect_error()."<br>";
echo mysqli_connect_errno()."<br>";
exit();
}
echo "Hola";
$consulta = "UPDATE pedidoos SET id_estado_ent='3' WHERE id_pedido='".$id_pedido."'  AND id_estado_ent='2' LIMIT 1";
mysqli_query($conexion, $consulta);
header("Location:Pedidos_clientes.php");
}else {
  echo "No";
}
?>
