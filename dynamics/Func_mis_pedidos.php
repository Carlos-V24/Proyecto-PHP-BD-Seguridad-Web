<?php
function Mi_alimento($Imagen, $Nombre, $Cantidad, $id_alimento)
{
echo "<form action='Modificar_cant_pedido.php' method='post'>";
echo "<div class='Nenviado'>";
//preg_match('/^[\w_]+\.(jpg|jpeg|png)$/', $row['url_img'])
if (strlen($Imagen)>4) {
  echo "<img src='../statics/img/productos/".$Imagen."' alt='".$Nombre."' width='800' >";
}else {
  echo "<img src='../statics/img/productos/Imagen_alterna.png' alt='".$Nombre."' width='800'  >";
}
echo "<div class='desc'>";
echo "".$Nombre."<br>
      Cantidad: ".$Cantidad."<br>";
echo "<input type='hidden' name='id_alimento' value='".$id_alimento."'>";
echo "<center><input type='submit' name='id_".$id_alimento."' value='Aumentar cantidad'><center>
      </div>";
echo "</div>";
echo "</form>";
}

?>
