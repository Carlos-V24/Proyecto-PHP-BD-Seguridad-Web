<?php
//comprueba que una sesion se haya iniciado
session_start();
if(isset($_SESSION['Usuario']))
{
  //Comprueba que se haya llegado ahi de forma correcta
  if (isset($_POST['id_alimento']) && isset($_POST['id_'.$_POST['id_alimento']]) && $_POST['id_'.$_POST['id_alimento']]=="Aumentar cantidad") {
    include_once "Func_favicon.php";
    echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
    echo "<link rel='stylesheet' href='../statics/css/Footer.css'>";
    echo "<link rel='stylesheet' href='../statics/css/Error.css'>";
    echo "<link rel='stylesheet' href='../statics/css/Modificacion_alimento.css'>";
    echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
    echo "<meta charset='utf-8'>";
    include_once "Barrara_navegacion.php";
    include_once "Aliment_form.php";
    include_once "bd.php";
    Barra_navegacion();
    //adquiere y tranforma en un entero el id
    $id=intval($_POST['id_alimento']);
    //coneccion con la base de datos
    $conexion=connectDB2("coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
    //seleciona toda la informacion de ese articulo de tu carrito de alimentos
    $consulta = "SELECT * FROM carrito_alim LEFT JOIN Pedidoos ON carrito_alim.id_pedido=Pedidoos.id_pedido LEFT JOIN Alimento ON carrito_alim.id_alimento=Alimento.id_alimento
                  WHERE id_cliente='$_SESSION['Usuario']' AND  carrito_alim.id_alimento='$id' AND id_estado_ent='1' LIMIT 1";
    $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){
        echo "<form action='Modificar_cant_pedido_DB.php' method='POST'>";
        echo "  <table>";
        echo "    <tr>";
        echo "      <th>Imagen</th>";
        echo "      <th>Informacion</th>";
        echo "    </tr>";
        echo "    <tr>";
        echo "      <td rowspan='4'>";
        //Proyecta la imagen si hay(no me funcionaba con regex :/ la validacion)
        if (strlen($row['url_img'])>4) {
          echo "      <img src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."' width='300' height='300'>";
        }else {
          echo "      <img src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."' width='300'  >";
        }
        echo "      </td>";
        echo "      <td>";
        echo "        Nombre del alimento: ".$row['Nombre']."<br>";//nombre del alimento
        echo "        <input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";// valor oculto de alimento
        echo "      </td>";
        echo "    <tr>";
        echo "      <td>";
        echo "        Precio: ".$row['Precio']."<br>";// precio del alimento
        echo "      </td>";
        echo "    <tr>";
        echo "      <td>";
        echo "        Cantidad: ";
        echo "         <input type='number' name='Cantidad' required maxlength='2' value='".$row['cantidad']."'";
        //El maximo de alimentos por envio es de 20, pero si hay menos de esos dentro del inventario la cantidad que haya sera el maximo
        if ($row['Stock']>20) {
          echo "        title='Ingrse un numero mayor a 1 y menor a 20' min='1' max='20'>";
        }else {
          echo "        title='Ingrse un numero mayor a 1 y menor a ".$row['Stock']."' min='1' max='".$row['Stock']."'";
        }
        echo "      </td>";
        echo "    <tr>";
        echo "      <td>";
        echo "        <input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";
        echo "        <center><input type='submit' name='id_".$row['id_alimento']."' value='Modificar'>";
        echo "      </td>";
        echo "</table>";
      }
      echo "</article>";
    include_once "Footer.php";
    Footer();
  }else {
    //checa que si haya llegado a la pagina atyraves de mis pedidos si no te regresa con error
    setcookie("ERROR","001", time()+2);
    header("Location:Mis pedidos.php");
  }
}else {
  //si no te mada a la pagina de inicio de sesion
  header("Location: Inicio_sesion.php");
}
?>
