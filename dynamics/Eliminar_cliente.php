<?php
session_name("Admin");
session_start();
if (isset($_SESSION['Admin'])) {
if (isset($_POST['Eliminar']) && $_POST['id_usuario'] && $_POST['Eliminar']==$_POST['id_usuario']) {
$id_cliente=$_POST['id_usuario'];
include_once "bd.php";
//Conexion con la base de datos
$conexion=connectDB2("coyocafe");
if(!$conexion) {
echo mysqli_connect_error()."<br>";
echo mysqli_connect_errno()."<br>";
exit();
}
$consulta = "DELETE FROM Cliente WHERE id_cliente='".$id_cliente."' LIMIT 1";
if(mysqli_query($conexion, $consulta)){
    header("Location: ../dynamics/Lista_clientes.php");
}else {
  echo "No se puede eliminar el cliente selecionado por las siguientes razones :
   <ul>
     <li>Esta realizado un pedido.</li>
     <li>Tiene un pedido pendiente.</li>
     <li>Aun quedan registro de sus pedidos en la base de datos.</li>
     <li>Esta en la lista negra.</li>
   </ul>
   Verifique todas estas medidas para poder eliminar al cliente.
   ";
 }
}else {
  echo "Ocurrio Un error";

}
}else{
  header("Location:Pedidos_clientes.php");
}
?>
