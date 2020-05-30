<?php
session_start();
if(isset($_SESSION['Usuario']))
{
    include_once "Func_favicon.php";
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Mis_pedidos.css'>";
echo "<link rel='stylesheet' href='../statics/Estilo_menu.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "bd.php";
    include_once "Func_mis_pedidos.php";
    Barra_navegacion();
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
    $PedidosSEnv=false;
    $PedidosEnv=false;
    $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                  LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1'";
    $respuesta = mysqli_query($conexion, $consulta);
    $Nenviados=0;
    if ($row = mysqli_fetch_array($respuesta)) {
      $PedidosSEnv=true;
      echo "<section class='activos'>";
      echo "<h1>Mis pedidos sin enviar</h1>";
      Mi_alimento($row['url_img'], $row['Nombre'], $row['cantidad'], $row['id_alimento']);
      echo "<form action='Finalizar_pedido.php' method='post'>";
      echo "<input type='submit' name='Finalizar' value='Finalizar pedido'>";
      echo "</form>";
    }
    while($row = mysqli_fetch_array($respuesta)){
      Mi_alimento($row['url_img'], $row['Nombre'], $row['cantidad'], $row['id_alimento']);
      $Nenviados++;
    }
    if ($Nenviados>0) {
      echo "</section>";
    }
    if ($PedidosSEnv==false && $PedidosEnv==false) {
      echo "No tiene ningun tipo de pedido activo, porfavor compre algo";
    }
    }
  else {
      header("Location: Inicio.php");
  }

?>
