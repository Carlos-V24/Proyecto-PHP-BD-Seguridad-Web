<?php
  include_once "bd.php";
  $NomProdcto = $_POST["NomArticulo"];
  $Stock = $_POST["Cantidad"];
  $Foto = $_POST["Foto_del_producto"];
  $Precio = $POST["Precio"];
  connectDB2();
  $subir = "INSERT INTO Alimento ('Nombre','Stock','Precio','img_url') VALUES ($NomProducto,$Stock,$Foto,$Precio);
?>
