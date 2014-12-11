<?PHP
include ("conexion.php");
?>
<!doctype html5>
  <html lang="es">
      <head>
          <title>
             PRODUCTOS
          </title>
      </head>
      <body>
      <center>
        
         <?php
       
        $sql = "SELECT P.ID_PRODUCTO, P.NOMBRE_PRODUCTO,PS.NOMBRE_PRESENTACION,
                P.COSTO,P.PORCENTAJE_MAYORISTA,P.PRECIO_MAYORISTA,P.PRECIO_CONSUMIDOR,P.EXISTENCIA,
                P.EXISTENCIA_MIN,P.EXISTENCIA_MAX
                FROM PRODUCTO P 
                INNER JOIN PRESENTACIONES PS ON P.ID_PRESENTACION = PS.ID_PRESENTACION ";
        
           $resultado=fbird_query($conexion,$sql);
          
           echo "<table border = 1 rule = nome width = 600px cellpadding = 5px id = tabla>\n";
           echo " <tr>"
                  ." <td align = center><b>NOMBRE DE PRODUCTO</b></td>"
                  ." <td align = center><b>PRESENTACION</b></td>"
                  ." <td align = center><b>COSTO</b></td>"
                  ." <td align = center><b>PROCENTAJE DE MAYORISTA</b></td>"
                  ." <td align = center><b>PRECIO DE MAYORISTA</b></td>"
                  ." <td align = center><b>PRECIO DE CONSUMIDOR</b></td>"
                   ." <td align = center><b>EXISTENCIA</b></td>"
                  ." <td align = center><b>EXISTENCIA MINIMA</b></td>"
                  ." <td align = center><b>EXISTENCIA MAXIMA</b></td>"
                  ."<td align = center></td>"
                  ."<td align = center></td>"
                  . "</tr>\n";
          while($row=fbird_fetch_object($resultado)){
           echo " <tr>"
               . " <td align = center>$row->NOMBRE_PRODUCTO</td>"
               . " <td align = center>$row->NOMBRE_PRESENTACION</td>"
               . " <td align = center>$row->COSTO</td>"
               . " <td align = center>$row->PORCENTAJE_MAYORISTA</td>"
               . " <td align = center>$row->PRECIO_MAYORISTA</td>"
               . " <td align = center>$row->PRECIO_CONSUMIDOR</td>"
               . " <td align = center>$row->EXISTENCIA</td>"
               . " <td align = center>$row->EXISTENCIA_MIN</td>"
               . " <td align = center>$row->EXISTENCIA_MAX</td>"
               . " <td align = center><a href = 'eliminar_producto.php?user=".$_GET['id']."&id=$row->ID_PRODUCTO'>ELIMINAR</a></td>"
               . " <td align = center><a href = 'editar_producto.php?user=".$_GET['id']."&id=$row->ID_PRODUCTO'>EDITAR</a></td>"    
               . "</tr>\n";
           
          }
           echo "</table>\n";
           
           echo "<a href = 'crear_producto.php?id=".$_GET['id']."' >AGREGAR NUEVA PRESENTACION</a>";
           ?>
       
        </form>
      </center> 




