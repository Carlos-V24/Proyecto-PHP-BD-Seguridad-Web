# Proyecto-PHP-BD-Seguridad-Web  -  Coyocafé :wink:
## Equipo Cafesitos (nombres sujetos a cambios)

#### Integrantes:
- Juárez Almaguer José Carlos
- Méndez Jacinto Ian Rodrigo
- Rosales Olguín Ana Paula 
- Villafranca Hernández Carlos Iván

### Guía de instalación:
-Descargar XAMPP
-Activar Apache y MYSQL
-Descargar el ultimo commit realizado.
-Crear la base de datos coyocafe.
-Restaurar la ultima version de la base de datos coyocafe.
-Configurar tu mysql a la zona horaria America/Mexico_City.
-Instalar los csv necesarios(estos se encuentran en la carpeta docs/csv).
-Para acceder desde la interfaz de empleados a las opciones de aministrador usar estos datos:

  -**Usuario**:Admin
  -**Contraseña**:KBBdmW7e$tfq54Of5FlPN2pUOVeuISiZJCwFDCPT
  
 -Ser gentil y no buscar exploids

### Resumen de funcionamiento:
#### 1. MySQL:
  Se creó base de datos en donde se almacena la información de los alimentos y los usuarios que ingresan a la aplicación.
  Esta base de datos se encuentra normalizada hasta el tercer nivel y utiliza las ventajas de los join para acceder a la informacion necesaria.
  
#### 2. Seguridad Web:
  Existen funciones **php** que se encargan especificamente de filtrar cualquier tipo de inyección, y otras que se encargan del cifrado y decifrado de las contraseñas, aparte se hace la validación de todos los datos de tipo nombre, número de cuenta, RFC, apellidos, etc. 

#### 3. PHP:
  - Se utilizaron sesiones y cookies para volver la experencia mas agradable.
  - Los formularios también están presentes, encargados del movimiento de los datos.
  -Hay una interfaz comoda y agradable al usuario 
  -Incluye dos interfaces, una para clientes, y otra para empleados/administardor. Para acceder a la interfaz de usuario se debe abrir   la ruta dynamics/Inicio.php. Para ver los pedidos y poder acceder a la interfaz de administardor acceder a              dynamics/Pedidos_clientes.php
  
### Comentarios extra...
  > Se trabajo muy duro aunque hubo complicaciones, nuestro esfuerzo se puede ver reflejado en los commits que hicimos.
    Habian ideas aun por implementar pero por el tiempo no se lleguaron a concretar, espero que sean gentiles con nosotros y que guste nuestro trabajo
