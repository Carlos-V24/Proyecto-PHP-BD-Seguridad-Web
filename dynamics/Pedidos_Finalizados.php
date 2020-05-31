<?php
//Inicia sesion
session_name("Admin");
session_start();
//Comprueba si la sesion admin esta abierta
if (isset($_SESSION['Admin'])) {
//Funcion que permite tener el icono en la pestaña
include_once "Func_favicon.php";
//conexiones de extilo
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_tablas.css'>";
echo "<meta charset='utf-8'>";
include_once "Barrara_navegacion.php";
include_once "bd.php";
Barra_navegacion_empleados();
//Conexion con la base de datos
$conexion=connectDB2("coyocafe");
//Comprueba que la coneccion haya sido exitosa
if(!$conexion) {
echo mysqli_connect_error()."<br>";
echo mysqli_connect_errno()."<br>";
exit();
}      //Consulat todos los pedidos de hayan sido entregados o no recogidos
        $consulta = "SELECT * FROM pedidoos WHERE  id_estado_ent='3' or id_estado_ent='4'";
        $respuesta = mysqli_query($conexion, $consulta);
        $UltID=0;
        //se agrega un valor inicial en el arreglo para que no cause conflicto
        $pedidos=['0'];
        //guarda todos los id que hayan sido entregados o no recogidos
        while($row = mysqli_fetch_array($respuesta)){
          if ($row['id_pedido']>$UltID) {
          $pedidos[]=$row['id_pedido'];
          }
        }
        if (count($pedidos)>1) {
        //GENERA UNA TABLA POR CADA PEDIDO
        for ($i=1; $i <count($pedidos) ; $i++) {
        //El total de cuando debe ser el producto
        $Total=0;
        //Consulta todo los valores de los pedidos
        $consulta = "SELECT carrito_alim.id_pedido,Alimento.Nombre,Alimento.precio,carrito_alim.cantidad,cliente.nombre,
                            cliente.ApellidoP,cliente.ApellidoM,tipo_cliente.Tipo_cliente,cliente.id_cliente,estado_entrega.Estado FROM carrito_alim
                    LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                    LEFT JOIN Cliente ON Pedidoos.id_cliente=cliente.id_cliente
                    LEFT JOIN extra_cliente ON cliente.id_extra_clie=extra_cliente.id_extra_clie
                    LEFT JOIN tipo_cliente ON extra_cliente.id_tipo_clie=tipo_cliente.id_tipo_clie
                    LEFT JOIN estado_entrega ON Pedidoos.id_estado_ent=estado_entrega.id_estado_ent
                    LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE  pedidoos.id_estado_ent='3' OR pedidoos.id_estado_ent='4' AND carrito_alim.id_pedido='".$pedidos[$i]."'";
        $respuesta = mysqli_query($conexion, $consulta);
        //Genera las tablas hasta que no queden mas registros
        while($row = mysqli_fetch_array($respuesta)){
          if ($row['id_pedido']>$UltID) {
            echo "  <table class='Finalizados'>";
            echo "    <tr>";//Encabexado de las columnas
            echo "      <th class=''>id_pedido</th>";
            echo "      <th class=''>Nombre Cliente</th>";
            echo "      <th class=''>Tipo cliente</th>";
            echo "      <th class=''>Estado de entrega</th>";
            echo "      <th class=''>Alimento</th>";
            echo "      <th class=''>Cantidad</th>";
            echo "    </tr>";
            echo "    <tr>";
            echo "      <td class='Id'>".$row['id_pedido']."</td>";//el id de ese pedido
            echo "      <td class='Nombre'>".$row['nombre']." ".$row['ApellidoP']." ".$row['ApellidoM']."</td>";//Nombre completo del cliente
            echo "      <td >".$row['Tipo_cliente']."</td>";//indica que tipo de cliente fue
            echo "      <td >".$row['Estado']."</td>";//Inidica si fue un pedido recogido o no recogido
          }else {
            echo "    <tr>";
            echo "      <td colspan='4'></td>";
          }
          echo "        <td class='Alimento'>".$row['1']."</td>";//Nombre del alimento
          echo "        <td class='Cantidad'>".$row['cantidad']."</td>";//Cantidad del alimento
          echo "      </tr>";
          $UltID=$row['id_pedido'];
          $Total+=($row['precio']*$row['cantidad']);
        }
        echo "        <tr>";
        echo "          <td colspan='5' class='total'>Total</td>";//Muestra
        echo "          <td class='Cantidad'>$ ".$Total."</td>";//Muestra el total del pedido
        echo "        </tr>";
        echo "      </table>";
        echo "      <form action='Eliminar_registros.php' method='POST'>";
        echo "        <input type='hidden' name='id_pedido' value='".$pedidos[$i]."'>";//Input hidden que ayuda a hacer una doble verificacion
        echo "        <input type='submit' class='Eliminar' name='id_".$pedidos[$i]."' value='Eliminar registro'>";//Boton ara eliminar el registro
        echo "      </form>";
      }
    }else {
      //si no hay ningun pedido finalizado manda este mensaje de alerta
      include_once "Tipos_errores.php";
      Alerta("No hay peido finalizados");
    }
    //se agrega un footer
    include_once "Footer.php";
    Footer();
  }else {
    //si no esta abierta te redirige a
    header("Location:Pedidos_clientes.php");
  }
?>
