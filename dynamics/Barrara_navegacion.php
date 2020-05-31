<?php
//funcion de barra para usuarios
function Barra_navegacion(){
  //diseño estandar para todas las páginas
  echo "<header>
          <h1>Café <i<>\"El coyotito\"</i></h1>";
  echo "  <nav>
            <div class='topnav'>
              <a id='Inicio' href='../dynamics/Inicio.php'>Inicio</a>
              <a id='Menu' href='Menu.php'>Menu</a>
              <a id=''href='Mapa.php'>Mapa</a>";

  //Si existe una sesion, se muestra el boton cerrar sesion
  if (isset($_SESSION['Usuario'])) {
    echo "<a id='Mis_pedidos' href='Mis_pedidos.php'>Pedidos</a>";
    echo "    <div class='nav-right'>
                  <form action='Cerrar_sesion.php' method='POST'>
                  <input type='submit' id='Cerrar_sesion' name='cerrar_sesion' value='Cerrar sesion'>
                  </form>";
  }else {
    //En cambio se muestran los botones de registro e inicio
    echo "      <div class='nav-right'>
                    <a href='Registrate.php'>Registrate</a>
                    <a href='Inicio_sesion.php'>Inicio sesion</a>";
  }
  echo "       </div>
            </nav><br>
          </header>";

//en la primera parte se une con los php que estan conectados con la base de datos para su empleo
//una barra para el uso de los Empleados
}
function Barra_navegacion_empleados(){
  echo "<header>
          <h1>Café <i<>\"El coyotito\"</i> Version Empleados</h1>";
  echo "  <nav>
            <div class='topnav'>
              <a href='Pedidos_clientes.php'>Pedidos Pendientes</a>";

  //de igual forma, si un empleado tiene su sesion abierta se muestra un boton para cerrar sesion
  if (isset($_SESSION['Admin'])) {
    echo "<a href='Pedidos_Finalizados.php'>Pedidos Finalizados</a>";
    echo "<a  href='Inventario.php'>Inventario</a>";
    echo "<a  href='Actualizar_inventario.php'>Agregar producto</a>";
    echo "<a  href='Lista_clientes.php'>Clientes</a>";
    echo "<a  href='Lista_Negra.php'>Lista Negra</a>";
    echo "    <div class='nav-right'>
                  <form action='cerrar_admin.php' method='POST'>
                  <input type='submit' id='Cerrar_sesion' name='cerrar_sesion' value='Cerrar sesion'>
                  </form>";
  }else {
    //sino un boton para ingresar
    echo "      <div class='nav-right'>
                    <a  href='Inicio_admin.php'>Entrar como Admin</a>";
  }
  echo "       </div>
            </nav><br>
          </header>";
}
?>
