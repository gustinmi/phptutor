<?php
/**
* Redirect and exists right away
* Location url should always be absolute link
*/
function redirect($path){
	exit(header('Location: ' . $_SERVER['HTTP_HOST'] . '/' . $path));
}

function isAuthenticated( $clean ){
	if ( $clean['usrName'] === $clean['usrPassword'] ) { //fake presumption; change to something meaningfull
		return true;		
	}
	else {
		return false;	
	}	
}

/**
* Get Language value based on key
* The language is determined in bootstrap.php
* The language supports simple replace operations with placeholders $%0 ... $%N
*/
function getMsg ( $Name, $Replace = null )
{
	if ( IsSet ( $lang[$Name] ) === false )
		return '<span style="color: red;">Translation "' . $Name . '" not available!</span>';

	if ( $Replace === null ) // no replacements are required
		return $lang[$Name];

	$returnStr = $lang[$Name];

	// this will replace $%X in language string with whatever is at position X in the $Replace array
	$replaceCount = Count ( $Replace );
	for ( $i = 0; $i < $replaceCount; $i++ )
		$returnStr = Str_Replace ( '$%' . $i, $Replace[$i], $returnStr );

	return $returnStr;
}

?>