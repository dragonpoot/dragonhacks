<?php
	require_once("tools/sesion.class.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$usuario1 = $_POST["usuario"];
		$password = $_POST["contrasenia"];
		$password2 = $_POST["contrasenia"];
		if(validarUsuario($usuario,$password) == true)
		{	
			
			$sesion->set("usuario",$usuario);
			header("location: usuario/index.php");
		}
		else if (validarUsuario($usuario1,$password2) == true)
			{	
			
			$sesion->set("usuario",$usuario);
			header("location: admin/index.php	");
		}
		else 
		{
			echo '<script language="javascript">alert("datos incorrectos");</script>'; 
			echo "";
		}
	}
	
	function validarUsuario($usuario, $password)
	{
		$conexion = new mysqli("localhost","root","","avirtualt");
		$consulta = "select contrasena from administrador where usuario = '$usuario';";
		$consultaus = "select contrasenaus from usuarios where usuarious = '$usuario';";
		$result = $conexion->query($consulta);
		$resultus= $conexion->query($consultaus);
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["contrasena"]) == 0 )
				return true;						
			else					
				return false;
		}
		else if ($resultus->num_rows > 0)
		{
			$fila1 = $resultus->fetch_assoc();
			if( strcmp($password,$fila1["contrasenaus"]) == 0 )
				return true;						
			else					
				return false;
		}
	}

?>
<html>
<head>
<meta charset="UTF-8">
<title>Tickets UTSC</title>
<link href="css/login.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<hgroup>
<h1>Tickets UTSC</h1>
<h3>Bienvenidos</h3>
</hgroup>
<div class="group">
<form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="group">
    <input type="text" name="usuario" required><span class="highlight" ></span><span class="bar"></span>
    <label>Usuario</label>
  </div>
  <div class="group">
    <input type="password"  name="contrasenia" required><span class="highlight" ></span><span class="bar"></span>
    <label>Contraseña</label>
  </div>
  <button type="submit" name ="iniciar"
    class="button buttonBlue">Ingresar
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
	</button>
	<a>no tienes cuenta? solicitala en el siguinete enlace</a>
<a href="tools/registro.php">registrarse</a>
</form>
</div>
<footer><img src="images/logo_INCLUSION.png"><img src="images/logo_IDIE.png"><img src="images/logo_MEC.png"><img src="images/logo_NEMAK.png"><img src="images/logo_TIC.png"><img src="images/logo_TRUST.png"><img src="images/logo_UTSCV.png">
  <p>Desarrollado por Aulas Virtuales</p>
</footer>
</body>
</html>
