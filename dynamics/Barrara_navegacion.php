<?php
function Barra_navegacion(){
  echo "<header>
          <h1>Café <i<>\"El coyotito\"</i></h1>";
  echo "  <nav>
            <div class='topnav'>
              <a id='Inicio' href='../dynamics/Inicio.php'>Inicio</a>
              <a id='Menu' href='Menu.php'>Menu</a>
              <a id=''href='#contact'>Mapa</a>";
  if (isset($_SESSION['Usuario'])) {
    echo "<a id='Mis_pedidos' href='Mis_pedidos.php'>Pedidos</a>";
    echo "    <div class='nav-right'>
                  <form action='Cerrar_sesion.php' method='POST'>
                  <input type='submit' id='Cerrar_sesion' name='cerrar_sesion' value='Cerrar sesion'>
                  </form>";
  }else {
    echo "      <div class='nav-right'>
                    <a href='Registrate.php'>Registrate</a>
                    <a href='Inicio_sesion.php'>Inicio sesion</a>";
  }
  echo "       </div>
            </nav><br>
          </header>";

}
function Barra_navegacion_empleados(){
  echo "<header>
          <h1>Café <i<>\"El coyotito\"</i> Version Empleados</h1>";
  echo "  <nav>
            <div class='topnav'>
              <a href='Pedidos_clientes.php'>Pedidos Pendientes</a>";
  if (isset($_SESSION['Admin'])) {
    echo "<a href='Pedidos_Finalizados.php'>Pedidos Finalizados</a>";
    echo "<a  href='Inventario.php'>Inventario</a>";
    echo "<a  href='#.php'>Agregar producto</a>";
    echo "    <div class='nav-right'>
                  <form action='cerrar_admin.php' method='POST'>
                  <input type='submit' id='Cerrar_sesion' name='cerrar_sesion' value='Cerrar sesion'>
                  </form>";
  }else {
    echo "      <div class='nav-right'>
                    <a  href='Inicio_admin.php'>Entrar como Admin</a>";
  }
  echo "       </div>
            </nav><br>
          </header>";
}
?>
