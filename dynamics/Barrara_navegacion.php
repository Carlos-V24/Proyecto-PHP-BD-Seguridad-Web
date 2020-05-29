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
?>
