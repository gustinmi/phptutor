<?php
	session_start();	
	require_once('settings.php');

	//check if session is expired, or if user did not login
	if(!isset($_SESSION['userName'])){
		error_log("User is" . $_SESSION['userName']. "\n");
		header( "Location: login.php?errId=3" );
		die();
	}

	$isError = false;   // global flag

	function fetchItem(){
		$query = "SELECT id, name FROM items WHERE id = $secureId LIMIT 0, 1";
		$result = mysqli_query($link, $query);
	}

	function cleanup(){
		//free the memory immediately
		if (isset($result))
			mysqli_free_result($result);
		//close the link explicitely
		mysqli_close($link);
	}


	$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	if ( $_POST['btnUpdate'] == '' ){   // odprtje obrazca

		//get data
		$itemId = urldecode($_GET["id"]);
		$secureId = mysqli_real_escape_string( $itemId );

		fetchItem();
		
	} else {  // uporabnik je klinil popravi

		//get data
		$itemId = urldecode($_POST["id"]);
		$secureId = mysqli_real_escape_string($link, $itemId );
	
		$itemName = urldecode($_POST["txtName"]);
		$secureName = mysqli_real_escape_string($link, $itemId );

		if (empty($secureId) || empty($secureName))
			error_log("Possible attack");
			header( "Location: index.php" );
			cleanup();
			die();

		$query = "UPDATE items SET name = $secureName WHERE id = $secureId";
		
		if (mysqli_query($link, $query)){
			header( "Location: index.php" );
			cleanup();
			die();
		} else{
			fetchItem();
			$isError = true;
		}

	} 

	cleanup();

?>

<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Popravljenje <?php echo $row['id'] ?></title>
		<link rel="stylesheet" href="mojstil.css" type="text/css" />
	</head>

	<body>

		<div id="header">
			<div class="hcolLeft">Pregled podatkov</div>
			<div class="hcolRight">Uporabnik: <?php echo $_SESSION['userName']; ?></div>
		</div>
		<div id="main">

			<?php if ( $isError == true ): ?>
				<div class="error">Napaka pri shranjevanju</div>
			<?php endif ?>

			<?php while ($row = mysqli_fetch_array($result)) { ?>

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			   <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			   <div class="line">
			   		<div class="col">
			   			<label>ID</label>
						<label><?php echo $row['id'] ?></label>

			   		</div>
					<div class="col">
			   			<label for="ime">Ime</label>
					    	<input id="ime" name="txtName" type="text" value="<?php echo $row['name'] ?>" />
			   		</div>
			   </div>
				<input type="submit" name="btnUpdate" value="Popravi">
			</form>

			<?php } ?>	        	
		</div>
		<div id="footer">
			PHP Sample application		
		</div>

		<script type="text/javascript" src="mojskript.js"></script>
			
	</body>
</html>
