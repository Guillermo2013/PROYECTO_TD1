<?php
include ("conexion.php");
  $sql = "EXECUTE PROCEDURE SP_PRESENTACIONES_DELETE(".$_GET['id'].")";
  fbird_query($conexion,$sql);
  fbird_commit($conexion);  
    header("Location:PRESENTACIONES DE PRODUCTOS.php?id=".$_GET['user']."");            
?>




