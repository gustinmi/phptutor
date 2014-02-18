<?php

require_once('settings.php');
require_once('common.php');

session_start(); // use session variables

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['HTTP_REFERER'] == 'login.php' ){

	if ( isset($_POST["txtName"]) && isset($_POST["txtPassword"]) ){
		$clean = array();
		
		$usrName = urldecode($_POST["txtName"]);
		$usrName = ctype_alnum($usrName); 
		$clean['txtName'] = urldecode($_POST["txtName"]);
		
		$usrPassword = urldecode($_POST["txtPassword"]);
		$usrPassword = ctype_alnum($usrPassword);
		$clean['usrPassword'] = urldecode($_POST["usrPassword"]);

		if ( array_key_exists('txtName',$clean) && array_key_exists('usrPassword', $clean) && isAuthenticated($clean) ){
			$_SESSION['userName'] = $clean['usrName']; //add to session 
			redirect( INDEX_PAGE );
		}	
	}

	$errMsg = getMsg('badLogin');

} 


?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Login</title>
		<link rel="stylesheet" href="mojstil.css" type="text/css" />
	</head>
	<body onload="validateLogin()">
		<?php if ( !empty($errMsg) ): ?>
			<div class="error"><?php echo $errMsg ?></div>
		<?php endif ?>
		<div id="login">
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
				<div>
				    <label for="txtName">Ime</label>
				    <input id="txtName" name="txtName" type="text" />
				</div>
				<div>
					<label for="txtPassword">Geslo</label>
					<input id="txtPassword" name="txtPassword" type="password" />
				</div>
				
				<input id="register" name="btnLogin" type="submit" value="Prijava" />
				
			</form>
		</div>
		<script type="text/javascript" src="mojskript.js"></script>
		<script type="text/javascript" src="mojskript.js"></script>
	</body>
</html>
