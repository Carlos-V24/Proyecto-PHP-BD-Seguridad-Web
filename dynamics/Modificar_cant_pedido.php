<?php
if (isset($_POST['id_alimento']) && isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Aumentar cantidad") {
      include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
      include_once "Barrara_navegacion.php";
      include_once "Aliment_form.php";
      include_once "bd.php";
      Barra_navegacion();
      $id=intval($_POST['id_alimento']);
      $conexion=connectDB2("coyocafe");
      if(!$conexion) {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                    WHERE id_cliente='319019566' AND  carrito_alim.id_alimento='$id' AND id_estado_ent='1' LIMIT 1";
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){
        echo "<form action='Modificar_cant_pedido_DB.php' method='POST'>";
        if (strlen($row['url_img'])>4) {
          echo "<img src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."' width='300' height='300'>";
        }else {
          echo "<img src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."' width='300'  >";
        }
        echo "Nombre del alimento: ".$row['Nombre']."<br>";
        echo "Precio: ".$row['Precio']."<br>";
        echo "Cantidad: ";
        echo "<input type='number' name='Cantidad' required maxlength='2' value='".$row['cantidad']."'";
        if ($row['Stock']>20) {
          echo "title='Ingrse un numero mayor a 1 y menor a 20' min='1' max='20'>";
        }else {
          echo "title='Ingrse un numero mayor a 1 y menor a ".$row['Stock']."' min='1' max='".$row['Stock']."'";

        }

        echo "<br><br>";
        echo "<input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";
        echo "<center><input type='submit' name='id_".$row['id_alimento']."' value='Modificar'>";
      }
}else {
  echo "Error";
}
?>
