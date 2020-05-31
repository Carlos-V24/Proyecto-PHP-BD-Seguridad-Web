<<<<<<< HEAD
<?php
//se recibe alimento elegido en el menu
if (isset($_POST['id_alimento']) && isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Agregar al pedido") {
    //se inicia sesion
=======
<?php// inclusion de un pedido
if (isset($_POST['id_alimento']) && isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Agregar al pedido") {//revisa el alimento 
>>>>>>> 884b0945f932328e5648e818acac2516d7b55c59
  session_start();
  if( isset($_SESSION['psw']))
  {
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

  //se consutan datos del pedido del usuario
    $consulta = "SELECT * FROM Pedidoos WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' ";
    $respuesta = mysqli_query($conexion, $consulta);
    $Pedidos_Perosna=0;
    while($row = mysqli_fetch_array($respuesta)){
      if($row['id_cliente']==$_SESSION['Usuario'])
      $Pedidos_Perosna++;
    }

    //Si está vacio se insertan los datos del nuevo pedido
    if ($Pedidos_Perosna==0) {
      $consulta = "INSERT INTO Pedidoos(id_cliente,id_estado_ent,id_lugar_entrega) VALUES ('".$_SESSION['Usuario']."','1','1')";
      $respuesta = mysqli_query($conexion, $consulta);
      $consulta = "SELECT id_pedido FROM Pedidoos WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' LIMIT 1";
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
      //sino simplemente se actualiza el estado del pedido
      $consulta = "SELECT id_pedido FROM Pedidoos WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' LIMIT 1";
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
    header("Location: Inicio_sesion.php");
  }
}else {
  echo "Error";
}
?>
