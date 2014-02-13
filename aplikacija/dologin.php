<?php

session_start(); //start session

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

	$usrName = urldecode($_POST["txtName"]);
	$usrPassword = urldecode($_POST["txtPassword"]);

	if (ctype_alnum($usrName) && ctype_alnum($usrPassword)){

		//fake password implementation
		if ( $usrName === $usrPassword ) { // if login OK
			error_log('redirect ok' . $usrName );
var_dump($_SESSION);			
			$_SESSION['userName'] = $usrName; //remember into session
			error_log( $_SESSION['userName']  );
			header( "Location: index.php" );
		}
		else {
			header( "Location: login.php?errId=1" );
		}	
	}
}
