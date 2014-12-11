<?php
include ("conexion.php");
?>
<!doctype html5>
  <html lang="es">
      <link rel="stylesheet" type="text/css" href="screen.css"/>   
      <head>
          <title>
              FUNCIONES 
          </title>
      </head>
      <body>
      <center>
        <?php
        
        $sql = "SELECT P.NOMBRE_PRIVILEGIO, R.NOMBRE_ROL FROM PRIVILEGIOS_ROLES PR 
                  INNER JOIN PRIVILEGIOS P ON PR.ID_PRIVILEGIO = P.ID_PRIVILEGIO  
                  INNER JOIN (SELECT RO.ID_ROL,RO.NOMBRE_ROL FROM ROLES RO WHERE RO.ID_ROL = ".$_GET['rol']." )R ON PR.ID_ROL = R.ID_ROL";
        
           $resultado=fbird_query($conexion,$sql);
           $cantidad = fbird_num_fields($resultado);
           if($cantidad=0){
              echo "usuario sin privilegios";  
              header("Location:roles.php");
           }
           echo "<table border = 1 rule = nome width = 600px cellpadding = 5px id = tabla>\n";
           echo " <tr>"
               . " <td align = center><b>ELIJA UNA OPCION</b><td>"
               . "</tr>"
               . "<tr>"
               ."<td align = center><hr><td>"
               . "</tr>\n";
           while($row=fbird_fetch_object($resultado)){
           echo " <tr>"
               . " <td align = center><a href='$row->NOMBRE_PRIVILEGIO.php?id=".$_GET['id']."'>$row->NOMBRE_PRIVILEGIO</a> <td>"
               . "</tr>\n";
           }
           echo "</table>\n";
           
         ?>
      </center>  
      </body>
  </html>

