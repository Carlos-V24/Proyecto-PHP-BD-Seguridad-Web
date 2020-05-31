<?php
session_start();
//comprueba que se haya iniciado una sesion de cliente
if(isset($_SESSION['Usuario']))
{
  include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_tablas.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Mis_pedidos.css'>";
  echo "<link rel='stylesheet' href='../statics/Estilo_menu.css'>";
  echo "<meta charset='utf-8'>";
  include_once "Barrara_navegacion.php";
  include_once "bd.php";
  include_once "Func_mis_pedidos.php";
  Barra_navegacion();
  //checa si se genero algun tipo de error para notificar
  if (isset($_COOKIE['ERROR'])) {
    include_once "Tipos_errores.php";
    Error($_COOKIE['ERROR']);
  }
  //coneccion con la base de datos
  $conexion=connectDB2("coyocafe");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
  //Da de valor inicial que aun ningun pedido
  $PedidosSEnv=false;
  $PedidosEnv=false;
  //consulat los pedidos ya enviados para proyectarlos en lista
  $consulta = "SELECT * FROM pedidoos WHERE  id_estado_ent='2' AND id_cliente='".$_SESSION['Usuario']."'";
    $respuesta = mysqli_query($conexion, $consulta);
    $UltID=0;
    $pedidos=['0'];
    while($row = mysqli_fetch_array($respuesta)){
      if ($row['id_pedido']>$UltID) {
        $PedidosEnv=true;
        $pedidos[]=$row['id_pedido'];
      }
    }
    //si hay almenos un pedio enviado proyecta las tablas
    if (count($pedidos)>1) {
      echo "<section class='Nenviado'>";
      echo "  <h1>Mis pedidos enviados</h1>";
    for ($i=1; $i <count($pedidos) ; $i++) {
    $Total=0;
    //Consulta los datos necesarios de la base de datos
    $consulta = "SELECT carrito_alim.id_pedido,Alimento.Nombre,Alimento.precio,carrito_alim.cantidad,cliente.nombre,
                        cliente.ApellidoP,cliente.ApellidoM,tipo_cliente.Tipo_cliente,cliente.id_cliente, Pedidoos.Max_hora FROM carrito_alim
                LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                LEFT JOIN Cliente ON Pedidoos.id_cliente=cliente.id_cliente
                LEFT JOIN extra_cliente ON cliente.id_extra_clie=extra_cliente.id_extra_clie
                LEFT JOIN tipo_cliente ON extra_cliente.id_tipo_clie=tipo_cliente.id_tipo_clie
                LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE  id_estado_ent='2' AND Pedidoos.id_cliente='".$_SESSION['Usuario']."' AND carrito_alim.id_pedido='".$pedidos[$i]."'";
    $respuesta = mysqli_query($conexion, $consulta);
    //Genera la tabla
    while($row = mysqli_fetch_array($respuesta)){
      //checa si esta en el mismo pedido para generar las cabezeras
      if ($row['id_pedido']>$UltID) {
        echo "<h3 style='padding-left: 10%; font-family: Verdana, sans-serif;'>Tiempo estimado de entrega: ".$row['Max_hora']."</h3>";
        echo "  <table>";
        echo "    <tr>";//Cabexeras de ls columnas
        echo "      <th class=''>id_pedido</th>";
        echo "      <th class=''>Nombre Cliente</th>";
        echo "      <th class=''>Tipo cliente</th>";
        echo "      <th class=''>Alimento</th>";
        echo "      <th class=''>Cantidad</th>";
        echo "    </tr>";
        echo "    <tr>";
        echo "      <td class='Id'>".$row['id_pedido']."</td>";// numero de pedido
        echo "      <td class='Nombre'>".$row['nombre']." ".$row['ApellidoP']." ".$row['ApellidoM']."</td>";// nombre completo
        echo "      <td class=''>".$row['Tipo_cliente']."</td>";// tipo de cliente
      }else {
        echo "      <td colspan='3'></td>";
      }
      echo "        <td class='Alimento'>".$row['Nombre']."</td>";//nombre del alimento
      echo "        <td class='Cantidad'>".$row['cantidad']."</td>";// cantidad ordenada por el cliente
      echo "      </tr>";
      $UltID=$row['id_pedido'];
      $Total+=$row['precio']*$row['cantidad'];
    }
    echo "        <tr class='total'>";
    echo "          <td colspan='4' class='total'>Total</td>";
    echo "          <td class='Cantidad'>$ ".$Total."</td>";
    echo "        </tr>";
    echo "      </table>";
  }
  echo "</section>";
  }
  //Aqui desplega tu pedido que estas formado
  //Consulta todos los articulos de tu pedido actual
  $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1'";
  $respuesta = mysqli_query($conexion, $consulta);
  $Nenviados=0;
  //Comprueba que almenos tengas un alimento activo para desplegar todo
  if ($row = mysqli_fetch_array($respuesta)) {
    $PedidosSEnv=true;
    echo "<section class='activos'>";
    echo "  <h1>Mis pedidos sin enviar</h1>";
    echo "  <form action='Finalizar_pedido.php' method='post'>";
    echo "    <input type='submit' name='Finalizar' value='Finalizar pedido'>";
    echo "  </form>";
    Mi_alimento($row['url_img'], $row['Nombre'], $row['cantidad'], $row['id_alimento']);
  }
  //Si tienbes mas de uno lo generara hasta que ya no queden mas en el arreglo
  while($row = mysqli_fetch_array($respuesta)){
    Mi_alimento($row['url_img'], $row['Nombre'], $row['cantidad'], $row['id_alimento']);
    $Nenviados++;
  }
  echo "</section>";
  //Si no tienes ningun tipo de pedido te manda mensaje de alerta
  if ($PedidosSEnv==false && $PedidosEnv==false) {
    include_once "Tipos_errores.php";
    Alerta("No tiene ningun tipo de pedido activo, porfavor compre algo");
  }
  echo "</article>";
  include_once "Footer.php";
  Footer();
}
else {
    //si no te redirige al inicio
    header("Location: Inicio.php");
}

?>
