<?php
function Solicitar_Nom_ali($Value){
  echo "<label for='Nombre'><b>Nombre</b></label>";
  echo "<input type='text' placeholder='Nombre del alimento' name='Nombre' required maxlength='50' value='".$Value."'";
  echo "title='Ingrse un nombre solo con letras, numeros o simbolos permitidos( _ - )' pattern='^([\w_ÑñÁÉÍÓÚáéíóú]+( *|))+$'>";
  echo "<br><br>";
}
function Solicitar_Precio_ali($Value){
  echo "<label for='Precio'><b>Precio</b></label>";
  echo "<input type='text' placeholder='Precio del alimento' name='Precio' required maxlength='3' value='".$Value."'";
  echo "title='Ingrse un precio de $0.5 o de $1 a $99' pattern='^(\d{1,2}|0.5)$'>";
  echo "<br><br>";
}
function Solicitar_Stock_ali($Value){
  echo "<label for='Stock'><b>Stock</b></label>";
  echo "<input type='text' placeholder='Stock del alimento' name='Stock' required maxlength='100' value='".$Value."'";
  echo "title='Ingrse un numero mayor a 1 y menor a 999' pattern='^\d{1,3}$'>";
  echo "<br><br>";
}

?>
