<?php
//comprueba que se haya llegado de la forma esperada
if ( isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Modificar" && isset($_POST['Cantidad'])) {
      include_once "bd.php";
      $id=intval($_POST['id_alimento']);
      $Cantidad=intval($_POST['Cantidad']);
      //comprueba que no sean mas de 20 articulos por productos
      if ($Cantidad<=20 && $Cantidad>0) {
        //hace la conexion con el seridor
        $conexion=connectDB2("coyocafe");
        if(!$conexion) {
          echo mysqli_connect_error()."<br>";
          echo mysqli_connect_errno()."<br>";
          exit();
        }
        //actualiza la cantidad de unarticulo en el carrito
        $consulta = "UPDATE carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                      SET cantidad='$Cantidad' WHERE id_cliente='319019566' AND  carrito_alim.id_alimento='$id' AND id_estado_ent='1' LIMIT 1";
        $respuesta = mysqli_query($conexion, $consulta);
        Header("Location:Mis_pedidos.php");
      }
      else {
        //Crea una cookie de error y te redirige a la pagina de mis pedidos
        setcookie("ERROR","007", time()+2);
        header("Location:Pedidos_clientes.php");
      }
}else {
  //Si no te redirige al inicio
  header("Location:Inicio.php");
}
?>
