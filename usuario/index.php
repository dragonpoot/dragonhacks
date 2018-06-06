<?php 
include("extraerdatos.php");
include("../tools/conexion.php");
require_once("../tools/sesion.class.php");
		$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: ../index.php");		
	}
	else 
	{
mysqli_select_db($db_connection,$db_name);
$consulta_us = "select id_us from usuarios where usuarious = '$usuario';";
$result_us = $db_connection->query($consulta_us);
while($mostrar12=mysqli_fetch_array($result_us))
{
	$id_us=$mostrar12['id_us'];
}
$query="SELECT * FROM ".$db_table_ticket."";
$resultado=mysqli_query($db_connection,$query);
while($mostrar=mysqli_fetch_array($resultado))
{
	$folio=$mostrar['folio'];
}
if(@$folio=="")
{
	$folio=1;
}
else
{
	$folio++;
}
	if( isset($_POST["Submit"]) )
	{ 

$mensaje=$_POST["mensaje"];
$asunto=$_POST["asunto"];
$fecha = date('d-m-Y H:i');
$destino= $_POST['destino'];
		
$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_ticket.'` (`fecha`,`Asunto`,`id_us`,`correo_us`,`departamento_us`,`id_admin`) VALUES ( now(), "' . $asunto. '", "' . $id_us. '","'.$ext_admin_correo.'","'.$ext_admin_depto.'","'.$destino.'")';
mysqli_select_db($db_connection,$db_name);
$retry_value = mysqli_query($db_connection,$insert_value);
mysqli_close($db_connection);
echo'<script type="text/javascript">
        alert("Registro Guardado");
        window.location.href="index.php";
        </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>usuario</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<br>Fecha: 
<input name="fecha" type="text" id="fecha" value="<?php echo date("d/m/Y"); ?>" size="7" />
<a style="float: right"><?php echo "Folio No. #".$folio; ?></a>
<hr><br> Titulo :</br><input type="text" name="asunto"></br></br>
<a>Usuario: <?php echo $sesion->get("usuario"); ?></a><br>
<a>Correo: <?php echo $ext_admin_correo; ?></a><br>
<a>Departamento: <?php echo $ext_admin_depto; ?></a>

<div>Seleccione destino : <select name="destino">
				<option value="0">Seleccione destinatario</option>
				<?php while($row = $resu->fetch_assoc()) { ?>
					<option value="<?php echo $row['id_departamento']; ?>"><?php echo $row['departamento']; ?></option>
				<?php } ?>
			</select></div>
<div>Nivel ticket: <select name="cbx_estado" id="cbx_estado">
				<option value="0">Seleccione nivel</option>
				<?php while($rows = $resu_nivel->fetch_assoc()) { ?>
					<option value="<?php echo $rows['id_nivel']; ?>"><?php echo $rows['nivel']; ?></option>
				<?php } ?>
			</select></div>
<hr>
<p> Descripcion :
<br><TEXTAREA NAME="mensaje" ROWS="10" COLS="110"></TEXTAREA>
<div>
</a>
<button>Adjuntar archivo</button>
<button type="submit" name="Submit" value="Submit" class="button buttonBlue">enviar</button>
  <button>Reiniciar ticket</button>
  </div>
<br>
 </form>
</body>
</html>
<?php
	}
	?>