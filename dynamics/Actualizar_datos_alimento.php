<?php
if (isset($_POST['Actualizar']) && isset($_POST['Stock']) && isset($_POST['Nombre'])
    && isset($_POST['id_alimento']) && isset($_POST['Precio']) && $_POST['Stock']>=1
    && $_POST['id_alimento']>=1 && $_POST['Precio']>=.5) {
  include_once "Filtrar.php";
  $Errores=0;
  if (preg_match('/^(\d{1,4})$/', $_POST['id_alimento']) && $_POST['id_alimento']>=1) {
    $id=Filtrar($_POST['id_alimento']);
  }else {
    echo "Error id";
    $Errores++;
  }
  if (preg_match('/^([\w_ÑñÁÉÍÓÚáéíóú]+( *|))+$/', $_POST['Nombre'])) {
      $Nombre=Filtrar($_POST['Nombre']);
  }else {
    echo "Error Nombre";
    $Errores++;
  }
  if (preg_match('/^(\d{1,2}|0.5)$/', $_POST['Precio'])) {
    $Precio=Filtrar($_POST['Precio']);
  }else {
    echo "Error Precio";
    $Errores++;
  }
  if (preg_match('/^\d{1,3}$$/', $_POST['Stock'])) {
    $Stock=Filtrar($_POST['Stock']);
  }else {
    echo "Error Stock";
    $Errores++;
  }
  if ($Errores==0) {
  include_once "bd.php";
  $conexion=connectDB2("coyocafe");
  if(!$conexion) {
    echo mysqli_connect_error()."<br>";
    echo mysqli_connect_errno()."<br>";
    exit();
  }
  $consulta = "SELECT id_alimento FROM alimento";
  $ListAl = mysqli_query($conexion, $consulta);
  $Alimento_existen=false;
  while($row = mysqli_fetch_array($ListUs)){
    if ($row['id_alimento']==$id){
      $Alimento_existen=true;
    }
  }
  if ($Alimento_existen==true) {
    echo "Error: No existe ese alimento<br>";
  }elseif ($Alimento_existen==false ) {
    $consulta = "UPDATE Alimento SET Nombre='$Nombre', Stock='$Stock', Precio='$Precio' WHERE id_alimento='$id'";
    mysqli_query($conexion, $consulta);
    //Una vez finalizados los procedimientos se cierra la conexion con la base
    mysqli_close($conexion);
    header("Location: ../dynamics/Inventario.php");
  }
  echo $id."<br>";
  echo $Nombre."<br>";
  echo $Precio."<br>";
  echo $Stock."<br>";
}
}else {
  echo "Error";
}

?>