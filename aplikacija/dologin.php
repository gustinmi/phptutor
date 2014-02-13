<?php

session_start(); //start session

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

	$usrName = urldecode($_POST["txtName"]);
	$usrPassword = urldecode($_POST["txtPassword"]);

	if (ctype_alnum($usrName) && ctype_alnum($usrPassword)){

		//fake password implementation
		if ( $usrName === $usrPassword ) { // if login OK
			$_SESSION['userName'] = $usrName; //remember into session
			header( "Location: index.php" );
		}
		else {
			header( "Location: login.php?errId=1" );
		}	
	}
}
