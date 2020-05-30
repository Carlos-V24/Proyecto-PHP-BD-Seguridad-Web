<?php
session_name("Admin");
session_start();
if (isset($_SESSION['Admin'])) {
if (isset($_POST['Modificar'])) {
      include_once "Func_favicon.php";
  echo "<link rel='stylesheet' href='../statics/css/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Estilo_cuestionarios.css'>";
  echo "<link rel='stylesheet' href='../statics/css/Modificacion_alimento.css'>";
  echo "<meta charset='utf-8'>";
      include_once "Barrara_navegacion.php";
      include_once "Aliment_form.php";
      include_once "bd.php";
      Barra_navegacion_empleados();
      $conexion=connectDB2("coyocafe");
      if(!$conexion) {
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno()."<br>";
        exit();
      }
      $Alimento=intval($_POST['Modificar']);
      $consulta = "SELECT * FROM Alimento WHERE id_alimento='$Alimento' LIMIT 1";
      $respuesta = mysqli_query($conexion, $consulta);
      while($row = mysqli_fetch_array($respuesta)){
        echo "<form action='Actualizar_datos_alimento.php' method='POST'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Imagen</th>";
        echo "<th>Informacion</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td rowspan='4'>";
        if (strlen($row['url_img'])>4) {
          echo "<img src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."' width='300' height='300'>";
        }else {
          echo "<img src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."' width='300'  >";
        }
        echo "</td>";
        echo "<td>";
        echo "<br><b>Id alimento:</b> ".$row['id_alimento']."<br><br>";
        echo "<input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";
        echo "</td>";
        echo "<tr>";
        echo "<td>";
        Solicitar_Nom_ali($row['Nombre']);
        echo "</td>";
        echo "<tr>";
        echo "<td>";
        Solicitar_Precio_ali($row['Precio']);
        echo "</td>";
        echo "<tr>";
        echo "<td>";
        Solicitar_Stock_ali($row['Stock']);
        echo "</td>";
        echo "</table>";
        echo "<input type='submit' name='Actualizar' value='Actualizar'>";
        echo "<input type='submit' name='Actualizar' value='Eliminar'>";
      }
}else {
  echo "Ocurrio Un error";
  header("Location: ../dynamics/Inventario.php");
}
}else{
  header("Location:Pedidos_clientes.php");
}
?>


</form>
