<?php
if (isset($_POST['id_'.$_POST['id_pedido']]) && $_POST['id_'.$_POST['id_pedido']]=="No fué recogido" && isset($_POST['id_pedido'])){
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
$consulta = "UPDATE pedidoos SET id_estado_ent='4' WHERE id_pedido='".$id_pedido."'  AND id_estado_ent='2' LIMIT 1";
mysqli_query($conexion, $consulta);
$consulta = "SELECT id_cliente FROM Pedidoos WHERE  id_pedido='".$id_pedido."'  AND id_estado_ent='4'";
$respuesta = mysqli_query($conexion, $consulta);
while($row = mysqli_fetch_array($respuesta)){
 $Cliente=$row['id_cliente'];
}
echo $Cliente;
echo $Hasta=date("Y-m-d h:i:s", time()+(60*60*24*5));
$consulta = "INSERT INTO Lista_Negra VALUES('$Cliente','$Hasta')";
mysqli_query($conexion, $consulta);
header("Location:Pedidos_clientes.php");
}else {
  echo "No";
}
?>
