<?php
include("../tools/conexion.php");
//extraer datos de una tabla y guardarla en una varible
//tabla administrador
mysqli_select_db($db_connection,$db_name);
$query1="SELECT * FROM ".$db_table_name_us." INNER JOIN departamentos where usuarios.id_departamento = departamentos.id_departamento ";
$query2="SELECT * FROM ".$db_table_name." INNER JOIN departamentos where administrador.id_departamento = departamentos.id_departamento ";
$query_mivel="SELECT * FROM ".$db_table_nivel."";
$resu=$db_connection->query($query2);
$resu_nivel=$db_connection->query($query_mivel);
$resultado1=mysqli_query($db_connection,$query1);
while($mostrar1=mysqli_fetch_array($resultado1))
{
	$ext_admin_nombre=$mostrar1['usuarious'];
	$ext_admin_correo=$mostrar1['correous'];
	$ext_admin_depto=$mostrar1['departamento'];
}
?>