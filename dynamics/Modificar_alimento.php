<?php
if (isset($_POST['Modificar'])) {
  echo "<link rel='stylesheet' href='../statics/Barra_navegacion.css'>";
  echo "<link rel='stylesheet' href='../statics/Estilo_cuestionarios.css'>";
  echo "<meta charset='utf-8'>";
      include_once "Barrara_navegacion.php";
      include_once "Aliment_form.php";
      include_once "bd.php";
      Barra_navegacion();
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
        if (strlen($row['url_img'])>4) {
          echo "<img src='../statics/img/productos/".$row['url_img']."' alt='".$row['Nombre']."' width='300' height='300'>";
        }else {
          echo "<img src='../statics/img/productos/Imagen_alterna.png' alt='".$row['Nombre']."' width='300'  >";
        }
        echo "<br><b>Id alimento:</b> ".$row['id_alimento']."<br><br>";
        echo "<input type='hidden' name='id_alimento' value='".$row['id_alimento']."'>";
        Solicitar_Nom_ali($row['Nombre']);
        Solicitar_Precio_ali($row['Precio']);
        Solicitar_Stock_ali($row['Stock']);
        echo "<input type='submit' name='Actualizar' value='Actualizar'>";
        echo "<input type='submit' name='Actualizar' value='Eliminar'>";
      }
}else {
  echo "Ocurrio Un error";
}
?>


</form>