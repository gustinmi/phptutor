<?php
	//render all localized messqges as json string 
	//in this way they are accessed in browser as well
	require_once('bootstrap.php');
	header("content-type: application/javascript");
	echo json_encode($lang);
?>