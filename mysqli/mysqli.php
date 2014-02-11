<?php

//require('libtut.php');

function logm($msg){
    if (php_sapi_name() == 'cli')
        echo $msg;
    else
        error_log("$msg");
}

define("DB_SERVER", "127.0.0.1:3306");
define("DB_USER", "phptut");
define("DB_PASS", "p");
define("DB_NAME", "phptut");

$startTime = MicroTime ( true );

$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$link) {
    die('Connect Error: ' . mysqli_connect_error());
}

echo mysqli_get_host_info(link) . "\n";



//=============================================================
// NON PREPARED STATEMENTS
// text exchange format; evexything is serialized into strings
//=============================================================

//get simple scalar values
$res = mysqli_query($link, "SELECT 'blabla' AS _msg FROM DUAL");
$row = mysqli_fetch_assoc($res);
echo $row['_msg'] . "\n";

$query = "SELECT id, name FROM items";
$result = mysqli_query($link, $query);

//get error message with query
if ($result = mysqli_query($link, $query)) {
	//result set
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
		    echo $row['id'] . ', ' . $row['name']; //associative array: could be $row[0] index array
		    echo '\n';
		}    
	} else {
	    echo 'empty table'; 
	}

}else{
	echo 'MySQL Error: ' . mysqli_error($link);
    die('There was an error in the query');
}

$query = "UPDATE `items` SET `name` = 'folder 3' WHERE `id` = 2";
mysqli_query($link, $query);
if (mysqli_affected_rows($link) == 1) {
    echo 'sucessfully updated'; 
} else {
    echo 'error while update' . mysqli_error($link); 
}

//escaping special characters (because they have special meaning in sql)
//$name = mysqli_real_escape_string($link, "O'Neil");

//=============================================================
//====================================  PREPARED STATMENTS
// binary exchange format; cleint will try to convert values to php
//=============================================================

/* Prepared statement, stage 1: prepare */
if (!($stmt = mysqli_prepare("INSET INTO items_data(`id` , `item_id` , `name`, `content`) VALUES (null, ?, ?, ?)"))) {
    echo "Prepare failed: (" . mysqli_errno($link) . ") " . mysqli_error($link);
    die('cannot prepare statement');
}

/* Prepared statement, stage 2: bind and execute */
if( !mysqli_stmt_bind_param($stmt, "i", 1) ||
	!mysqli_stmt_bind_param($stmt, "s", 'new name') ||
	!mysqli_stmt_bind_param($stmt, "s", 'new content')
){
    echo "Binding parameters failed:" . mysqli_error($link); ;
}

if (!mysqli_stmt_execute($stmt)) {
    echo "Execute failed:" . mysqli_error($link); ;
}


//echo memory_get_usage();

//free the memory immediately
mysqli_free_result($result);

//echo memory_get_usage();

//close
mysqli_close($link);

$endTime = MicroTime ( true );
echo ' EXEC_TIME ' . Number_Format ( $endTime - $startTime, 50 );

?>