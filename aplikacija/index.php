<?php
	session_start();	
	require_once('settings.php');
	//check if session is expired, or if user did not login
	if(!isset($_SESSION['userName'])){
		error_log("Possible attack");
		header( "Location: login.php?errId=3" );
		die();
	}

	//get data
	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$query = "SELECT id, name FROM items";
	$result = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Glavna stran</title>
		<link rel="stylesheet" href="mojstil.css" type="text/css" />
	</head>

	<body>

	<div id="header">
		<div class="title">Pregled podatkov</div>
		<div class="user">Uporabnik: <?php echo $_SESSION['userName']; ?></div>
	</div>
	<div id="main">
		
		<form action="edit.php" method="post">
		   <table class="grid">
		        <caption>Rezultati</caption>
		        <thead>
		        <tr>
		            <th>ID</th>
		            <th>Vrednost</th>
		            <th>Akcija</th>
		        </tr>
		        </thead>
		        <tbody>
					<?php while ($row = mysqli_fetch_array($result)) { ?>
						<tr>
							<td> <?php echo $row['id'] ?>   </td>
							<td> <?php echo $row['name'] ?> </td>
							<td>
								<input type="hidden" name="id" value=" <?php echo $row['id'] ?> ">
								<input type="submit" name="btnEdit" value="Popravi">
							</td>
						</tr>
					<?php } ?>	        	
		        </tbody>
		    </table>
		</form>

	</div>
	<div id="footer">
		
	</div>

	<script type="text/javascript" src="mojskript.js"></script>
		
	</body>
</html>
<?php

	//free the memory immediately
	mysqli_free_result($result);

	//close the link explicitely
	mysqli_close($link);

?>
