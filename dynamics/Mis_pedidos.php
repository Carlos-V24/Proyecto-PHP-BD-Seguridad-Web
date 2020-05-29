<?php
echo "<link rel='stylesheet' href='../statics/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/Menu_galeria.css'>";
echo "<link rel='stylesheet' href='../statics/Estilo_menu.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "bd.php";
    Barra_navegacion();
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }

    $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido
                LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento WHERE id_cliente='319019566'";
    $respuesta = mysqli_query($conexion, $consulta);
    while($row = mysqli_fetch_array($respuesta)){
      echo "<form action='Modificar_cant_pedido.php' method='post'>";
      echo "<div class='gallery'>";
      //preg_match('/^[\w_]+\.(jpg|jpeg|png)$/', $row['url_img'])
      if (strlen($row['url_img'])>4) {
        echo "<img src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."' width='800' >";
      }else {
        echo "<img src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."' width='800'  >";
      }
      echo "<div class='desc'>";
      echo "Nombre: ".$row['Nombre']."<br>
              Cantidad: ".$row['cantidad']."<br>";
      echo "<input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";
      echo "<center><input type='submit' name='id_".$row['id_alimento']."' value='Aumentar cantidad'><center>
            </div>";
      echo "</div>";
      echo "</form>";
    }
    echo "string";
    echo "<input type='submit' name='Finalizar' value='Finalizar pedido'>";
?>
