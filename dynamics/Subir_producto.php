<?php
if (isset($_POST['NomArticulo']) && isset($_POST['Cantidad']) && isset($_POST['Precio'])
  && isset($_FILES['Foto_del_producto']) && $_FILES['Foto_del_producto']['error']==0)//verifica si los detalles del producto son correspondientes para que sean subidos
  {
  include_once "bd.php";
  echo $NomProdcto = $_POST["NomArticulo"];
  echo $Stock = intval($_POST["Cantidad"]);
  echo $Precio = floatval($_POST["Precio"]);
  /////////
  $Nombre_Temporal = $_FILES['Foto_del_producto']['tmp_name'];
  $Nombre_Pintura = $_POST['NomArticulo'];
  $Nombre_Pintura = str_ireplace(" ","_", $Nombre_Pintura);
  $Extencion = pathinfo($_FILES['Foto_del_producto']['name'], PATHINFO_EXTENSION);
  echo $URL=$Nombre_Pintura.".".$Extencion;
  $Destino = "../statics/img/productos/".$URL;
  //valida la extencion
  if ($Extencion == 'png' | $Extencion == 'jpg' | $Extencion == 'jpeg')
  {
    move_uploaded_file($Nombre_Temporal, $Destino);
    $conexion=connectDB2("Coyocafe");
    if(!$conexion) {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
    //sube los datos a la base
    $subir = "SELECT id_alimento FROM alimento ORDER BY id_alimento DESC LIMIT 1";
    $ID = mysqli_query($conexion, $subir);
    $ID = mysqli_fetch_row($ID);
    $ID = $ID[0];
    $ID = intval($ID);
    $ID++;
    var_dump($ID);
    var_dump($NomProdcto);
    var_dump($Stock);
    var_dump($Precio);
    var_dump($URL);
    //Revisa si se realizo con exito la subida de los datos 
    $consulta = "INSERT INTO Alimento * VALUES ('$ID','$NomProdcto','$Stock','$Precio','$URL')";
    mysqli_query($conexion, $consulta);
    header('Location: Inventario.php');
  }else {
    echo "NO funciono";
  }
}else {
  echo "Error";
}
?>
