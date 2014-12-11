<?php
include ("./conexion.php");
  $sql = "EXECUTE PROCEDURE SP_CATEGORIAS_DELETE(".$_GET['id'].")";
  fbird_query($conexion,$sql);
  fbird_commit($conexion);  
  header("Location:CATEGORIAS DE PRODUCTOS.php?id=".$_GET['user']."");            
?>


