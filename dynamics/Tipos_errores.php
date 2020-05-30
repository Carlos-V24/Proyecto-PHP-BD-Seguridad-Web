<?php
function Alerta($mensaje){
  echo "<div class='Alerta'>";
  echo "<h1>Alerta</h1>";
  echo $mensaje;
  echo "</div>";
}
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
    // code...
  }

  elseif ($tipo_error=="008") {
    // code...
  }
  elseif ($tipo_error=="009") {
    // code...
  }
  echo "</div>";
}
?>
