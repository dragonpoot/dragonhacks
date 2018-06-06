<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="avirtualt";
$db_table_name="administrador";
$db_table_nivel="niveles"; 
$db_table_name_us="usuarios";
$db_table_ticket="ticket";
$db_connection = mysqli_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
?>