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

$nombre=$_POST["nombre"];
$correo=$_POST["email"];
$fecha=$_POST["fecha"];
$serie=$_POST["serie"];
$asunto=$_POST["asunto"];
$mensaje=$_POST["mensaje"];
$solucion=$_POST["solucion"];
$estado_ticket = array(
"1"=>"1",
"2"=>"2",
"3"=>"3"
);

foreach($estado_ticket as $key1=>$value1	)
{
if($_POST["estado_ticket"]==$key1)
{
	$edoticket=$value1;
}
}
$departamento = array(
"1"=>"A.V. Mecatronica",
"2"=>"A.V. DNegocios",
"3"=>"A.V. Tic"
);

foreach($departamento as $keys=>$values	)
{
if($_POST["departamentos"]==$keys)
{
	$depa=$values;
}
}


$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_ticket.'` (`Fecha` , `asunto`,`id_us`) VALUES ("' . $fecha . '", "' . $folio . '", "' . $edoticket . '")';
mysqli_select_db($db_connection,$db_name);
$retry_value = mysqli_query($db_connection,$insert_value);
mysqli_close($db_connection);
echo'<script type="text/javascript">
        alert("Registro Guardado");
        window.location.href="tickets.php";
        </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>usuario</title>
</head>

<body>
<a><?php echo "Folio No. #".$folio; ?></a>
<hr><br> Titulo :</br><INPUT TYPE="text" NAME="titulo"></br></br>
<a>Usuario: <?php echo $sesion->get("usuario"); ?></a><br>
<a>Correo: <?php echo $ext_admin_correo; ?></a><br>
<a>Departamento: <?php echo $ext_admin_depto; ?></a>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div align="Right">Departamento.</hr><select name ="departamentos">

  <option value="1">departamento1</option>
  <option value="2">departamento2</option>
  <option value="3">departamento3</option>
</select></div>
<p><div align="Right">Nivel de urgencia:<select name="estado_ticket">
  <option value="1">Normal</option>
  <option value="2">Intermedio</option>
  <option value="3">Alto</option>
</select> </div>
<hr>
<p> Descripcion :
<br><TEXTAREA NAME="mensaje" ROWS="10" COLS="110"></TEXTAREA><div align="RIGHT"><img border="0" height="22" width="40" src="https://image.flaticon.com/icons/png/512/310/310757.png" /></a><button>Adjuntar archivo</button></DIV>
<hr>
 <button type="submit" name="Submit" value="Submit" class="button buttonBlue">enviar
  </button><img border="0" height="22" width="40" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMYICFN3qLR-d9cwlj3mQn6c-QZ3uxnfrFAYQMiFUo5PH8M5mt" /></a> <p><button>Reiniciar ticket</button><img border="0" height="22" width="40" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAMAAAD04JH5AAAAilBMVEX///8AAADs7Ozo6Oj39/fl5eX7+/vw8PDh4eH09PTd3d3Z2dnW1tbS0tLOzs7KysoTExMpKSm7u7sJCQkYGBgcHBwvLy+tra1DQ0NiYmKioqKampqTk5PCwsJ5eXkrKytMTEwhISGfn59/f39QUFCLi4s8PDxbW1txcXGzs7OEhIQ2NjZqamo/Pz/fuMFPAAAEfklEQVR4nO2a2ZqCOBCFFTAsgijIoqjt0i409vu/3ri2FQyYVCLOfMN/TTiHolJZO52WlpaWlpaWlv8qpDfIp+v1LFuvk8AzmxXXgu1x+VuMVlE0jqJoFRfp/pD5djPqvek+Xg3DbolwPCoO+ds92MFk9Cz+MFFsPPJGeW1ahJXqNw/DZWC8R51Ys7he/O4hzbU36OsJn/zFwvdcdbew/cmL2NOMf1yluWDNRiLyZ9JcXRCIfxyK6ne7q62jSN9OUqHw3xlOfCW/wVzzZx9NuAwUONBqfv94dCGqdLDLpWuCtmW/fpgeZsncvzDPs8U387EwTiQd2LMxS30/9SzNfsTXMC0vObI8fMn9BTJlpP9qa5mMtxKzt949Px0PZAwEz/pxplV+EzGT9LmBRG90y/EPR9sXZd7M4nKfXaIrkl6O6HDvv27lHMq5sEEmon0off7Xq8+/tct2dBDCHGcgoRMg/OXuUv437SB2MfpOKZ/SOX9bb085CI+INDA2dABSjt//wJlQjaNE3EBAjwC/QvonB99UCJaWqL55pIIYC8T/ireE7ccz0fb5Fx1C4YJK5tQbloJ5SAcgnCHm+wZVxkVDEBTQ/h5VTbUN9Q6hLDA2MACrAKPf6QxgR15NRZp6sGn4gyzmJIM/4SDylikchQrhHnCnD/viTqAjmwsYgAV+fp2BDxlO+XsS1YcLZAac6cMXLfgXbAEYUFF1/A6B9Tz1eJsZM+A7WuP16YIecYdSPwIDv30ZAyZMwzXvcN4HnTA8yq0tfsA/4E4CfwXiJjyK0ORgWcNdDANQBr/QReCKBWp6wZmFZAo7ofBAXgJ0xIizFNlbYCCVXV6CYTXkjCasg+FEUp/KwpzvazTQC8ODrIEZMMBZjPU9MLCRNQDHtexNG3i1JKCsYyZW0nw8AogcUAuiF6gFUQfUgqiESsGMBUpBjYbdl/DP8VHzgZf6C2593Izolb5AecbNCdXpI2fFyvSx64Ja/R8BfezKSJk+dm1Yo78V0UevjhXp4/cHFOnjd0iq9MXWKBJ7REr0ZXbJVOhL7RMy9fnr/wWpnVKmgSb3itm/oMHdcraBBs8L2AYaPDGpMNDcmVGlgaZOzaoNdJs5N6w10MTJKWx//MTZMWiff+T0HOh/5v7AX/vLPPoDNygo/U/cIaH1P3CL5qoPx56G7xFd4kePfc3epHrW7zR7l+ykzxh0GrxN1x1XDHpN3SeMqst3Mzcq64ePz94pvXK5VbuLR1EUDc/Xakdxk7dq/w2chn7H9QYD/8Zg4LmObivbB60PJdEc708acHLBnKgg8GocnGYeA5b8zYPbU7EhPqhyQLT+Sb4ez5HPRc9zWS85y3PhyGaD67r9p0gS03G56clFoX/CKTkw9L4ITvXcnQPnjAUdENNyBJEJgnXl4YBoPUuYHr5P9m7cHRhaD4OOdqDfITd9HQnWgfbH+QWGqVVh3qh+AOfAfEA6hm0ysQ0CMGz2Y7iKYAMMm4XBWpwyH2U9+RLjBdXLcyLwcA2kFuG2CActLf8r/gFrPmtDkt85GQAAAABJRU5ErkJggg==" /></a> </p>
<br>
<br>
<br>
<br></br>

<br>Fecha: 
<input name="fecha" type="text" id="fecha" value="<?php echo date("d/m/Y"); ?>" size="7" />
<br>Nombre <INPUT TYPE="text" NAME="nombre"> 
<br>Correo <INPUT TYPE="email" NAME="email"> 
<br>Asunto  <INPUT TYPE="text" NAME="asunto"> 
<br>Solucion <INPUT TYPE="text" NAME="solucion"> 
</h1> <a href="../tools/cerrarsesion.php"> Cerrar Sesion </a>
 </form>
</body>
</html>
<?php
	}
	?>