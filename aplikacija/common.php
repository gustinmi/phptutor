<?php
/**
* Redirect and exists right away
* Location url should always be absolute link
*/
function redirect($path){
    //logm($path);
    //logm($_SERVER['HTTP_HOST']);

    if (APP_NAME === '/')
        $appname = '/';
    else
        $appname = '/' . APP_NAME . '/';

	exit(header('Location: ' . 'http://' .$_SERVER['HTTP_HOST'] . $appname . $path));
}

function isAuthenticated( $clean ){
	if ( $clean['txtName'] === $clean['txtPassword'] ) { //fake presumption; change to something meaningfull
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
	if (!IsSet($lang[$Name])){
        logm("Missing translation ${$Name}");
        return '<span style="color: red;">Translation "' . $Name . '" not available!</span>';
    }

	if ( $Replace === null ) // no replacements are required
		return $lang[$Name];

	$returnStr = $lang[$Name];

	// this will replace $%X in language string with whatever is at position X in the $Replace array
	$replaceCount = Count ( $Replace );
	for ( $i = 0; $i < $replaceCount; $i++ )
		$returnStr = Str_Replace ( '$%' . $i, $Replace[$i], $returnStr );

	return $returnStr;
}

function logm($dump){
    $logbuff = print_r($dump, true);
    if (empty($dump)) $logbuff = 'EMPTY!';

    $trace = debug_backtrace();
    if (isset($trace) && is_array($trace)) {
        $line = $trace[1]['line'];
        $func = $trace[1]['function'];
        $file = $trace[1]['file'];
    }

    // from command line
    if (php_sapi_name() == 'cli') {
        echo "${file} : ${func} : ${line} : $logbuff";
    }
    //inside web application
    else{
        error_log("${file} : ${func} : ${line} : $logbuff");
    }

}








?>