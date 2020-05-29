<?php
function Barra_navegacion(){
  echo "<header>
          <h1>Café <i<>\"El coyotito\"</i></h1>";
  echo "  <nav>
            <div class='topnav'>
              <a id='Inicio' href='../templates/Inicio.html'>Inicio</a>
              <a id='Menu' href='Menu.php'>Menu</a>
              <a id=''href='#contact'>Mapa</a>
              <a id='Mis_pedidos' href='Mis_pedidos.php'>Pedidos</a>";
  echo "      <div class='nav-right'>
                <a href='Registrate.php'>Registrate</a>
                <a href='Inicio_sesion.php'>Inicio sesion</a>";
  /*echo "    <div class='topnav-right'>
                <a href='Cerrar_Sesion.php'>Registrate</a>";*/
  echo "       </div>
            </nav><br>
          </header>";

}
?>
