<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Moja stran</title>
		<link rel="stylesheet" href="mojstil.css" type="text/css" />
	</head>

	<body onload="sayHi()">

		<div> Rezultati </div>

		<table>
			

		<?php

			define("DB_SERVER", "localhost");
			define("DB_USER", "phptut");
			define("DB_PASS", "pass");
			define("DB_NAME", "phptut");

			$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
			$query = "SELECT id, name FROM items";
			$result = mysqli_query($link, $query);

			$rowCount = mysqli_num_rows($result);

			for ( $x=0; $x < $rowCount; $x++)
			{
				$row = mysqli_fetch_array($result);
				?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name'];?></td>
				</tr>
			} 
		?>

		</table>
		<script type="text/javascript" src="mojskript.js" />
		
	</body>
</html>
