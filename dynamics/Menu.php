<?php
//iniciando sesión
session_start();
include_once "Func_favicon.php";
echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
echo "<link rel='stylesheet' href='../statics/css/Menu_galeria.css'>";
echo "<link rel='stylesheet' href='../statics/css/Estilo_menu.css'>";
echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";//conexión con Barra_navegacion
    include_once "bd.php";
    Barra_navegacion();
    //Conexion con la base de datos
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
      //Consulta los valores necesarios para proyectar el menu, comprueba que haya almenos uno de esos articulos
      $consulta = "SELECT id_alimento, Nombre, Precio, url_img FROM Alimento WHERE stock>='1'";
      $respuesta = mysqli_query($conexion, $consulta);
      //crea la seccion donde se van a ver los produtos
      echo "<section>";
      echo "  <h1>Menu</h1>";
      while($row = mysqli_fetch_array($respuesta)){
        echo "  <form action='Agregar_pedido.php' method='post'>";
        echo "    <div class='gallery'>";
        //Intente usar este regex pero no funciono al final
        //preg_match('/^[\w_]+\.(jpg|jpeg|png)$/', $row['url_img'])
        if (strlen($row['url_img'])>4) {
          echo "    <img class='' src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."'>";
        }else {
          echo "    <img class='' src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."'>";
        }
        echo "      <div class='desc'>";
        echo "        Nombre: ".$row['Nombre']."<br>
                      Precio: $".$row['Precio']."<br>";//imprime el nombre y el precio
        echo "        <input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";//Ayuda a la validacion posterior
        echo "        <center><input type='submit' name='id_".$row['id_alimento']."' value='Agregar al pedido'><center><br>
                    </div>";//Botton para agregar el pedido
        echo "    </div>";
        echo "  </form>";
      }
      echo "</section>";
      include_once "Footer.php";
      Footer();
?>
