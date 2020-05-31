<?php
session_name("Admin");
session_start();
if (isset($_SESSION['Admin'])) {
  echo "<meta charset='utf-8'>";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'";
    include_once "Func_favicon.php";
    include_once "Barrara_navegacion.php";
    Barra_navegacion_empleados();
    echo "<article>";
      echo "<form method='POST' action='Subir_producto.php' enctype='multipart/form-data'>";
        echo "<section class='Encabezado'>";
        echo "<h1>Registre el Artículo</h1>";
        echo "</section>";
        echo "<section class='Cuestionario'>";
        echo "<label for='NomArticulo'>Nombre del articulo nuevo</label>";
        echo "<input type='text' name='NomArticulo' required>";
        echo "<label for='Cantidad'>No. de piezas del nuevo producto</label>";
        echo "<input type='number' name='Cantidad' required>";
        echo "<label for='Foto_del_producto'>Inserte una imagen del producto</label>";
        echo "<input type='file' name='Foto_del_producto' accept='image/*' required><br><br>";
        echo "<label for='Precio'>Indique el precio del artículo</label>";
        echo "<input type='number' name='Precio' placeholder='$' required>";
        echo "<button type='submit'>Subir Articulo</button>";
        echo "</section>";
      echo "</form>";
    echo "</article>";
}else {
  header('Location: Pedidos_clientes.php');
}
?>
