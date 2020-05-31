<?php
//verificar que se quiera finalizar un pedido
if ( isset($_POST['Finalizar']) && $_POST['Finalizar']=="Finalizar") {
      //inicio sesion
      session_start();
      //verificacion de usuario con sesion abierta
      if( isset($_SESSION['Usuario']))
      {
        //se recibe lugar de entrega
        $lugar_ent = (isset($_POST['Lugar_entrega']))? $_POST['Lugar_entrega'] : 0;
        //si se eligió entonces se capturan los datos en la base de datos
        if($lugar_ent > 0)
        {
          include_once "bd.php";

          //conexion con base
          $conexion=connectDB2("coyocafe");
          if(!$conexion)
          {
            echo mysqli_connect_error()."<br>";
            echo mysqli_connect_errno()."<br>";
            exit();
          }
          $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
          WHERE id_cliente='".$_SESSION['Usuario']."' AND id_estado_ent='1' ";
          $respuesta = mysqli_query($conexion, $consulta);
          while ($row = mysqli_fetch_array($respuesta)) {
            $id[]=$row['id_alimento'];
            $Alt[]=$row['cantidad'];
            $stock[]=$row['Stock'];
            if (intval($row['Stock'])<intval($row['cantidad'])) {
              setcookie("ERROR","011", time()+2);
              header("Location: ../dynamics/Mis_pedidos.php");
            }
          }
          for ($i=0; $i <count($id) ; $i++) {
            $id_sub=$id[$i];
            echo $stock[$i]."<br>";
            $Stock_sub=$stock[$i]-$Alt[$i];
            $consulta = "UPDATE Alimento SET stock='$Stock_sub' WHERE id_alimento='$id_sub' LIMIT 1";
            mysqli_query($conexion, $consulta);
          }
          $consulta = "SELECT * FROM Pedidoos WHERE id_estado_ent='2'";
          $respuesta = mysqli_query($conexion, $consulta);
          $Pedidos_Perosna=0;
          while($row = mysqli_fetch_array($respuesta)){
            if($row['id_estado_ent']==1)
            $Pedidos_Perosna++;
          }

          //si es para enviar
          $Hasta=date("Y-m-d h:i:s", time() + ($Pedidos_Perosna+1)*5*60);
          echo $Hasta;
          $consulta = "UPDATE pedidoos SET id_estado_ent='2', Max_hora='$Hasta' WHERE id_cliente='".$_SESSION['Usuario']."'  AND id_estado_ent='1' LIMIT 1";
          mysqli_query($conexion, $consulta);
          //Se registra lugar de entrega, si no se elige se da por default la cafeteria *arreglar esto
          $consulta = "UPDATE Pedidoos SET id_lugar_entrega='$lugar_ent' WHERE id_cliente='".$_SESSION['Usuario']."' AND Max_hora='$Hasta'";
          mysqli_query($conexion, $consulta);
          if(isset($_COOKIE['Lugar_no_elegido']))
          {
            setcookie("Lugar_no_elegido","",-1);
          }
          Header("Location:Mis_pedidos.php");
        }
        else{
          $_COOKIE['Lugar_no_elegido'] = "Elija un lugar por favor.";
          setcookie("Lugar_no_elegido",$_COOKIE['Lugar_no_elegido']);
          header("Location: Finalizar_pedido.php");
        }
    }else {
      header("Location: Inicio.php");
    }
}else {
  setcookie("ERROR","001", time()+2);
  header("Location: ../dynamics/Mis_pedidos.php");
}

?>
