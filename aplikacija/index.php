<?php
    require_once('settings.php');
    require_once('common.php');

    if (function_exists('session_start')) { //old php comaptibility
        session_start();
    } // use session variables}

	//check if session is expired, or if user did not login
	if(!isset($_SESSION['userName'])){
		logm("Session expired");
        redirect(LOGIN_PAGE);
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
		<link rel="stylesheet" href="css/mojstil.css" type="text/css" />
	</head>

	<body>

	<div id="header">
		<div class="hcolLeft">Pregled podatkov</div>
		<div class="hcolRight">Uporabnik: <?php echo $_SESSION['userName']; ?></div>
	</div>
	
	<div id="main">
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
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td>
							<input type="button"
								onclick="window.location.href='edit.php?id=<?php echo $row['id'] ?>'"
							value="Popravi">
						</td>
					</tr>
				<?php } ?>	        	
	        </tbody>
	    </table>
	</div>
	<div id="footer">
		<span>PHP Sample application</span>		
	</div>
	<script type="text/javascript" src="js/messages.js"></script>
	<script type="text/javascript" src="js/mojskript.js"></script>
	</body>
</html>
<?php

	//free the memory immediately
	mysqli_free_result($result);

	//close the link explicitely
	mysqli_close($link);

?>
