<!DOCTYPE html>
<html lang="en">
<head>
  <title>Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
// Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
$link = new PDO('mysql:host=localhost;dbname=ticket', 'root', ''); // el campo vaciío es para la password. 

?>

<table class="table table-striped">
  	
		<thead>
		<tr>
			<th>ID</th>
			<th>fecha</th>
			<th>serie</th>
			<th>estado_ticket</th>
			<th>nombre_usuario	</th>
			<th>correo_usuario</th>
			<th>departamento</th>
			<th>asunto</th>
			<th>mensaje</th>
			<th>solucion</th>
		</tr>
		</thead>
<?php foreach ($link->query('SELECT * from tickets') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
<tr>
	<td><?php echo $row['id'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
    <td><?php echo $row['fecha'] ?></td>
    <td><?php echo $row['serie'] ?></td>
    <td><?php echo $row['estado_ticket'] ?></td>
    <td><?php echo $row['nombre_usuario'] ?></td>
    <td><?php echo $row['correo_usuario'] ?></td>
    <td><?php echo $row['departamento'] ?></td>
    <td><?php echo $row['asunto'] ?></td>
    <td><?php echo $row['mensaje'] ?></td>
    <td><?php echo $row['solucion'] ?></td>
 </tr>
<?php
	}
?>
</table>
</body>
</html>