<?php
//iniciar sesion de empleado
session_name("Admin");
session_start();
//se verifica si hay un usuario con sesion abierta..
if (isset($_SESSION['Admin'])) {

//y si aparte quiere modificar el pedido de un usuario...
if (isset($_POST['Modificar']) && $_POST['id_usuario'] && $_POST['Modificar']==$_POST['id_usuario']) {
$id_cliente=$_POST['id_usuario'];
include_once "bd.php";
//Conexion con la base de datos
$conexion=connectDB2("coyocafe");
if(!$conexion) {
echo mysqli_connect_error()."<br>";
echo mysqli_connect_errno()."<br>";
exit();
}
//se elimina lista negra
$consulta = "DELETE FROM Lista_Negra WHERE id_cliente='".$id_cliente."' LIMIT 1";
mysqli_query($conexion, $consulta);
header("Location:Lista_Negra.php");
}else {
  echo "Ocurrio Un error";
  header("Location: ../dynamics/Lista_Negra.php");
}
}else{
  header("Location:Pedidos_clientes.php");
}
?>
