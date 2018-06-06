<?php
include("conexion.php");
session_start();
//recuperar las variables
if( isset($_POST["Enviar_Ticket"]) )
	{

$nombre=$_POST["nombre_usuario"];
$correo=$_POST["correo_usuario"];
$fecha=$_POST["fecha"];
$serie=$_POST["serie"];
$estado_ticket = array(
"1"=>"bajo",
"2"=>"intermedio",
"3"=>"urgente"
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
$asunto=$_POST["asunto"];
$mensaje=$_POST["mensaje"];
$solucion=$_POST["solucion"];

$insertar = "INSERT INTO $db_table_ticket(fecha,serie,estado_ticket,nombre_usuario_correo_usuario,departamento,asunto,mensaje,solucion)VALUES('$fecha','$serie','$edoticket','$nombre','$correo','$depa','$asunto','$mensaje','$solucion')";
mysqli_query($db_connection,$insertar);
}

?>