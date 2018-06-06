<?php
include("../tools/conexion.php");
//extraer datos de una tabla y guardarla en una varible
//tabla administrador
mysqli_select_db($db_connection,$db_name);
$query1="SELECT * FROM ".$db_table_name." INNER JOIN departamentos where administrador.id_departamento = departamentos.id_departamento ";
$resultado1=mysqli_query($db_connection,$query1);
while($mostrar1=mysqli_fetch_array($resultado1))
{
	$ext_admin_nombre=$mostrar1['usuario'];
	$ext_admin_correo=$mostrar1['correoadmin'];
	$ext_admin_depto=$mostrar1['departamento'];
}



?>