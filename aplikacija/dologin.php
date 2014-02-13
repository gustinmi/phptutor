<?php

session_start(); //start session

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

	$usrName = urldecode($_POST["txtName"]);
	$usrPassword = urldecode($_POST["txtPassword"]);

	if (ctype_alnum($usrName) && ctype_alnum($usrPassword)){

		//fake password check
		if ( $usrName === $usrPassword ) { // if login OK
			error_log('redirect ok');			
			$_SESSION['userName'] = $usrName; //remember into session
			header( "Location: index.php" );
			//http_redirect("main.php", array(), true, HTTP_REDIRECT_PERM);

		}
		else {
			header( "Location: login.php?errId=1" );
			//http_redirect("login.php", array("errId" => "1"), true, HTTP_REDIRECT_PERM);
		}	
	}
}
