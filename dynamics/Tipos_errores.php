<?php
/*Este es un archivo de funciones que permite
  mandar las alerta y errores a traves de cookies*/

  //Aqui simplemente es un mensaje de alerta que no funciona con cookies
function Alerta($mensaje){
  echo "<div class='Alerta'>";
  echo "<h1>Alerta</h1>";
  echo $mensaje;
  echo "</div>";
}
//Estos son las funciones que funcionan con COOKIES y hay mensaje para cada tipo
function Error($tipo_error){
  echo "<div class='Error'>";
  echo "<h1>Error</h1>";
  if ($tipo_error=="001") {
    echo "Ha sucedidio un error, intente de nuevo porfavor";
  }
  elseif ($tipo_error=="002") {
    echo "Sus datos no coinciden con los establecidos";
  }
  elseif ($tipo_error=="003") {
    echo "Usuario inexistente";
  }
  elseif ($tipo_error=="004") {
    echo "Sus contraseña no coinciden con la establecida";
  }

  elseif ($tipo_error=="005") {
    echo "Error en sus datos ingresados. Porafvor ingreselos de nuevo";
  }
  elseif ($tipo_error=="006") {
    echo "Sus contraseñas no coinciden";
  }
  elseif ($tipo_error=="007") {
    echo "No pueda aumentar la cantidad de un producto mas de 20";
  }
  elseif ($tipo_error=="09") {
    echo "Ese no es el usuario solicitado";
  }
  elseif ($tipo_error=="010") {
    echo "No es la contraseña del admin";
  }elseif ($tipo_error=="011") {
    echo "Ha habido un problema con el stock, porfavor modifique la cantidad de su producto";
  }
  echo "</div>";
}
?>
