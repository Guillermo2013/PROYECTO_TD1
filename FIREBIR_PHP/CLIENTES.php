<?PHP
include ("conexion.php");
?>
<!doctype html5>
  <html lang="es">
      <link rel="stylesheet" type="text/css" href="screen.css"/>   
      <head>
          <title>
             ClIENTES
          </title>
      </head>
      <body>
      <center>
        
         <?php
       
        $sql = "SELECT * FROM PRESENTACIONES CLIENTES ";
        
           $resultado=fbird_query($conexion,$sql);
          
           echo "<table border = 1 rule = nome width = 600px cellpadding = 5px id = tabla>\n";
           echo " <tr>"
                  ." <td align = center><b>PRESENTACIONES EXISTENTES</b></td>"
                  ."<td align = center></td>"
                  ."<td align = center></td>"
                  . "</tr>\n";
          while($row=fbird_fetch_object($resultado)){
           echo " <tr>"
               . " <td align = center>$row->NOMBRE_PRESENTACION</td>"
               . " <td align = center><a href = 'eliminar_presentacion.php?user=".$_GET['id']."&id=$row->ID_PRESENTACION' >ELIMINAR</a></td>"
               . " <td align = center><a href = 'editar_presentacion.php?user=".$_GET['id']."&id=$row->ID_PRESENTACION' >EDITAR</a></td>"    
               . "</tr>\n";
           
          }
           echo "</table>\n";
           
           echo "<a href = 'crear_presentacion.php?id=".$_GET['id']."' >AGREGAR NUEVA PRESENTACION</a>";
           ?>
       
      </center> 
  </body>
</html>
      


