<?php
include ("conexion.php");
?>
<?php
   if($_POST['usuario'] && $_POST['contraseña']) { 
    $sql="SELECT ID_USUARIO FROM USUARIO WHERE NOMBRE_USUARIO='".$_POST['usuario']."' AND CLAVE_USUARIO='".$_POST['contraseña']."'";
     
    $resultado=fbird_query($conexion,$sql) ;
    
    $res = fbird_fetch_row($resultado);
    $value = fbird_fetch_object($resultado);
    if ($res==0) {   
          header("Location:index.php");
    }     
    }
  ?>
  <!doctype html5>
  <html lang="es">
      <link rel="stylesheet" type="text/css" href="screen.css"/>   
      <head>
          <title>
              ROLES DE USUARIO 
          </title>
      </head>
      <body>
      <center>
        <?php
        $sql = "SELECT U.ID_USUARIO ,R.NOMBRE_ROL,R.ID_ROL FROM ROLES R 
                INNER JOIN  USUARIO_ROLES UR ON UR.ROLES_ID_ROL = R.ID_ROL
                INNER JOIN (SELECT US.ID_USUARIO, US.NOMBRE_USUARIO FROM USUARIO US 
                    WHERE US.NOMBRE_USUARIO = '".$_POST['usuario']."' )U ON UR.USUARIO_ID_USUARIO = U.ID_USUARIO";
           
            $resultado=fbird_query($conexion,$sql);
            
            $cantidad = fbird_num_fields($resultado);
            
            if($cantidad=0){
              echo "USUARIO SIN NUNGUN ROL";            
               header("Location:index.php");
           }
           echo "<table border = 1 rule = nome width = 600px cellpadding = 5px id = tabla>\n";
           echo " <tr>"
               . " <td align = center><b>CON QUE ROL DESEA ENTRAR</b><td>"
               . "</tr>";
           while($row = fbird_fetch_object($resultado)){
           echo " <tr>"
               . " <td align = center><a href='privilegios_usuario.php?id=$row->ID_USUARIO&rol=$row->ID_ROL'>$row->NOMBRE_ROL</a></td>"
               . "</tr>\n";
           }
           echo "</table>\n";
             
         ?>
      </center>  
      </body>
  </html>
  