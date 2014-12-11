<?php
include ("./conexion.php");
  $sql = "EXECUTE PROCEDURE SP_PRODUCTOS_DELETE(".$_GET['id'].")";
  $sql2 = "EXECUTE PROCEDURE SP_CATEGO_PRODU_DELETE(".$_GET['id'].",NULL)";
   fbird_query($conexion,$sql2);
  fbird_commit($conexion);
  fbird_query($conexion,$sql);
  fbird_commit($conexion);  
  header("Location:PRODUCTOS.php?id=".$_GET['user']."");            
?>


