<?php
function Solicitar_NCuent(){
  echo "<label for='NCuenta'><b>N° Cuenta</b></label>";
  echo "<input type='text' placeholder='Ingresa tu numero de cuenta' name='NCuenta'";
  echo "title='Ingrese su nùmero de cuenta completo y sin guiòn' maxlength='9'";
  echo "pattern='^3(1[6-9]|2[0-2])\d{6}$'required ><br><br>";
}
function Solicitar_RFC(){
  echo "<label for='RFC'><b>RFC</b></label>";
  echo "<input type='text' placeholder='Ingresa tu RFC' name='RFC' required";
  echo "title='Ingrese un RFC correcto' pattern='^[A-Z]{4}\d{2}(0[1-9]|1[0-2])([0-3]1|[0-2][1-9])[A-Z\d]{3}$' maxlength='13'<br><br>";
}
function Solicitar_NTrab(){
  echo "<label for='NTrabajador'><b>N° Trabajador</b></label>";
  echo "<input type='text' placeholder='Ingresa tu numero de trabjador' name='NTrabajador' required";
  echo "title='Ingrese su nùmero de cuenta completo y sin guiòn' maxlength='6'";
  echo "pattern='^\d{6}$'required ><br><br>";
}
function Solicitar_Usu(){
  echo "<label for='Usuario'><b>Usuario</b></label>";
  echo "<input type='text' placeholder='Ingresa tu RFC, N° de cuenta o  N° de trabajador' name='Usuario' required";
  echo "title='Ingrese un RFC correcto o N° de Cuenta' pattern='^([A-Z]{4}\d{2}(0[1-9]|1[0-2])([0-3]1|[0-2][1-9])[A-Z\d]{3}|3(1[6-9]|2[0-2])\d{6}|\d{6})$' maxlength='13'<br><br>";
}
function Solicitar_Admin(){
  echo "<label for='Admin'><b>Nombre del la cuenta</b></label>";
  echo "<input type='text' placeholder='Ingresa el nombre de la cuenta' name='Admin' required";
  echo "title='Ingrese un RFC correcto o N° de Cuenta' pattern='^\[\w]{4}$' maxlength='13'<br><br>";
}
function Solicitar_Nom(){
  echo "<label for='Nombre'><b>Nombre</b></label>";
  echo "<input type='text' placeholder='Ingresa tu nombre' name='Nombre' required maxlength='50'";
  echo "title='Ingresa uno o dos nombres' pattern='^[A-Za-zÑñÁÉÍÓÚáéíóú]+( +[A-Za-zÑñÁÉÍÓÚáéíóú]+|) *$'>";
  echo "<br><br>";
}
function Solicitar_Apell_P(){
  echo "<label for='ApellidoP'><b>Apellido Paterno</b></label>";
  echo "<input type='text' placeholder='Ingresa tu nombre' name='ApellidoP' required maxlength='20'";
  echo "title='Solo el Apellido Paterno' pattern='^[A-Za-zÑñÁÉÍÓÚáéíóú]+ *$'>";
  echo "<br><br>";
}
function Solicitar_Apell_M(){
  echo "<label for='ApellidoM'><b>Apellido Materno</b></label>";
  echo "<input type='text' placeholder='Ingresa tu nombre' name='ApellidoM' required maxlength='20'";
  echo "title='Solo el Apellido Materno' pattern='^[A-Za-zÑñÁÉÍÓÚáéíóú]+ *$'>";
  echo "<br><br>";
}
function Solicitar_Psw(){
  echo "<label for='psw'><b>Contraseña</b></label>";
  echo "<input type='password' placeholder='Ingrese una contraseña' name='psw' required ";
  echo "pattern='^(?=[\w!#$@%&*^+-]*\d)(?=[\w!#$@%&*^+-]*[A-Z])(?=[\w!#@$%&*^+-]*[a-z])(?=[\w!#$%&*^+@-]*[!#$%&*@^+-])\S{8,100}$'";
  echo "title='Ingrese una contraseña con minimo 8 caracteres y almenos dígito, una minúscula, una mayúscula
        y un simbolo permitido(! # $ @ % & * ^ + -).'><br><br>";
}
function Solicitar_Psw_Rpt(){
  echo "<label for='psw-repeat'><b>Rpt. Contraseña</b></label>";
  echo "<input type='password' placeholder='Repita su contraseña' name='psw-repeat' required ";
  echo "pattern='^(?=[\w!#$@%&*^+-]*\d)(?=[\w!#$@%&*^+-]*[A-Z])(?=[\w!#@$%&*^+-]*[a-z])(?=[\w!#$%&*^+@-]*[!#$%&*@^+-])\S{8,100}$'";
  echo "title='Ingrese una contraseña con minimo 8 caracteres y almenos dígito, una minúscula, una mayúscula
        y un simbolo permitido(! # $ @ % & * ^ + -).'><br><br>";
}
?>
