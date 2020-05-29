<?php
if (isset($_POST['id_alimento']) && isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Agregar al pedido") {
  $id=intval($_POST['id_alimento']);
  echo $id."<br>";
  include_once "bd.php";
  //Conexion con la base de datos
  $conexion=connectDB2("coyocafe");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
    $consulta = "SELECT * FROM Pedidoos WHERE id_cliente='319019566' AND id_estado_ent='1' ";
    $respuesta = mysqli_query($conexion, $consulta);
    $Pedidos_Perosna=0;
    while($row = mysqli_fetch_array($respuesta)){
      if($row['id_cliente']==319019566)
      $Pedidos_Perosna++;
    }
    if ($Pedidos_Perosna==0) {
      $consulta = "INSERT INTO Pedidoos(id_cliente,id_estado_ent,id_lugar_entrega) VALUES ('319019566','1','1')";
      $respuesta = mysqli_query($conexion, $consulta);
      $consulta = "SELECT id_pedido FROM Pedidoos WHERE id_cliente='319019566' AND id_estado_ent='1' LIMIT 1";
      $respuesta = mysqli_query($conexion, $consulta);
      $Pedidos_Perosna=0;
      while($row = mysqli_fetch_array($respuesta)){
        $Pedido=$row['id_pedido'];
      }
      echo $Pedido;
      $consulta = "INSERT INTO carrito_alim VALUES ('$Pedido','$id','1')";
      $respuesta = mysqli_query($conexion, $consulta);
      header("Location:Mis_pedidos.php");
    }else {
      $consulta = "SELECT id_pedido FROM Pedidoos WHERE id_cliente='319019566' AND id_estado_ent='1' LIMIT 1";
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){
        $Pedido=$row['id_pedido'];
      }
      echo $Pedido;
      $consulta = "SELECT * FROM carrito_alim WHERE id_pedido='$Pedido'";
      $respuesta = mysqli_query($conexion, $consulta);
      $Articulo_exst=false;
      while($row = mysqli_fetch_array($respuesta)){
        if ($row['id_alimento']==$id) {
          $Articulo_exst=true;
        }
      }
      if ($Articulo_exst==false) {
        $consulta = "INSERT INTO carrito_alim VALUES ('$Pedido','$id','1')";
        $respuesta = mysqli_query($conexion, $consulta);
        header("Location:Mis_pedidos.php");
        echo "Mod pedido";
      }else {
        header("Location:Mis_pedidos.php");
        echo "Ya existe";
      }
    }
}else {
  echo "Error";
}
?>
