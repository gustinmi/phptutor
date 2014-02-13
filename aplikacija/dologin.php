<?php

session_start(); //start session

if ( $_SERVER['REQUEST_METHOD' == 'POST'] ){

	$usrName = urldecode($_POST["txtUser"]);
	$usrPassword = urldecode($_POST["txtPassword"]);

	if (ctype_alnum($usrName) && ctype_alnum($usrPassword)){

		//fake password check
		if ( $usrName === $usrPassword ) { // if login OK
		
			http_redirect("index.php", array(), true, HTTP_REDIRECT_TEMP);
			$_SESSION['userName'] = $usrName; //remember into session

		}
		else {
			http_redirect("login.php", array("errId" => "1"), true, HTTP_REDIRECT_TEMP;
		}	
	}
}