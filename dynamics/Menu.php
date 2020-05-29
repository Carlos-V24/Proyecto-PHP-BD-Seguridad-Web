<?php
echo "<link rel='stylesheet' href='../statics/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/Menu_galeria.css'>";
echo "<link rel='stylesheet' href='../statics/Estilo_menu.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "bd.php";
    Barra_navegacion();
    //Conexion con la base de datos
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
      //Conexion con la base de datos
      //Solicita todos los grupos
      $consulta = "SELECT id_alimento, Nombre, Precio, url_img FROM Alimento WHERE stock>='1'";
      $respuesta = mysqli_query($conexion, $consulta);

      while($row = mysqli_fetch_array($respuesta)){
        echo "<form action='Agregar_pedido.php' method='post'>";
        echo "<div class='gallery'>";
        //preg_match('/^[\w_]+\.(jpg|jpeg|png)$/', $row['url_img'])
        if (strlen($row['url_img'])>4) {
          echo "<img src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."' width='800' >";
        }else {
          echo "<img src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."' width='800'  >";
        }
        echo "<div class='desc'>";
        echo "Nombre: ".$row['Nombre']."<br>
                Precio: $".$row['Precio']."<br>";
        echo "<input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";
        echo "<center><input type='submit' name='id_".$row['id_alimento']."' value='Agregar al pedido'><center>
              </div>";
        echo "</div>";
        echo "</form>";
      }
?>
