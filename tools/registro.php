
<?php
include("conexion.php");
session_start();
if( isset($_POST["Submit"]) )
	{
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
$subs_usuario = utf8_decode($_POST['usuario']);
$subs_contrasena = utf8_decode($_POST['contrasena']);
$subs_valoresselect=array(
"0"=>"none",
"1"=>"1",
"2"=>"2",
"3"=>"3",
"4"=>"4",
"5"=>"5",
"6"=>"6",
"7"=>"7",
"8"=>"8",
"9"=>"9",
"10"=>"10",
"11"=>"11",
"12"=>"12",
"13"=>"13",
"14"=>"14",
"15"=>"15",
"16"=>"16",
"17"=>"17",
"18"=>"18",
"19"=>"19",
"20"=>"20",
"21"=>"21",
"22"=>"22",
"23"=>"23",
"24"=>"24"
);
$subs_nivel=array(
"1"=>"administrador",
"2"=>"usuario",
);
foreach($subs_valoresselect as $key=>$value	)
{
if($_POST["departamento"]==$key)
{
	$grupo=$value;
	$gupos=$value;
}
}
foreach($subs_nivel as $key1=>$value1	)
{
if($_POST["nivel"]==$key1)
{
	$gruponivel=$value1;
	$gruponivel1=$value1;
}
}

if ($gruponivel == "administrador")
{
$resultado=mysqli_query($db_connection,"SELECT * FROM ".$db_table_name." WHERE correoadmin = '".$subs_email."'");

if (mysqli_num_rows($resultado)>0)
{

echo "<h3>error, correo existente</h3><hr><br>";

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombresad` , `apellidosa`, `correoadmin`, `id_departamento`, `usuario`, `contrasena` ) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $grupo . '", "' . $subs_usuario . '", "' . $subs_contrasena . '")';
mysqli_select_db($db_connection,$db_name);
$retry_value = mysqli_query($db_connection,$insert_value);

if (!$retry_value) {
   echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}
echo'<script type="text/javascript">
        alert("Registro Guardado");
        window.location.href="registro.php";
        </script>';
mysqli_close($db_connection);
}
}
		else if($gruponivel == "usuario")
		{
$res=mysqli_query($db_connection,"SELECT * FROM ".$db_table_name_us." WHERE correous = '".$subs_email."'");

if (mysqli_num_rows($res)>0)
{

echo "<h3>errorL</h3><hr><br>";

} else {
	
	$insert_value1 = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name_us.'` (`nombresus` , `apellidosus`, `correous`, `id_departamento` , `usuarious`, `contrasenaus`  ) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $grupo . '","'.$subs_usuario.'","'.$subs_contrasena.'")';
mysqli_select_db($db_connection,$db_name);
$retry_value1 = mysqli_query($db_connection,$insert_value1);

if (!$retry_value1) {
   echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}
	 echo'<script type="text/javascript">
        alert("Registro Guardado");
        window.location.href="registro.php";
        </script>';

mysqli_close($db_connection);
}
}	
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Registrar usuario</title>
<link href="../css/registro.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/main.js"></script>
<!-- <script type="text/javascript" src="js/animationselect.js"></script> -->	
</head>
<body>
<hgroup>
<h1>Registro</h1>
</hgroup>
<div class="group">
<form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="group">
    <input type="text" name="nombre" ><span class="highlight"></span><span class="bar"></span>
    <label>Nombre</label>
	</div>
<div class="group">
    <input type="text" name="apellido"><span class="highlight"></span><span class="bar"></span>
    <label>Apellido</label>
	</div>
	<div class="group">
    <input type="email"  name="email"><span class="highlight"></span><span class="bar"></span>
    <label>Correo</label>
	</div>
<div class="group">
	<center><h3 class="select">Selecciona el departamento y nivel</h3></center>
	<center>
	
  <select multiple size="24"  name="departamento">
   <option selected> Elige tu departamento </option>
      	<optgroup label="Aulas Virtuales"> 
      	<option value="1">Mecatronica</option> 
       	<option value="2">DNegocios</option> 
       	<option value="3">Tic</option>
		<option value="4">Incluyente</option>
		<option value="5">Inclusion</option>
		<option value="6">NEMAK</option>
   </optgroup> 
   <optgroup label="Diseno de Contenidos"> 
       <option value="7">Mecatronica</option> 
       	<option value="8">DNegocios</option> 
       	<option value="9">Tic</option>
		<option value="10">Incluyente</option>
		<option value="11">Inclusion</option>
		<option value="12">NEMAK</option>
   </optgroup>
	<optgroup label="Producciòn Digital"> 
       <option value="13">Mecatronica</option> 
       	<option value="14">DNegocios</option> 
       	<option value="15">Tic</option>
		<option value="16">Incluyente</option>
		<option value="17">Inclusion</option>
		<option value="18">NEMAK</option>
   </optgroup>
   <optgroup label="Operaciones"> 
       <option value="19">Mecatronica</option> 
       	<option value="20">DNegocios</option> 
       	<option value="21">Tic</option>
		<option value="22">Incluyente</option>
		<option value="23">Inclusion</option>
		<option value="24">NEMAK</option>
   </optgroup>
   </select>
   <select name="nivel">
   	<option value="1">Administrador</option> 
       	<option value="2">Usuario</option>
   </select>
   
	</center>
	</div>
	<div class="group">
    <input  type="text" name="usuario" id="usuario"><span class="highlight"></span><span class="bar"></span>
    <label>Usuario</label>
		</div>
	<div class="group">
	<input type="password" name="contrasena" id="password"><span class="highlight"></span><span class="bar"></span>
    <label>Contraseña</label>
		</div>
		<button type="submit" name="Submit" value="Submit" class="button buttonBlue">Registrar
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
  <a href="../index.php">registrarse</a>
</form>
</div>
	<footer><img src="../images/logo.png">
  <p>Desarrollado por Aulas Virtuales</p>
</footer>
	</form>
	</div>
</body>
</html>