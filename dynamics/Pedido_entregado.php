<?php
session_name("Admin");
session_start();
//comprueba que se haya llegado desde la pagina indicada
if (isset($_POST['id_'.$_POST['id_pedido']]) && $_POST['id_'.$_POST['id_pedido']]=="Entregado" && isset($_POST['id_pedido'])){
  //
  $id_pedido=$_POST['id_pedido'];
  include_once "bd.php";
  //Conexion con la base de datos
  $conexion=connectDB2("coyocafe");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
  //Actualixa el pedido a recogido
  $consulta = "UPDATE pedidoos SET id_estado_ent='3' WHERE id_pedido='".$id_pedido."'  AND id_estado_ent='2' LIMIT 1";
  mysqli_query($conexion, $consulta);
  //te redirige a la pagina de pedidos por atender
  header("Location:Pedidos_clientes.php");
}else {
  //Crea una cookie de rror y te redirige a la pagina de pedidos
  setcookie("ERROR","001", time()+2);
  header("Location:Pedidos_clientes.php");
}

?>
