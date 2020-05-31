<?php
//comprueba que si venga de la pagina establecida
if (isset($_POST['id_'.$_POST['id_pedido']]) && $_POST['id_'.$_POST['id_pedido']]=="No fué recogido" && isset($_POST['id_pedido'])){
//recibe el id del pedido
$id_pedido=$_POST['id_pedido'];
include_once "bd.php";
//Conexion con la base de datos
$conexion=connectDB2("coyocafe");
if(!$conexion) {
  echo mysqli_connect_error()."<br>";
  echo mysqli_connect_errno()."<br>";
  exit();
}
//actualiza el estado a no recogido
$consulta = "UPDATE pedidoos SET id_estado_ent='4' WHERE id_pedido='".$id_pedido."'  AND id_estado_ent='2' LIMIT 1";
mysqli_query($conexion, $consulta);
//agarra el id del cliente que no fue a recoger su pedido
$consulta = "SELECT id_cliente FROM Pedidoos WHERE  id_pedido='".$id_pedido."'  AND id_estado_ent='4'";
$respuesta = mysqli_query($conexion, $consulta);
//mete ese valor a una variable
while($row = mysqli_fetch_array($respuesta)){
 $Cliente=$row['id_cliente'];
}
//Calcula hasta cuando podra volver a ordenar: 7 dias (5 dias habiles y 2 de fin de semana)
$Hasta=date("Y-m-d h:i:s", time()+(60*60*24*7));
//Mete a este usuario a la lista negra
$consulta = "INSERT INTO Lista_Negra VALUES('$Cliente','$Hasta')";
mysqli_query($conexion, $consulta);
//te redirige a la pagina de pedidos por revisar
header("Location:Pedidos_clientes.php");
}else {
  //Crea una cookie de rror yu te redirige a la pagina de entrega de pedidos
  setcookie("ERROR","001", time()+2);
  header("Location:Pedidos_clientes.php");
}
?>
