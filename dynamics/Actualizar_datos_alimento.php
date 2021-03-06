<?php
//recibiendo datos en caso de que se haya elegido la actualización de datos
if (isset($_POST['Actualizar']) && $_POST['Actualizar']=='Actualizar' && isset($_POST['Stock']) && isset($_POST['Nombre'])//verifica si estan en post los datos de actualizar, stock y nombre
    && isset($_POST['id_alimento']) && isset($_POST['Precio']) && $_POST['Stock']>=1//si se encuntran los id_alimento, stock y precio se le dan e valor de 1
    && $_POST['id_alimento']>=1 && $_POST['Precio']>=.5)
{
  //funciones para filtrar
  include_once "Filtrar.php";//se eliminan caracteres especiales y etiquetas

  /*Filtrando datos de los alimentos (si no coinciden con la validación se
  aumenta la variable error*/
  $Errores=0;
  if (preg_match('/^(\d{1,4})$/', $_POST['id_alimento']) && $_POST['id_alimento']>=1) //regex
  {
    $id=Filtrar($_POST['id_alimento']);
  }
  else
  {
    echo "Error id";
    $Errores++;
  }
  if (preg_match('/^([\w_ÑñÁÉÍÓÚáéíóú]+( *|))+$/', $_POST['Nombre'])) //regex
  {
      $Nombre=Filtrar($_POST['Nombre']);
  }
  else
  {
    echo "Error Nombre";
    $Errores++;
  }
  if (preg_match('/^(\d{1,2}|0.5)$/', $_POST['Precio'])) //regex
  {
    $Precio=Filtrar($_POST['Precio']);
  }
  else
  {
    echo "Error Precio";
    $Errores++;
  }
  if (preg_match('/^\d{1,3}$$/', $_POST['Stock'])) //regex
  {
    $Stock=Filtrar($_POST['Stock']);
  }
  else {
    echo "Error Stock";
    $Errores++;
  }

  //si no hay errores entonces se prosigue a la conexión con la base
  if ($Errores==0)
  {
    include_once "bd.php";
    $conexion=connectDB2("coyocafe");//conexión con Base de datos
    if(!$conexion)
    {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }

    //Se comprueba la existencia de un alimento
    $consulta = "SELECT id_alimento FROM alimento";
    $consulta = "SELECT id_alimento FROM alimento";
    $ListAl = mysqli_query($conexion, $consulta);
    $Alimento_existen=false;//el alimento no existe
    while($row = mysqli_fetch_array($ListUs))
    {
      if ($row['id_alimento']==$id)
      {
        $Alimento_existen=true;
      }
    }

    //Si un alimento existe entonces se registra su modificacion en la base
    if ($Alimento_existen==true)
    {
      echo "Error: No existe ese alimento<br>";
    }
    elseif ($Alimento_existen==false )
    {
      $consulta = "UPDATE Alimento SET Nombre='$Nombre', Stock='$Stock', Precio='$Precio' WHERE id_alimento='$id'";
      mysqli_query($conexion, $consulta);
      //Una vez finalizados los procedimientos se cierra la conexion con la base
      mysqli_close($conexion);
      header("Location: ../dynamics/Inventario.php");
    }
    //se imprimen datos del alimento
    echo $id."<br>";
    echo $Nombre."<br>";
    echo $Precio."<br>";
    echo $Stock."<br>";
  }

//recibiendo datos en caso de elegir eliminacion de datos
}
elseif (isset($_POST['Actualizar']) && $_POST['Actualizar']=='Eliminar'&& isset($_POST['Stock']) && isset($_POST['Nombre']) && isset($_POST['id_alimento']))
{
  include_once "bd.php";

  //se filtra
  if (preg_match('/^(\d{1,4})$/', $_POST['id_alimento']) && $_POST['id_alimento']>=1)
  {
    include_once "Filtrar.php";
    $id=Filtrar($_POST['id_alimento']);
    }
    else
    {
      echo "Error id";
      $Errores++;
    }

    //se conecta
    $conexion=connectDB2("coyocafe");
    if(!$conexion)
    {
      echo mysqli_connect_error()."<br>";
      echo mysqli_connect_errno()."<br>";
      exit();
    }
    else
    {
      //se elimina producto si no se tiene contemplado para un pedido
      $consulta = "DELETE FROM Alimento WHERE id_alimento='$id'";
      if (mysqli_query($conexion, $consulta))
      {
        echo "Nice";
        header("Location: ../dynamics/Inventario.php");
      }
      else
      {
        echo "No se pudo ejecutar la accion, puede ser por que aun hay un pedido con ese alimento";
      }
    }
}
else
{
  Header("Location: Inicio.php");
}

?>
