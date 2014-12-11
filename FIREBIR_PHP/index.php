<!doctype html5>

<html lang="es"  >
  
<link rel="stylesheet" type="text/css" href="screen.css"/>   
<head>
    <title>Login de usuarios</title>
</head> 
<body>
        
    <div>
        <center>
       <fieldset >
           <legend>Ingrese sus datos</legend>
        <h1>LOGIN</h1>
       
        <form action="roles.php" method="POST">
            Usuario: <input type="text" name="usuario" required><br>
            Password:<input type="password" name="contraseña"required><br>
        <input type="submit" value="Entrar">
        
        </form>
        </fieldset>
        </center>
       
    </div>
</body>       
</html>